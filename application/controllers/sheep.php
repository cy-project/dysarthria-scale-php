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
		
		//$data = $per->selectPermission(2);
		
	//	$per->createGroup('檢測');//組合鍵問題
		
		$pid = array(4,5,6);
		
		$per->removePermission(1,1,1);
		
	/*	foreach ($data->result() as $row)
		{
			echo $row->group_id.'</p>';
		}
	
		*/
	}
	
	


}
