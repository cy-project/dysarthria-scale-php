<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userapplication extends CI_Controller {
	var $data = array();
	var $datoem = array();
	var $datacount = array();
	var $count1;
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
		$this->data = $this->uri->uri_to_assoc(3);
		if($this->data['count'] == 2){
			$this->datacount = $GroupDetails->selectPermissionGroup($this->data['id']);
			$this->datoem = $GroupDetails->selectGroupName($this->data['id']);
		}
		
		$this->load->view('new-Group',$this->data,$this->datacount,$this->datoem);
	}
	
	public function insertGroup(){
		$Group_name = new Permission_model();
		$this->data = $this->uri->uri_to_assoc(3);
		$number = $this->input->post("number");  
		$permissions_option = $this->input->post("permissions_option");  
		$groupname = $this->input->post("groupname");  
		$judge_value = $this->input->post("judge_value");  
		if($number == "1"){
			if($judge_value == "0"){
				$Group_name->createGroup($groupname);
				$Group_name->insertGroup($groupname,$permissions_option);
			}
			else{
				$Group_name->createGroup($groupname);
			}
			echo '/usersadmin';
		}
		else{
			echo '/newgroup';
		}
	}
	
	public function Select_area_1(){//ек
		$GroupDetails = new Permission_model();
		$id = $this->input->post("id");  
		$this->count1 = $this->input->post("count");  
		if($this->count1 == 1){
			$this->data = $GroupDetails->getGroupDetails1();
			$this->datoem = $GroupDetails->getGroupDetails();
		}
		elseif($this->count1 == 2){
			$this->data = $GroupDetails->getGroupDetails1();
			$this->datoem = $GroupDetails->getGroupDetails();
			$this->datacount = $GroupDetails->selectPermissionGroup($id);
		}
		$this->load->view('GroupList_1',$this->data,$this->datoem,$this->datacount,$this->count1);
	}
	
	public function Options_area_2(){//еk
		$GroupDetails = new Permission_model();
		$id = $this->input->post("id");  
		$this->count1 = $this->input->post("count");  
		if($this->count1 == 1){
			$this->data = $GroupDetails->getGroupDetails1();
			$this->datoem = $GroupDetails->getGroupDetails();
		}
		elseif($this->count1 == 2){
			$this->data = $GroupDetails->getGroupDetails1();
			$this->datoem = $GroupDetails->getGroupDetails();
			$this->datacount = $GroupDetails->selectPermissionGroup($id);
		}
		$this->load->view('GroupList_2',$this->data,$this->datoem,$this->datacount,$this->count1);
	}
	
	public function Permissions_apply(){
		$Permissions_data = new Permission();
		$this->data = $Permissions_data->getPermissionsList();
		$this->load->view('Permissions_apply',$this->data);
	}
	
	public function EditorGroup(){
		$Group_name = new Permission_model();
		$this->data = $this->uri->uri_to_assoc(3); 
		$permissions_option = $this->input->post("permissions_option");  
		$groupname = $this->input->post("groupname");  
		$judge_value = $this->input->post("judge_value"); 
		$Group_name->removePermissionGroup($this->data['id']);
		$Group_name->updateGroup($this->data['id'], $groupname);
		if($judge_value == "0"){
			$Group_name->insertGroup($groupname,$permissions_option);
		}
		echo '/usersadmin';
	}
	
	public function RemoveGroup(){
		$Group_name = new Permission_model();
		$Permissions_data = new Permission();
		$this->data = $this->uri->uri_to_assoc(3);
		$Group_name->RemoveGroup($this->data['id']);
		$this->data = $Permissions_data->getPermissionsList();
		$this->load->view('users-admin',$this->data);
	}
	
	public function showpermissions(){
		$Permissions_data = new Permission();
		$data = $this->input->post("id"); 
		$this->datacount = $Permissions_data->selecPermissionName($data);
		//$this->load->view('testview',$this->datacount);
		echo $this->datacount ;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
