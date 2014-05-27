<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sheep extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		ini_set("max_execution_time", "0");
		$this->load->helper('file');
		$this->load->library('Ftpdownload');
		$this->load->model('Member_model');
		$this->load->library('Dispatch_json');
		$this->load->library('Deczip');
		$this->load->model('Project_model');
		$this->load->library('Transform');
		$this->load->library('Datamodel');
		$this->load->library('Uploadfiles');
		$this->load->library('Recognition');
		$this->load->library('Statistics');
		$this->load->model('Recognition_model');
	}
	
	public function index()
	{
		
		$rc = new Recognition();
		
		$s = new Statistics();
	

		$rm =  new Recognition_model();
		
		//$data = $rm->getJudgmentResult(10512);
		
		
		$s->Comparison();
		//33030
		//14034=23107 NO 32399=41472
		
		//echo $data[14034]->id;
		
		$i = 32400;
		$j = 1;
		/*while($i < 33030)
		{
			$rc->recognitionAudio($data[$i]->id);
			$i++;
			//sleep(2);
			/*$j++;
			if ($j == 100)
			{
				$j = 1;
				echo $i.'<br/>';
				sleep(5);
				
			}
			echo $i.'<br/>';
		}
		*/
		//echo $i;
		
	
		
	
		//$data = new Datamodel();
		
		//$up = new Uploadfiles();
		
		

	//	$data[0]->filepath = ".//test.zip";
		//$data->filepath = base_url("Deczip.class");

		//echo $data[0]->filepath;
		
		//$up->uploadFiles($data);
	
		/*$zip =  new Deczip;
		
		$zip->dec("D:\\test2.zip");

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

		 $dm->dispatch(10,2);
	
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
