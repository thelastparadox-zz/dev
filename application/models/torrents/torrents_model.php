<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Torrents_model extends CI_Model 
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }


    public function GetRequest($url)
    {
        log_message('debug', 'Getting URL -> '.$url);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $ret = curl_exec($ch);
        
        if (empty($ret)) 
        {
            // some kind of an error happened
            log_message('debug', 'Getting URL -> '.$url.' -> ERROR: '.curl_error($ch));
            
            curl_close($ch); // close cURL handler

            return false;
        } 
        else 
        {
            $info = curl_getinfo($ch);

            curl_close($ch); // close cURL handler

            if (empty($info['http_code'])) 
            {
               log_message('debug', 'Getting URL -> '.$url.' -> ERROR: No HTTP Code Returned in request');

               return false;
            } 
            else 
            {
                log_message('debug', 'Getting URL -> '.$url.' -> HTTP Code '.$info['http_code'].' returned.');

                return $ret;
            }

        }
    }

    public function getDomainFromURL($url)
    {
        $url_array = explode("/", $url);

        //print_r($url_array);

        return $url_array[0]."//".$url_array[2];
    }

    public function get_piratebay_page($url)
    {
        log_message('debug', 'Spidering Feeds -> Processing Pirate Bay Feed -> '.$url);

        $torrents = array();

        if ($result = $this->GetRequest($url))
        {
            $dom = new DOMDocument();

            @$dom->loadHTML($result);

            if ($table = @$dom->getElementById('searchResult'))
            {
                foreach ($table->getElementsByTagName('tr') as $torrentno => $row)
                {
                    foreach ($row->getElementsByTagName('a') as $link)
                    {
                        if ($link->getAttribute('class') == "detLink")
                        {
                            $torrents[$torrentno]['name'] = $link->nodeValue;
                        }
                        if (strpos($link->getAttribute('href'), 'magnet') !== false)
                        {
                            $torrents[$torrentno]['magnet'] = $link->getAttribute('href');
                        }
                        elseif(strpos($link->getAttribute('href'), 'torrent') !== false)
                        {
                            $torrents[$torrentno]['link'] = $this->getDomainFromURL($url).$link->getAttribute('href');
                        }

                        // Get Seeders and Leachers

                        foreach ($row->getElementsByTagName('td') as $no => $td)
                        {
                            if ($no == 2)
                            {
                                $torrents[$torrentno]['seeders'] = $td->nodeValue;
                            }

                            if ($no == 3)
                            {
                                $torrents[$torrentno]['leechers'] = $td->nodeValue;
                            }
                        }
                    }
                }

                return $torrents; 
            }
            else
            {
                log_message('debug', 'Spidering Feeds -> ERROR: Cant find element SearchResults table in DOM. Likely PirateBay Page Layout has changed.');

                return false;
            }
        }
        else
        {
            log_message('debug', 'Spidering Feeds -> No results returned.');

            return false;
        }  
    }

    public function extract_table_arrays_from_html($html)
    {
        log_message('debug', 'Processing HTML to extract table arrays');

        $dom = new DOMDocument();
 
        $html = @$dom->loadHTML($html);
         
        $dom->preserveWhiteSpace = false;
         
        $tables = $dom->getElementsByTagName('table');
         
        //get all rows from the table
        $rows = $tables->item(0)->getElementsByTagName('tr');
        // get each column by tag name
        $cols = $rows->item(0)->getElementsByTagName('th');
        $row_headers = NULL;
        foreach ($cols as $node) {
            //print $node->nodeValue."\n";
            $row_headers[] = $node->nodeValue;
        }
         
        $table = array();
        //get all rows from the table
        $rows = $tables->item(0)->getElementsByTagName('tr');
        foreach ($rows as $row)
        {
            // get each column by tag name
            $cols = $row->getElementsByTagName('td');
            $row = array();
            $i=0;
            foreach ($cols as $node) {
                # code...
                //print $node->nodeValue."\n";
                if($row_headers==NULL)
                    $row[] = $node->nodeValue;
                else
                    $row[$row_headers[$i]] = $node->nodeValue;
                $i++;
            }
            $table[] = $row;
        }
         
        return $table;
    }

    public function clean_torrent_name($name)
    {
        // Remove all non-needed characters
        $name = str_replace(array("(", ")"), "", $name);

        // If title is separated by dots
        if (substr_count($name, '.') > 1)
        {
            $name_array = explode(".", $name);

            foreach($name_array as $no => $part)
            {
                if (is_numeric($part)) // If it is a date, then only take the previous parts for the title
                {
                    // Double check that this isn't a sequel with a 2 (e.g. Rocky 2)
                    if (!is_numeric($name_array[$no+1]))
                    {
                        for($i=0; $i < $no; $i++)
                        {
                            $final_name_array[] = $name_array[$i];
                        }

                        return implode(" ", $final_name_array);                        
                    }
                }
            }
        }

        // If title is separated by spaces
        if (substr_count($name, ' ') > 1)
        {
            $name_array = explode(" ", $name);

            foreach($name_array as $no => $part)
            {
                if (is_numeric($part)) // If it is a date, then only take the previous parts for the title
                {
                    // Double check that this isn't a sequel with a 2 (e.g. Rocky 2)
                    if (isset($name_array[$no+1]) && !is_numeric($name_array[$no+1]))
                    {
                        $final_name_array = array();

                        for($i=0; $i < $no; $i++)
                        {
                            $final_name_array[] = $name_array[$i];
                        }

                         return implode(" ", $final_name_array);
                    }
                }
            }
        }
    }

    public function extract_hash_from_magnet($magnet)
    {
        $initial_break = explode("?", $magnet);

        $second_break = explode("=", $initial_break[1]);

        $magnet_id_array = explode(":", $second_break[1]);

        return $magnet_id_array[2];
    }

    public function getIMDBInfo($name)
    {
        // Clean title a little before sending
        $name = $this->clean_torrent_name($name);

        $url = 'http://www.omdbapi.com/?t='.str_replace(" ", "+", $name).'&r=json';

        log_message('debug', 'Importing Torrent from Staging -> Getting movie information from omdbapi for '.$name.'. Using URL -> '.$url);
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Accept: application/json"
        ));

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        return $response;
    }

    public function determine_quality($name)
    {
        return '1080p';
    }

    public function save_torrent_to_main_db($torrent)
    {
        log_message('debug', 'Importing Torrent from Staging -> Saving torrent [filename -> '.$torrent['title'].'. imdbid -> '.$torrent['imdbid'].'] to main DB.');

        // Check to see if IMDB ID is not equal to 0 or false
        if (isset($torrent['imdbid']) && $torrent['imdbid'] !== 0)
        {
            // Check to see if IMDB ID already exists in DB
            $query = $this->db->get_where('torrents', array('imdbid' => $torrent['imdbid']));

            if ($query->num_rows() == 0)
            {
                // Insert it
                $this->db->insert('torrents', $torrent);

                return true;
            }
            else
            {
                log_message('debug', 'Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> '.$torrent['title'].'. imdbid -> '.$torrent['imdbid'].'].');
    
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function saveTorrentstoDB($torrents)
    {
        log_message('debug', 'Spidering Feeds -> Saving Torrents spidered from feeds');

        if (is_array($torrents) && count($torrents) > 0)
        {
            //echo '<h2>Torrent Array</h2><pre>';
            //print_r($torrents);
            //echo '</pre>';

            $this->db->insert_batch('torrents_staging', $torrents);
        }

        log_message('debug', 'Spidering Feeds -> All spidered torrents saved.');

        return true;
    }

    public function remove_torrent_from_staging($id)
    {
        log_message('debug', 'Importing Torrent from Staging -> Removing Torrent #'.$id.' from Staging DB.');

        if ($this->db->delete('torrents_staging', array('id' => $id)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function load_torrent_feeds()
    {
        log_message('debug', 'Loading torrent feeds');

        $query = $this->db->query("SELECT * FROM `torrents_feeds`");

        return $query->result_array();
    }

    public function spider_piratebay_feed($feed_data)
    {
        // Check what page it got up to the last time it was spidered - if less than the configured total, then carry on from the beginning

        if ($feed_data['last_page'] <= $feed_data['total_pages'])
        {
            // If good to go, then break up URL for spidering
            log_message('debug', 'Spidering Feeds -> Beginning to spider '.$feed_data['name'].'.');

            $url_array = explode("/",$feed_data['url']); 

            // Double check the URL format to ensure it's OK to spider

            if (count($url_array) <= 4)
            {
                log_message('debug', 'Spidering Feeds -> URL is malformed so amending to the appropriate Pirate Bay format.');

                if (empty($url_array[3]))
                {
                    array_splice($url_array, 3); 

                    array_push($url_array, "browse", "207", "0", "7", "0");
                }
            }

            for ($i=$feed_data['last_page']; $i <= $feed_data['total_pages']; $i++)
            {
                // Create URL to Spider
                $url_array[5] = $i;

                $url = implode("/", $url_array);

                if ($torrents = $this->get_piratebay_page($url))
                {
                    if ($this->saveTorrentstoDB($torrents))
                    {
                        // Update the Feed in DB with last page spidered and update date

                        $data = array('last_page' => $i, 'last_spidered' => date('Y-m-d H:i:s'));
                        $this->db->where('id', $feed_data['id']);
                        $this->db->update('torrents_feeds', $data);
                    }
                }
                else
                {
                    log_message('debug', 'Spidering Feeds -> Issue with getting Feed has halted process for this Feed.');

                    break;
                }
            }

        }
        else
        {
            log_message('debug', $feed_data['name'].' has already been spidered fully into the staging table.');

            // If Date & Time is greater than configured then reset the last_page value to zero
            if ($feed_data['last_spidered'])
            {

            }
        }



        // iterate over pages and get page info

        
    }

    public function update_torrent_in_queue_db($id, $data)
    {
        log_message('debug', 'Updating torrent (#'.$id.') in torrent queue database to be '.implode(" -> ", $data));
        
        $this->db->where('id', $id);
        $this->db->update('torrents', $data);

        return true;
    }


    public function get_pending_torrents()
    {
        log_message('debug', 'Getting list of pending torrents from database.');

        $query = $this->db->get_where('torrents', array('status' => 'pending'), 10);

        $torrents = $query->result_array();

        return $torrents;
    }

    public function qbittorent_request($url, $data=false)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        //var_dump($data);
        
        if ($data)
        {
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_POST, TRUE);

            $post_string = "";

            foreach ($data as $key => $var)
            {
                $post_string .= $key . '=' . $var . '&';
            }

            //echo '<p>QBITTORENT: Request for $data = true. Post string = '.$post_string.'</p>';

            curl_setopt($ch,CURLOPT_POSTFIELDS, $post_string);
        }
        else
        {
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
        }

        $ret = curl_exec($ch);

        if (empty($ret)) 
        {
            // some kind of an error happened
            log_message('debug', 'Getting URL -> '.$url.' -> Empty response... '.curl_error($ch));
            
            curl_close($ch); // close cURL handler

            return false;
        } 
        else 
        {
            $info = curl_getinfo($ch);

            curl_close($ch); // close cURL handler

            if (empty($info['http_code'])) 
            {
               log_message('debug', 'Getting URL -> '.$url.' -> ERROR: No HTTP Code Returned in request');

               return false;
            } 
            else 
            {
                log_message('debug', 'Getting URL -> '.$url.' -> HTTP Code '.$info['http_code'].' returned.');

                //echo '<pre>'; print_r(json_decode($ret, true)); echo '</pre>';

                return json_decode( $ret , true);
            }

        }
    }

    public function get_torrent_list()
    {
        log_message('debug', 'QBittorrent -> Getting torrent list.');

        $result = $this->qbittorent_request('http://localhost:8083/query/torrents');

        //echo '<pre>'; print_r($result ); echo '</pre>';

        return $result;
    }

    public function download_torrent($magnet, $name)
    {
        log_message('debug', 'QBittorrent -> Adding '.$name.' torrent to download queue with magnet: '.$magnet);

        $result = $this->qbittorent_request('http://localhost:8083/command/download', array('urls' => $magnet));

        return true;
        
    }

    public function delete_torrent($hash, $name)
    {
        log_message('debug', 'QBittorrent -> Deleting torrent : '.$name);

        $result = $this->qbittorent_request('http://localhost:8083/command/delete', array('hashes' => $hash));

        return $result;
        
    }

    public function delete_torrent_and_data($hash, $name)
    {
        log_message('debug', 'QBittorrent -> Deleting torrent & data : '.$name);

        $result = $this->qbittorent_request('http://localhost:8083/command/deletePerm', array('hashes' => $hash));

        return $result;
        
    }

    public function load_crontab()
    {
        log_message('debug', 'Getting list of scheduled cron tasks from database.');

        $query = $this->db->get('torrents_cron');

        $crontab = $query->result_array();

        return $crontab;
    }
}

?>