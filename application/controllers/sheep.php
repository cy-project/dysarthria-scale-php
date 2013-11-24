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
		
		$dm->dispatch(1);
		
		
		
	/*	$mm = new Member_model;
		
		$person = $mm->getMemberData(1);
		
		echo 'account '.$person->account;
		echo 'name '.$person->name;
		*/

		$per = new permission;

		$mm = new Member;
		
		$mm->remove(3);


		//$data = $per->selectPermission(2);
		
	//	$per->createGroup('檢測');//組合鍵問題
		

		$pid = array(4,5,6);
		
		$per->removePermission(1,1,1);

		//$pid = array(4,5,6);
		
		//$per->removePermission(1,1,1);

		
	/*	foreach ($data->result() as $row)
		{
			echo $row->group_id.'</p>';
		}
	
		*/
	}
	
	


}
