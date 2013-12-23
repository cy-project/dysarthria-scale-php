<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->library('Personal_data');
		$this->load->library('Datamodel');
		$this->load->model('Project_model');
		session_start();
	}
	
	public function new_picking(){
		$number_page = $this->input->post('number_page');
		$number_button = $this->input->post('number_button');
		if($number_button==1&&$number_page==2)//新增受測者
			echo'/subjects_data_new';
		elseif($number_button==2&&$number_page==1)//派遣
			echo '/testview';
		elseif(($number_page==1 || $number_page==3 || $number_page==4 )&&$number_button==1)//設置專案成員位置
			echo '/new_personnel_Practitioner';
		
	}
	public function new_personnel_Practitioner()
	{//設置專案成員位置
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$this->load->view('New-personnel-Practitioner');
	}
	public function new_project_board()
	{//新增專案
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$dota = new Datamodel();
		$purview = $this->input->post('purview');
		$project_name = $this->input->post('ProjectName');
		$Counties = $this->input->post('Counties');
		$Area = $this->input->post('Area');
		$date=  date("Y/m/d");
		$dota->name = $project_name;
		$dota->county = $Counties;
		$dota->area = $Area;
		$dota->status = $purview;
		$dota->cr_date = $date;
		$this->load->view('project_home');
	}
	public function project_board()
	{//檢視專案
		$this->data = $this->uri->uri_to_assoc(3);
		$dota = new Datamodel();
		$dota->member_id = $_SESSION['id'];
		$dota->project_id = $this->data['project_id'];
		$cont = array();
		$member_id=$_SESSION["id"];
		$this->load->model('test_models');
		$project_List = new test_models;
		$cont = $project_List->lond_List($_SESSION["id"]);
		$this->load->view('project_board',$this->data);
	}	
	public function subjects_list()
	{//分頁切換的頁面
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$member_id = $this->input->post('member_id');
		$number_page = $this->input->post('number_page');
		$project_id = $this->input->post('project_id');
		if($number_page == 1){
			$this->load->view('surveying_list_admin');
		}
		elseif($number_page == 2){
			$pm = new Project_model;
			$this->data = $pm->getTestingList($project_id);
			print_r($this->data);
			$this->load->view('subjects_list_admin',$this->data);
		}
		elseif($number_page == 3){
			$this->load->view('evaluators_list_admin');
		}
		elseif($number_page == 4){
			$this->load->view('project_manager');
		}
		elseif($number_page == 5){
			$this->load->view('project_members');
		}
		elseif($number_page == 6){
			$this->load->view('applicant');
		}
		
	}
	public function subjects_data()
	{//新增受測者資料
		$child = new Datamodel();
		$basic_data = new Datamodel();
		$project = new Project_model();
		$this->data = $this->uri->uri_to_assoc(3);
		/*
		view未做判斷
		還未作年齡計算
		*/
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$subjects_name=$this->input->post('subjects_name');//*
		$subjects_sex=$this->input->post('subjects_sex');
		$subjects_birth=$this->input->post('subjects_birth');
		$subjects_counties=$this->input->post('subjects_counties');
		$subjects_school=$this->input->post('subjects_school');
		$subjects_grade=$this->input->post('subjects_grade');
		$subjects_class=$this->input->post('subjects_class');
		$subjects_language=$this->input->post('subjects_language');
		$date=  date("Y/m/d");
		
		$child->name = $subjects_name;
		$child->sex = $subjects_sex;
		$child->age = 0;
		$child->grade = $subjects_grade;
		$child->rank = $subjects_class;
		$child->language = $subjects_language;
		$child->county = $subjects_counties;
		$child->school = $subjects_school;
		$child->project_id =  $this->data['project_id'];
		print_r($this->data);
		if($subjects_name != null){
			$project->addChild($child);
			$this->data['member_id'] = $_SESSION['id'];
			
			$this->load->model('test_models');
			$project_List = new test_models;
			$cont = $project_List->lond_List($_SESSION["id"]);
			$this->load->view('project_board',$this->data);
		}
		else
		{
			setcookie("project_id",$this->data['project_id'],time()+3600);
			$this->load->view('subjects_data_new',$basic_data);
		}
		
		
	}
	public function subjects_new_data()
	{//修改資料(受測者)
		$this->data['stu_name']=$this->input->post('name');
		$this->load->view('subjects-new-data',$this->data);
	}
	public function subjects_data_new()
	{//新增受測者畫面
		$this->data = $this->uri->uri_to_assoc(3);
		setcookie("project_id",$this->data['project_id'],time()+3600);
		$this->load->view('subjects-data');
	}
	public function practitioner_alter(){//修改人員(施測者)
		//$this->name=$_GET['name'];
		$this->data['name']=$this->input->post('name');
		$this->load->view('practitioner-alter',$this->data);
	}
	public function subjects_view_group(){
		$this->load->view('subjects-view-group',$this->data);
	}
	public function subjects_view_glossary(){
		$this->load->view('subjects-view-glossary',$this->data);
	}
	public function testview(){
		$this->load->view('testview',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */