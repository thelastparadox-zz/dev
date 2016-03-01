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

	public $database;
	public $headers_array = array(
   		 	'dependency_id' => 'Dependency ID',
   		 	'clarks_owner_2' => 'Clarks Project or Comercial Contact',
   		 	);

	public function __construct() 
	{
   		 parent::__construct();

   		 $this->database = './tmp/PANGAEA2_External Depenency and Action Tracker.xlsx';
	}

	public function index()
	{
		
		$this->load->model('dependencies/dependencies_model');

		// Load Dependencies
		$dependency_array = $this->dependencies_model->load_sheet($this->database, 2);

		//echo '<pre>';
		//print_r($dependency_array);
		//echo '</pre>';
		//exit;

		if (count($dependency_array) > 0) 
		{
			$dependency_array = $this->dependencies_model->post_process_dependency_array($dependency_array);
		}

		// Get all External Party Names for Main Menu
		$party_names = $this->dependencies_model->get_party_names($dependency_array);

		// Get Red and Amber Dependencies
		$red_and_amber = $this->dependencies_model->get_red_and_amber_dependencies($dependency_array);

		$next_5_dependencies = $this->dependencies_model->get_next_dependencies($dependency_array, 5);

		$rag_total_array = $this->dependencies_model->get_rag_totals($dependency_array);

		$logical_next_steps = $this->dependencies_model->get_logical_next_steps($dependency_array);

		$data = array(
			'party_names' => $party_names,
			'dependency_array' => $red_and_amber,
			'next_5_dependencies' => $next_5_dependencies,
			'rag_total_array' => $rag_total_array,
			'logical_next_steps' => $logical_next_steps,
		);

		$this->load->view('dependencies/overview', $data);
	}

	public function red_and_amber()
	{		
		$this->load->model('dependencies/dependencies_model');

		// Load Dependencies
		$dependency_array = $this->dependencies_model->load_sheet($this->database, 1);
		$dependency_array = $this->dependencies_model->post_process_dependency_array($dependency_array);

		// Get all External Party Names for Main Menu
		$party_names = $this->dependencies_model->get_party_names($dependency_array);

		// Get Red and Amber Dependencies
		$red_and_amber = $this->dependencies_model->get_red_and_amber_dependencies($dependency_array);

		$next_5_dependencies = $this->dependencies_model->get_next_dependencies($dependency_array, 5);

		$rag_total_array = $this->dependencies_model->get_rag_totals($dependency_array);

		$data = array(
			'party_names' => $party_names,
			'dependency_array' => $red_and_amber,
			'next_5_dependencies' => $next_5_dependencies,
			'rag_total_array' => $rag_total_array,
		);

		$this->load->view('dependencies/red_and_amber', $data);
	}

	public function view_dependencies()
	{		
		$data = array();

		$this->load->model('dependencies/dependencies_model');

		// Get the 3rd Party Segment 
		$thirdparty = str_replace("%20", " ", $this->uri->segment(4));

		// Load Dependencies
		$dependency_array = $this->dependencies_model->load_sheet($this->database, 1);
		$dependency_array = $this->dependencies_model->post_process_dependency_array($dependency_array);

		if ($thirdparty)
		{
			$data['dependency_array'] = $this->dependencies_model->get_only_3rd_party_dependencies($dependency_array, $thirdparty);
		}
		else
		{
			$data['dependency_array'] = $dependency_array;
		}		

		// Get all External Party Names for Main Menu
		$party_names = $this->dependencies_model->get_party_names($dependency_array);

		$data['thirdparty'] = $thirdparty;
		$data['party_names'] = $party_names;

		$this->load->view('dependencies/view_dependencies', $data);		
	}

	public function view_dependency()
	{	
		$data = array();

		$this->load->model('dependencies/dependencies_model');

		// Get the 3rd Party Dependency ID 
		$dependency_id = $this->uri->segment(4);

		// Load Dependencies
		$dependency_array = $this->dependencies_model->load_sheet($this->database, 1);
		$dependency_array = $this->dependencies_model->post_process_dependency_array($dependency_array);

		// Load Actions
		$actions_array = $this->dependencies_model->load_sheet($file, 2);

		$dependency_actions = $this->dependencies_model->get_actions_relating_to_depenency($actions_array, $dependency_id);

		//print_r($actions_array); exit;

		$dependency_info = $this->dependencies_model->get_dependency($dependency_array, $dependency_id);	

		// Get all External Party Names for Main Menu
		$party_names = $this->dependencies_model->get_party_names($dependency_array);

		$data['party_names'] = $party_names;
		$data['dependency_info'] = $dependency_info;

		$this->load->view('dependencies/view_dependency', $data);		
	}

	public function edit_dependency()
	{		
		$data = array();

		$this->load->model('dependencies/dependencies_model');

		// Get the 3rd Party Dependency ID 
		$dependency_id = $this->uri->segment(4);

		// Load Dependencies
		$dependency_array = $this->dependencies_model->load_sheet($this->database, 1);
		$dependency_array = $this->dependencies_model->post_process_dependency_array($dependency_array);

		// Load Actions
		$actions_array = $this->dependencies_model->load_sheet($this->database, 2);

		$dependency_actions = $this->dependencies_model->get_actions_relating_to_depenency($actions_array, $dependency_id);

		//print_r($actions_array); exit;

		$dependency_info = $this->dependencies_model->get_dependency($dependency_array, $dependency_id);	

		// Get all External Party Names for Main Menu
		$party_names = $this->dependencies_model->get_party_names($dependency_array);

		$data['party_names'] = $party_names;
		$data['dependency_info'] = $dependency_info;
		$data['dependency_actions'] = $dependency_actions;

		$this->load->view('dependencies/edit_dependency', $data);		
	}

	public function save_sheet()
	{
		$this->load->library('excel');

		$data = array(
		    array ('Name', 'Surname'),
		    array('Schwarz', 'Oliver'),
		    array('Test', 'Peter')
		);

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getActiveSheet()->fromArray($data, null, 'A1');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
		$objWriter->save("tmp/05featuredemo.xlsx");
	}

	public function this_week_and_next()
	{
		$this->load->model('dependencies/dependencies_model');

		// Load Dependencies
		$dependency_array = $this->dependencies_model->load_sheet($this->database, 2);

		if (count($dependency_array) > 0) 
		{
			$dependency_array = $this->dependencies_model->post_process_dependency_array($dependency_array);
		}

		//echo '<pre>';
		//print_r($dependency_array);
		//echo '</pre>';
		//exit;

		// Get all External Party Names for Main Menu
		$party_names = $this->dependencies_model->get_party_names($dependency_array);

		$data = array(
			'party_names' => $party_names,
			'dependency_array' => $dependency_array,
		);

		$this->load->view('dependencies/this_week_and_next', $data);
	}

}
