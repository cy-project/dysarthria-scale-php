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
		$this->load->library('Transform');
		
	}
	
	public function index()
	{

		/*$test = new Member_model();
		$data = new Datamodel();
		
		$trans = new Transform();
		
		$trans->trans("D:\\test","D:\\test.mp3");
		*/
		/*
		$data->name = "毛姸淇";
		$data->sex = "";
		$data->bir = "2009/07/01";
		$data->age = 0;
		$data->grade = "中班";
		$data->rank = "綿羊";
		$data->county = "高雄市";
		$data->language = "";
		
		$test->insertfile($data);
		*/
		/*
		
		for($temp = 56; $temp <= 60; $temp++){
			for($idx = 1;$idx <= 90; $idx++)
			{
			
			$data->testing_id = $temp;
			$data->topic_id = $idx;
			$data->voice_file = 0;
			
			
			
			$test->insertfile($data);
			}
		}*/
		/*
		 $dm = new Dispatch_json;

		 $dm->dispatch(6,1);
	
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
