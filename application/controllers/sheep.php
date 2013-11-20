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
		
		$data = $per->selectPermission(2);
		
		//$per->addPermission(1,2);//組合鍵問題
		
		
		foreach ($data->result() as $row)
		{
			echo $row->group_id.'</p>';
		}
	
		
	}
	
	


}
