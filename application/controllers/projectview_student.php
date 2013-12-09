<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_student extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		
	}
	public function projectview(){
		$this->load->view("project_home_student");
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