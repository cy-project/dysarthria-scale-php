<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sheep extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
<<<<<<< HEAD
		$this->load->library('Permission');
=======
		$this->load->library('Member');
>>>>>>> eea7443a571b230f72a82a8985d3f433cc6bb530
		
	
	}
	
	public function index()
	{
<<<<<<< HEAD
		$per = new permission;
		
=======
		$mm = new Member;
		
		$mm->remove(3);
>>>>>>> eea7443a571b230f72a82a8985d3f433cc6bb530
		//$data = $per->selectPermission(2);
		
	//	$per->createGroup('檢測');//組合鍵問題
		
<<<<<<< HEAD
		$pid = array(4,5,6);
		
		$per->removePermission(1,1,1);
=======
		//$pid = array(4,5,6);
		
		//$per->removePermission(1,1,1);
>>>>>>> eea7443a571b230f72a82a8985d3f433cc6bb530
		
	/*	foreach ($data->result() as $row)
		{
			echo $row->group_id.'</p>';
		}
	
		*/
	}
	
	


}
