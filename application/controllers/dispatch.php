<?php

class Dispatch extends CI_Controller
{
	function __construct()
	{
		parent::construct();
		$this->load->library('Dispatch_json');
	}
	
	public function index()
	{
		$dm = new Dispatch_json;
		
		$dm->dispatch(1);
	
	}



}
