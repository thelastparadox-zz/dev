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

		$this->load->model('houseprices/houseprices_model');

		//echo '<pre>'; print_r($house_prices); echo '</pre>'; exit;

		// Calculate length of measurement

		$first_price = $this->houseprices_model->get_first_price();
		$latest_price = $this->houseprices_model->get_latest_price();

		$diff = abs(strtotime($latest_price['date']) - strtotime($first_price['date']));

		$length_of_measurement = round($diff / (60*60*24*30));

		$data = array(
			'house_prices' => $this->houseprices_model->get_prices(),
			'highest_price' => $this->houseprices_model->get_highest_price(),
			'lowest_price' => $this->houseprices_model->get_lowest_price(),
			'latest_price' => $latest_price,
			'number_of_data_points' => $this->houseprices_model->get_number_of_data_points(),
			'length_of_measurement' => $length_of_measurement,
		);

		$this->load->view('houseprices/overview', $data);
	}

	public function main_chart_data()
	{
		$this->load->model('houseprices/houseprices_model');

		//echo '<pre>'; print_r($house_prices); echo '</pre>'; exit;

		$data = array(
			'house_prices' => $this->houseprices_model->get_prices(),
			'highest_price' => $this->houseprices_model->get_highest_price(),
			'lowest_price' => $this->houseprices_model->get_lowest_price(),
		);

		$this->load->view('houseprices/charts/main_chart_data', $data);
	}
}
