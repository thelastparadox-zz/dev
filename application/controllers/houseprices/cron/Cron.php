<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

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
	public function index()
	{
		$this->check_house_price();
	}

	function check_house_price()
	{
		// Get price from the website

		$html = file_get_contents("http://www.zoopla.co.uk/property/flat-25/stretton-mansions/glaisher-street/london/se8-3jp/20960698");

		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
  		$doc->loadHTML($html);

  		$divs = $doc->getElementsByTagName('strong');

  		$price = false;

	    foreach($divs as $div) {
	        // Loop through the DIVs looking for one withan id of "content"
	        // Then echo out its contents (pardon the pun)
	        if ($div->getAttribute('class') === 'big zestimate') 
	        {   
	             $price = $div->nodeValue;

	             // Remove the pound symbol
	             $price = str_replace("£", "", $price);
	             // Remove the comma symbol
	             $price = str_replace(",", "", $price);
	        }
	    }

	    // Get the last added price from the database to calculate the change

	    // Add Price to the Database

  		$data = array(
	        'date' => date("Y-m-d"),
	        'source' => 'Zoopla',
	        'price' => $price
		);

		$this->db->insert('houseprices', $data);

		//echo '<div>Price: '.$price.'</div>';
	}
}
