<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public $config;

	public $cron;

	public function __construct() 
	{
   		parent::__construct();

   		$this->load->model('torrents/torrents_model');

   		$this->load->model('torrents/cron_model');



   		//$cron = Cron\CronExpression::factory('@daily');

	   	// Load Feeds into Cnfiguration variable

	   	$this->config = array
		(
			'feeds' => $this->torrents_model->load_torrent_feeds(),
			'max_simultaneous_torrents_in_download_client' => 10,
			'no_of_torrents_to_import_from_staging' => 25,
			'minimum_movie_rating' => 6,
			'minimum_movie_year' => 2000,
			'maximum_torrent_size' => '10073741824', // (10 gigabytes)
		);

		$this->crontab = $this->torrents_model->load_crontab();

	}

	public function index()
	{
		foreach ($this->crontab as $cron)
		{
			if ( $cron['status'] == 'enabled' && ($this->cron_model->last_runtime($cron['crontab']) > strtotime($cron['last_run'])) )
			{
				call_user_func('Main::'.$cron['function']);
			}
		}
	}

	public function spider_feeds()
	{
		log_message('debug', '::::: CRON JOB ::::: Initiating cron job to spider feeds');

		foreach ($this->config['feeds'] as $no => $feed_array)
		{
			if ($feed_array['status'] == 'enabled' && $feed_array['type'] == 'piratebay')
			{
				$this->torrents_model->spider_piratebay_feed($feed_array);
			}
		}
	}

	public function import_torrents_from_staging()
	{
		log_message('debug', '::::: CRON JOB ::::: Initiating cron job to import discovered torrents from staging table to main table.');

		$query = $this->db->get('torrents_staging', $this->config['no_of_torrents_to_import_from_staging']);

		$torrents = $query->result_array();

		foreach($torrents as $no => $torrent)
		{
			$imdb_array = $this->torrents_model->getIMDBInfo($torrent['name']);

			//echo '<pre>'; print_r($imdb_array); echo '</pre>'; exit;

			if ($imdb_array->Response == 'True')
			{
				// Add the needed information to the Torrent Array and save to DB
				$torrent['imdbid'] = $imdb_array->imdbID;
				$torrent['rating'] = $imdb_array->imdbRating;
				$torrent['title'] = $imdb_array->Title;
				$torrent['genre'] = $imdb_array->Genre;
				$torrent['year'] = $imdb_array->Year;

				// Get torren hash from Magnet link -> 

				$torrent['hash'] = $this->torrents_model->extract_hash_from_magnet($torrent['magnet']);

				// If movie passes minimum criteria then save torrent to main DB
				if ($torrent['rating'] > $this->config['minimum_movie_rating'] && $torrent['year'] > $this->config['minimum_movie_year'])
				{
					$this->torrents_model->save_torrent_to_main_db($torrent);					
				}

				// Remove torrent from staging
				$this->torrents_model->remove_torrent_from_staging($torrent['id']);
			}
			else
			{
				// Delete the torrent from Staging
				$this->torrents_model->remove_torrent_from_staging($torrent['id']);
			}
		}
	}

	public function send_torrents_for_download()
	{
		log_message('debug', '::::: CRON JOB ::::: Initiating cron job to send torrents from main table to download client.');

		// perform a check to see if the torrents in the DB listed as downloading are still downloading by their hash check

		// If there are more than X torrents downloading then move on
		$torrents = $this->torrents_model->get_torrent_list();

		//var_dump($torrents);

		if ($torrents && count($torrents) > 0)
		{	
			//echo '<pre>'; print_r($torrents); echo '</pre>'; 

			// Prune the downloaded and completed torrrents

			foreach ($torrents as $no => $torrent)
			{
				// If Error, delete torrent and data
				if ($torrent['state'] == 'error' || $torrent['size'] > $this->config['maximum_torrent_size'])
				{
					$this->torrents_model->delete_torrent_and_data($torrent['hash'], $torrent['name']);

					unset($torrents[$no]);
				}

				elseif ($torrent['state'] == 'uploading' || $torrent['state'] == 'stalledUP')
				{
					$this->torrents_model->delete_torrent($torrent['hash'], $torrent['name']);

					unset($torrents[$no]);
				}
			}
		}
		else
		{
			log_message('debug', 'QBittorrent -> Failed to get Torrent list or torrent list empty.');
		}

		if (count($torrents) <= $this->config['max_simultaneous_torrents_in_download_client'])
		{
			// Get some torrents from the staging table and add them

			//echo '<p>Proccessing '.count($torrents).' torrents.</p>';

			$torrent_space = $this->config['max_simultaneous_torrents_in_download_client'] - count($torrents);

			//echo '<p>The Queue has space for '.$torrent_space.' torrents.</p>';

			$query = $this->db->query('SELECT * FROM `torrents` ORDER BY RATING DESC LIMIT '.$torrent_space);

			//echo '<p>Extracted '.$query->num_rows().' torrents from DB to download.</p>';

			if ($query->num_rows() > 0)
			{
				foreach ($query->result_array() as $no => $torrent)
				{				
					//echo '<p>Downloading magnet... calling qbittorent_donwload_torrent.</p>';

					$result = $this->torrents_model->download_torrent($torrent['magnet'], $torrent['name']);

					//echo '<pre>'; print_r($result); echo '</pre>';

					if ($result)
					{
						// Change Status of Torrrent in Queue DB to Downloading

						//echo '<pre>'; print_r($result); echo '</pre>';

						$this->torrents_model->update_torrent_in_queue_db($torrent['id'], array('status' => 'downloading'));
					}
					else
					{
						log_message('debug', 'QBittorrent -> One of the torrents has failed to be added to the queue therefore breaking the loop.');

						break;
					}				
				}
			}	
		}
	}

	function scan_folder()
	{
		// Scan folder & check if file exists in DB

		
	}
}
