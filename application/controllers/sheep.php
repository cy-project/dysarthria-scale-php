<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sheep extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('Personal_data');
		$this->load->model('Member_model');
		$this->load->library('Dispatch_json');
		$this->load->library('Datamodel');
		$this->load->model('Project_model');
		
	}
	
	public function index()
	{
		//system('cd java', $return_var);

		//$last_line = exec('java Deczip D:\\test2.zip D:\\', $file_list, $return_var);
		
		//print_r($file_list);
		if (file_exists(base_url()."/schedule_20131124.json"))
		{
			unlink(base_url()."/schedule_20131124.json");
		}
		
		
		
		/*

		
		 $dm = new Dispatch_json;

		 $dm->dispatch(1,1);
	
		//echo 'test';
		
		
		
		/** project_model getTesting List example*/
		/*$pm = new Project_model;
		
		$test = $pm->getTestingList(1);
			
		echo ''.$test[2]->bir;
*/

		
		
		
	}
	


}
