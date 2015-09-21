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
	public function index()
	{
		$data = array();

		$this->load->view('smartthings/overview', $data);
	}

	public function temperature_control()
	{
		$data = array();

		$this->load->view('smartthings/temperature_control', $data);
	}

	public function livelog()
	{
		$data = array();

		$this->load->view('smartthings/livelog', $data);		
	}

	public function room_assignments()
	{
		$this->load->model('smartthings/smartthings_model');

		$data = array(
			'rooms' => $this->smartthings_model->get_rooms(),
			'devices' => $this->smartthings_model->get_devices(),
		);

		$this->load->view('smartthings/settings_roomassignments', $data);
	}
}
