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
		$this->data = $Permissions_data->getPermissionsList();
		$this->load->view('users-admin',$this->data);
	}
	public function newgroup()
	{
		$GroupDetails = new Permission_model();
		$this->datoem = $GroupDetails->getGroupDetails();
		$this->load->view('new-Group',$this->datoem);
	}
	
	public function insertGroup(){
		$Group_name = new Permission_model();
		$number = $this->input->post("number");  
		$permissions_option = $this->input->post("permissions_option");  
		$groupname = $this->input->post("groupname");  
		if($number == "1"){
			$Group_name->createGroup($groupname);
			$Group_name->insertGroup($groupname,$permissions_option);
			echo '/usersadmin';
		}
		else{
			echo '/newgroup';
		}
	}
	
	public function Select_area_1(){
		$GroupDetails = new Permission_model();
		$this->data = $GroupDetails->getGroupDetails1();
		$this->datoem = $GroupDetails->getGroupDetails();
		$this->load->view('GroupList_1',$this->data,$this->datoem);
	}
	
	public function Options_area_2(){
		$GroupDetails = new Permission_model();
		$this->data = $GroupDetails->getGroupDetails1();
		$this->datoem = $GroupDetails->getGroupDetails();
		$this->load->view('GroupList_2',$this->data,$this->datoem);
	}
	
	public function Permissions_apply(){
		$Permissions_data = new Permission();
		$this->data = $Permissions_data->getPermissionsList();
		$this->load->view('Permissions_apply',$this->data);
	}
	
	public function editorgroup(){
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */