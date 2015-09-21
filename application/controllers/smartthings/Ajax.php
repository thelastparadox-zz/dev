<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
			
	}

	public function delete_device()
	{		
		$this->load->model('smartthings/smartthings_model');

		if ($this->smartthings_model->delete_device($this->input->post('deviceName')) == true)
		{
			echo "success";
		}
	}

	public function add_room()
	{
		$this->load->model('smartthings/smartthings_model');

		if ($this->smartthings_model->add_room($this->input->post('roomName')) == true)
		{
			json_encode(array("result" => "success"));
		}
	}

	public function delete_room()
	{
		$this->load->model('smartthings/smartthings_model');

		if ($this->smartthings_model->delete_room($this->input->post('roomName')) == true)
		{
			json_encode(array("result" => "success"));
		}
	}

	public function add_room_assignment()
	{
		$this->load->model('smartthings/smartthings_model');

		if ($this->smartthings_model->add_room_assignment($this->input->post('roomID'), $this->input->post('deviceName')) == true)
		{
			json_encode(array("result" => "success"));
		}
	}	
}
