<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sheep extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Permission');
		
	
	}
	
	public function index()
	{
		$per = new permission;
		
		$data = $per->test();
		
		foreach ($data->result() as $row)
		{
			echo $row->name.'</p>';
		}
	
		
	}
	
	


}
