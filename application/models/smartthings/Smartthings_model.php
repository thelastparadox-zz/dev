<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smartthings_model extends CI_Model 
{

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_latest_log_entries($datetime)
    {
    	$query = $this->db->query("SELECT * FROM `smartthings` WHERE `date` > '".date("Y-m-d G:i:s",$datetime)."' ORDER BY `date` DESC");

    	return $query->result_array();
    }
}

?>