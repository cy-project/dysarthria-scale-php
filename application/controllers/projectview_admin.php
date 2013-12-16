<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->library('Personal_data');
		$this->load->model('Member_model');
		$this->load->library('Dispatch_json');
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
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$cont = array();
		$member_id=$_SESSION["id"];
		$this->load->model('test_models');
		$project_List = new test_models;
		$cont = $project_List->lond_List($_SESSION["id"]);
		$this->data['member_id'] = $member_id;
		$this->load->view('project_board',$this->data);
	}	
	public function subjects_list()
	{//分頁切換的頁面
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$member_id = $this->input->post('member_id');
		$number_page = $this->input->post('number_page');
		if($number_page == 1){
			$this->load->view('surveying_list_admin');
		}
		elseif($number_page == 2){
			$pm = new Project_model;
			$this->data = $pm->getTestingList($member_id);
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
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$subjects_name=$this->input->post('subjects_name');
		$subjects_sex=$this->input->post('subjects_sex');
		$subjects_birth=$this->input->post('subjects_birth');
		$subjects_counties=$this->input->post('subjects_counties');
		$subjects_school=$this->input->post('subjects_school');
		$subjects_grade=$this->input->post('subjects_grade');
		$subjects_class=$this->input->post('subjects_class');
		$subjects_language=$this->input->post('subjects_language');
		$date=  date("Y/m/d");
		$this->load->view('project_board');
	}
	public function subjects_new_data()
	{//修改資料(受測者)
		$this->data['stu_name']=$this->input->post('name');
		$this->load->view('subjects-new-data',$this->data);
	}
	public function subjects_data_new()
	{
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