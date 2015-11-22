<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smartthings_model extends CI_Model 
{

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function check_if_device_exists($deviceID)
    {
        $query = $this->db->query("SELECT * FROM `smartthings_devices` WHERE `device_id` ='".$deviceID."'");

        if ($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_latest_log_entries($datetime)
    {
    	$query = $this->db->query("SELECT * FROM `smartthings` WHERE `date` > '".date("Y-m-d G:i:s",$datetime)."' ORDER BY `date` ASC");

    	return $query->result_array();
    }

    public function get_rooms()
    {
        $query = $this->db->query("SELECT * FROM `smartthings_rooms`");

        return $query->result_array();
    }

    public function get_devices()
    {
        $query = $this->db->query("SELECT * FROM `smartthings_devices`");

        //echo '<pre>'; print_r($query->result_array()); echo '</pre>'; exit; 
        return $query->result_array();       
    }

    function delete_device($deviceName)
    {
        $this->db->delete('smartthings', array('deviceName' => $deviceName)); 

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function add_room($roomName)
    {
        $data = array(
           'room_name' => $roomName,
           'date_added' => date("Y-m-d G:i:s"),
        );

        $this->db->insert('smartthings_rooms', $data); 

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function delete_room($roomName)
    {
        $this->db->delete('smartthings_rooms', array('room_name' => $roomName)); 

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function add_room_assignment($roomID, $deviceName)
    {
        $data = array(
           'room_id' => $roomID,
           'device_name' => $deviceName,
        );

        $this->db->insert('smartthings_roomassignments', $data); 

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }    
}

?>