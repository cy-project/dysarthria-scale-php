<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userapplication extends CI_Controller {
	var $data = array();
	var $datoem = array();
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->library('Permission');
		$this->load->model('Permission_model');
	}

	public function users()
	{
		$this->load->view('users');
	}
	public function usersadmin()
	{
		$Permissions_data = new Permission();
		$PermissionsData = $Permissions_data->Permissions_list_data();
		print_r($PermissionsData);
		$this->load->view('users-admin');
	}
	public function newgroup()
	{
		$GroupDetails = new Permission_model();
		$this->data = $GroupDetails->getGroupDetails();
		$this->datoem = $GroupDetails->getGroupDetails1();
		$this->load->view('new-Group',$this->data,$this->datoem);
	}
	
	public function insertGroup(){
		$number = $this->input->post("number");  
		$permissions_option = $this->input->post("permissions_option");  
		$groupname = $this->input->post("groupname");  
		if($number == "1"){
			$Group_name->createGroup($groupname);
			$Method->insertGroup($groupname,$permissions_option);
			echo '/usersadmin';
		}
		else{
			echo '/newgroup';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */