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
		$query = $this->db->query('SELECT * FROM `houseprices` GROUP BY `date` ORDER BY `date` DESC');

    	return $query->result_array();
    }

    function get_latest_price()
    {
    	$query = $this->db->query('SELECT * FROM `houseprices` GROUP BY `date` ORDER BY `date` DESC LIMIT 1');

    	$return_array = $query->result_array();

    	return $return_array[0];
    }

    function get_highest_price()
    {
    	$query = $this->db->query('SELECT * FROM `houseprices` ORDER BY `price` DESC LIMIT 1');

    	$return_array = $query->result_array();

    	return $return_array[0];
    }

    function get_lowest_price()
    {
    	$query = $this->db->query('SELECT * FROM `houseprices` ORDER BY `price` ASC LIMIT 1');

    	$return_array = $query->result_array();

    	return $return_array[0];
    }

    function get_number_of_data_points()
    {
    	return $this->db->count_all('houseprices');
    }

    function get_first_price()
    {
    	$query = $this->db->query('SELECT * FROM `houseprices` GROUP BY `date` ORDER BY `date` ASC LIMIT 1');

    	$return_array = $query->result_array();

    	return $return_array[0];
    }
}