<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_student extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->model('Project_model');
		session_start();
	}
	public function projectview(){
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$project_list =  new Project_model();
		$member_id = $_SESSION['id'];
		
		$this->data = $project_list->getProject_List($member_id);
		print_r($this->data);
		$this->load->view("project_home_student",$this->data);
	}
	public function project_board(){
		$name=$_GET['name'];
		$this->data['name']=$name;
		$this->load->view("project_board_student",$this->data);
	}
	public function subjects_view_group_student(){
		$category=$_GET['category'];
		if($category=='檢視'){
			$this->data['category']=$_GET['category']."類別";
			$this->data['name']="(".$_GET['name'].")";
		}
		elseif($category=="評測"){
			$this->data['category']=$_GET['category']."類別";
			$this->data['name']="(案例".$_GET['name'].")";
		}
		$this->load->view("subjects-view-group-student",$this->data);
	}
	public function subjects_view_glossary_student(){
		$name=$_GET['name'];
		$this->data['name']=$name;
		$this->load->view("subjects-view-glossary-student",$this->data);
	}
	public function testview(){
		$name=$_GET['name'];
		$this->data['name']=$name;
		$this->load->view("testview",$this->data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */