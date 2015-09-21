<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
		// Check if Device exists in DB and if not, create it
		$this->load->model('smartthings/smartthings_model');

		//$this->input->post('deviceID');

		$data = array (
			'date' => date("Y-m-d G:i:s"),
			'deviceName' => $this->input->post('deviceName'),
			'attribute' => $this->input->post('attribute'),
			'state' => $this->input->post('state'),
			'payload' => json_encode($_POST),
		);

		$this->db->insert('smartthings', $data);

		echo "successful";	
	}

	public function livelog()
	{
		$this->load->model('smartthings/smartthings_model');

		$data = $this->smartthings_model->get_latest_log_entries($this->input->post('time'));

		if ($data == false)
		{
			//header("HTTP/1.1 500 OK"); exit;
		}
		else
		{
			//header("HTTP/1.1 200 OK"); 
			echo json_encode($data);
			//exit;
		}
	}

	public function register_devices()
	{
		if ($this->input->post('deviceID'))
		{
			$this->load->model('smartthings/smartthings_model');

			$data = array (
				'registration_date' => date("Y-m-d G:i:s"),
				'device_name' => $this->input->post('deviceName'),
				'device_id' => $this->input->post('deviceID'),
				'capabilities' => $this->input->post('capabilities'),
			);

			$this->db->insert('smartthings_devices', $data);

			echo "successful";
		}
	}
}
