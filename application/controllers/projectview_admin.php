<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	var $data = array();
	var $countt;
	var $name,$competence,$timeis;
	function __construct()
	{
		parent::__construct();	
		
	}
	public function new_picking(){
		$test=$_POST['name_button'];
		$test1=$_POST['name'];
		$this->data['count_button']=$test;
		$this->data['count_page']=$test1;
		echo $this->data['count_button'];
	}
	public function new_personnel_Practitioner(){
		$this->load->view('New-personnel-Practitioner');
	}
	public function project_board()
	{
		$this->load->view('project_board');
	}	
	public function subjects_new_data(){
		$this->name=$_GET['name'];
		$this->data['stu_name'] =$this->name;
		$this->load->view('subjects-new-data',$this->data);
	}
	public function practitioner_alter(){
		$this->name=$_GET['name'];
		$this->data['name'] =$this->name;
		$this->load->view('practitioner-alter',$this->data);
	}
	public function evaluators_naw_data()
	{
		$this->name=$_GET['name'];
		$this->data['evaluators_name'] =$this->name;
		$this->load->view('evaluators-naw-data',$this->data);
	}
	public function subjects_view_group(){
		$this->load->view('subjects-view-group',$this->data);
	}
	public function subjects_view_glossary(){
		$this->load->view('subjects-view-glossary',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */