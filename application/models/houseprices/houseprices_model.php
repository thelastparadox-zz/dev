<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Houseprices_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_prices()
    {
		$query = $this->db->get('houseprices');

    	$this->db->order_by('date', 'DESC');

    	return $query->result_array();
    }
}