<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sheep extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('Personal_data');
		$this->load->model('Member_model');
		$this->load->library('Dispatch_json');

	}
	
	public function index()
	{

		 $dm = new Dispatch_json;

		 $dm->dispatch(1,1);
	


	}
	


}
