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

		$last_line = system('java Deczip D:\\test2.zip D:\\', $return_var);

 
		
	/*	$test = new Java("Deczip");
		
		$test->decompressFile("D:\\test2.zip", "D:\\");
		
	/*	 $dm = new Dispatch_json;

		 $dm->dispatch(3,2);
	
		//echo 'test';
		
		
		
		/** project_model getTesting List example*/
		/*$pm = new Project_model;
		
		$test = $pm->getTestingList(1);
			
		echo ''.$test[2]->bir;
*/

		
		
		
	}
	


}
