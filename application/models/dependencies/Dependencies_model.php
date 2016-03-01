<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencies_model extends CI_Model {


    public $excel_headers;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();

        $this->excel_headers = array(
            'dependency_id' => 'Dependency ID',
            'external_party' => 'External Party',
            'clarks_owner_2' => 'Clarks Project or Comercial Contact',
            'accenture_stream' => 'Accenture Stream',
            'accenture_owner' => 'Accenture Owner',
            'agreed_date' => 'Original Date',
            'description' => 'Description'
        );
    }

    public function load_sheet($file, $sheet)
    {
		//load the excel library
        $this->load->library('excel');
        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);

        $objPHPExcel->setActiveSheetIndex($sheet);

        //get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

        $arr_data = array();

        //extract to a PHP readable array format
        foreach ($cell_collection as $cell) 
        {           
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) 
            {
                $header[$column] = $data_value;
            } 
            else 
            {

                $arr_data[$row][$header[$column]] = $data_value;
            }

        }

        return $arr_data;
    }

    public function post_process_dependency_array($arr_data)
    {
        // Post-processing Array

        $return_array = array();

        foreach ($arr_data as $row => $dependency)
        {
            if (isset($dependency['Status']) && $dependency['Status'] != "Closed" && $dependency['Status'] != "Duplicate")
            {
                $return_array[$dependency['Dependency ID']] = $dependency;

                // Default to GREEN RAG Status

                $return_array[$dependency['Dependency ID']]['RAG'] = 'Green';

                // Apply rules for if it is a RED or Amber Rag Status

                //  RED 
                //  Conditions:
                //      1. Critical Date is passed

                if (array_key_exists('Critical Date', $dependency) && $dependency['Critical Date'] != false && $this->excelDateToPHPDate($dependency['Critical Date']) <= time())
                {
                    $return_array[$dependency['Dependency ID']]['RAG'] = 'Red';
                }

                //  AMBER
                //  Conditions:
                //      1. No current date entered

                if (!array_key_exists('Current Date', $dependency) || $dependency['Current Date'] == "")
                {
                    $return_array[$dependency['Dependency ID']]['RAG'] = 'Amber';
                }


                // if Accenture Owner is not complete, add as a blank
                if (!array_key_exists('Accenture Owner', $dependency))
                {
                    $return_array[$dependency['Dependency ID']]['Accenture Owner'] = "";
                }

                // if Clarks Owner is not complete, add as a blank
                if (!array_key_exists('Clarks Owner', $dependency))
                {
                    $return_array[$dependency['Dependency ID']]['Clarks Owner'] = "";
                }

                // if Accenture Owner is not complete, add as a blank
                if (!array_key_exists('Original Date', $dependency))
                {
                    $return_array[$dependency['Dependency ID']]['Original Date'] = "";
                }

                // if Accenture Owner is not complete, add as a blank
                if (!array_key_exists('Critical Date', $dependency))
                {
                    $return_array[$dependency['Dependency ID']]['Critical Date'] = "";
                } 
            }           
        }

        //echo '<pre>';
        //print_r($arr_data);
        //echo '</pre>';

        //exit;

        return $return_array;
    }

    public function get_only_3rd_party_dependencies($dependency_array, $third_party)
    {
        foreach ($dependency_array as $row => $dependency)
        {
            if ($dependency['External Party'] !== $third_party)
            {
                unset($dependency_array[$row]);
            }
        }

        return $dependency_array;
    }

    public function MultiSort($data, $sortCriteria, $caseInSensitive = true)
    {
      if( !is_array($data) || !is_array($sortCriteria))
        return false;       
      $args = array(); 
      $i = 0;
      foreach($sortCriteria as $sortColumn => $sortAttributes)  
      {
        $colList = array(); 
        foreach ($data as $key => $row)
        { 
          $convertToLower = $caseInSensitive && (in_array(SORT_STRING, $sortAttributes) || in_array(SORT_REGULAR, $sortAttributes)); 
          $rowData = $convertToLower ? strtolower($row[$sortColumn]) : $row[$sortColumn]; 
          $colLists[$sortColumn][$key] = $rowData;
        }
        $args[] = &$colLists[$sortColumn];
          
        foreach($sortAttributes as $sortAttribute)
        {      
          $tmp[$i] = $sortAttribute;
          $args[] = &$tmp[$i];
          $i++;      
         }
      }
      $args[] = &$data;
      call_user_func_array('array_multisort', $args);
      return end($args);
    } 

    public function get_next_dependencies($dependency_array, $number=5)
    {
        // Prune the array to remove those without dates or with text
        foreach ($dependency_array as $no => $dependency)
        {
            if ($dependency['Critical Date'] == "" || !is_numeric($dependency['Critical Date']))
            {
                unset($dependency_array[$no]);
            }
        }

        //Set the sort criteria (add as many fields as you want)
        $sortCriteria = 
          array('Critical Date' => array(SORT_ASC, SORT_NUMERIC)
          );

        //Call it like this:  
        $sortedData = $this->MultiSort($dependency_array, $sortCriteria, true);

        $i = 0;

        foreach ($sortedData as $no => $dependency)
        {
            if ($this->excelDateToPHPDate($dependency['Critical Date']) > time())
            {
                if ($i >= $number)
                {
                    unset($sortedData[$no]);
                }

                $i++;
            }
            else
            {
                unset($sortedData[$no]);
            }
        }

        return $sortedData;
    }

    public function get_party_names($array)
    {
        // Declare Return Array
        $return_array = array();

        foreach ($array as $no => $dependency)
        {
            if (!array_key_exists($dependency['External Party'],$return_array) && $dependency['External Party'] != "")
            {
                $return_array[$dependency['External Party']] = $dependency['External Party'];
            }          
        }

        //echo '<pre>';
        //print_r($return_array);
        //echo '</pre>';

        ksort ($return_array);

        //echo '<pre>';
        //print_r($return_array);
        //echo '</pre>';
        //exit;

        return $return_array;
    }

    public function get_red_and_amber_dependencies($array)
    {
        // Declare Return Array
        $return_array = array();

        foreach ($array as $no => $dependency)
        {
            if ($dependency['RAG'] == 'Red' || $dependency['RAG'] == 'Amber')
            {
                if ($dependency['Critical Date'] !== "" && is_numeric($dependency['Critical Date']))
                {
                    $return_array[$dependency['Dependency ID']] = $dependency; 
                }      
            }
        }

        //Set the sort criteria (add as many fields as you want)
        $sortCriteria = 
          array('Critical Date' => array(SORT_ASC, SORT_NUMERIC)
          );

        //Call it like this:  
        $sortedData = $this->MultiSort($return_array, $sortCriteria, true);

        return $sortedData;
    }

    function excelDateToPHPDate($readDate)
    {
        $phpexcepDate = $readDate-25569; //to offset to Unix epoch
        return strtotime("+$phpexcepDate days", mktime(0,0,0,1,1,1970));
    }

    function displayExcelDate($date)
    {
        if (is_numeric($date))
        {
            return date("d/m/Y", $this->excelDateToPHPDate($date));
        }
        else
        {
            return $date;
        }
    }

    public function get_dependency($dependency_array, $dependency_id)
    {
        return $dependency_array[$dependency_id];
    }

    public function get_actions_relating_to_depenency($actions_array, $dependency_id)
    {

    }

    public function get_rag_totals($dependency_array)
    {
        $total_array = array(
            'Red' => 0,
            'Amber' => 0,
            'Green' => 0,
        );

        foreach ($dependency_array as $no => $dependency)
        {
            if ($dependency['RAG'] == 'Red') { $total_array['Red'] = $total_array['Red'] + 1; }
            if ($dependency['RAG'] == 'Amber') { $total_array['Amber'] = $total_array['Amber'] + 1; }
            if ($dependency['RAG'] == 'Green') { $total_array['Green'] = $total_array['Green'] + 1; }
        }

        return $total_array;
    }

    function get_logical_next_steps($dependency_array)
    {
        $next_steps = array();

        foreach ($dependency_array as $no => $dependency)
        {
            // If Accenture Stream is blank, add an Accentue Stream
            if (!isset($dependency[$this->excel_headers['accenture_stream']]) && isset($dependency[$this->excel_headers['accenture_owner']]))
            {
                $next_steps[$no]['action'] = "Speak to ".$dependency[$this->excel_headers['accenture_owner']]." regarding clarifying the stream owner for Dependency #".$dependency[$this->excel_headers['dependency_id']].": ".$dependency[$this->excel_headers['description']];
                $next_steps[$no] = array (
                    'accenture_owner' => $dependency[$this->excel_headers['accenture_owner']],
                );
            }

            // If Origionally agreed date is not entered or is alphanumeric then need to communicate to the external party
            if ( !isset($dependency[$this->excel_headers['agreed_date']]) || !is_numeric($dependency[$this->excel_headers['agreed_date']]) )
            {
                $next_steps[]['action'] = "Communicate dependency #".$dependency[$this->excel_headers['dependency_id']]." to ".$dependency[$this->excel_headers['external_party']]." regarding the need for ".$dependency[$this->excel_headers['description']];
            }

            // If 3rd party has not yet confirmed that they agree to the date then flag that this needs to be ageed and confirmed

            if ( !isset($dependency[$this->excel_headers['agreed_date']]) || !is_numeric($dependency[$this->excel_headers['agreed_date']]) )
            {
                $next_steps[]['action'] = "Agree with ".$dependency[$this->excel_headers['external_party']]." when they will deliver the dependency for ".$dependency[$this->excel_headers['description']];
            } 

            // if Critical Date is not added, then speak to Accenture Delivery/Test lead
        }

        return $next_steps;
    }
}

?>