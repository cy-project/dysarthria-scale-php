<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sheep extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->library('Personal_data');
		$this->load->model('Member_model');
		$this->load->library('Dispatch_json');
		$this->load->library('Datamodel');
		$this->load->model('Project_model');
		
	}
	
	public function index()
	{
		
		/*
		 $dm = new Dispatch_json;

		 $dm->dispatch(1,1);
	
		//echo 'test';
		
		
		
		
		
		/**library "upload rmFiles "*/
		/*
		$array = array("./test/test.txt","/filepath");

		$upload = new Upload();
		
		$upload->rmFiles($array);
		*/
		
		/** project_model getTesting List example*/
		/*$pm = new Project_model;
		
		$test = $pm->getTestingList(1);
			
		echo ''.$test[2]->bir;
		*/

		
		
		
	}
	


}
