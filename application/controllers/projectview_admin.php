<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	var $data = array();
	var $dato = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->library('Personal_data');
		$this->load->library('Datamodel');
		$this->load->model('Project_model');
		$this->load->model('Member_model');
		$this->load->model('test_models');
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
		$this->data['name'] = $project_List->Project_name($dota->project_id);
		$this->load->view('project_board',$this->data);
	}	
	public function subjects_list()
	{//分頁切換的頁面
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$member_id = $this->input->post('member_id');
		$number_page = $this->input->post('number_page');
		$project_id = $this->input->post('project_id');
		if($number_page == 1){//專案成員
			$pm = new Project_model;
			$this->data = $pm->getPeopleList($project_id);
			$this->load->view('project_members',$this->data);
		}
		elseif($number_page == 2){//受測者
			$pm = new Project_model;
			$this->data = $pm->getTestingList($project_id);
			$this->data['project_id'] = $project_id;
			$this->load->view('subjects_list_admin',$this->data);
		}
		elseif($number_page == 3){//申請者
			$this->load->view('applicant');
		}
		elseif($number_page == 4){//追蹤名單
			$this->load->view('track_list');
		}
		
	}
	public function subjects_data()
	{//新增受測者資料
		$count = 0;
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
		$date=  date("Y");
		print_r($date);
		
		
		$child->name = $subjects_name;
		$child->sex = $subjects_sex;
		$child->age = 0;
		$child->grade = $subjects_grade;
		$child->rank = $subjects_class;
		$child->language = $subjects_language;
		$child->county = $subjects_counties;
		$child->school = $subjects_school;
		$child->project_id =  $this->data['project_id'];
		
		if($subjects_name != null && $count == 0){
			$project->addChild($child);
			$this->data['member_id'] = $_SESSION['id'];
			$this->load->model('test_models');
			$project_List = new test_models;
			$this->data['name'] = $project_List->Project_name($this->data['project_id']);
			$this->load->view('project_board',$this->data);
			$count ++;
		}
		else
		{
			setcookie("project_id",$this->data['project_id'],time()+3600);
			$this->load->view('subjects_data_new',$basic_data);
		}
		
		
	}
	public function modification_data_child(){//修改受測者
		$count = 0;
		
		$project = new Project_model();
		$this->data = $this->uri->uri_to_assoc(3);
		
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$subjects_name=$this->input->post('subjects_name');//*
		$subjects_sex=$this->input->post('subjects_sex');
		$subjects_birth=$this->input->post('subjects_birth');
		$subjects_counties=$this->input->post('subjects_counties');
		$subjects_school=$this->input->post('subjects_school');
		$subjects_grade=$this->input->post('subjects_grade');
		$subjects_class=$this->input->post('subjects_class');
		$subjects_language=$this->input->post('subjects_language');
		
		$child = array(
			'name' => $subjects_name,
			'sex' => $subjects_sex,
			'bir' => $subjects_birth,
			'grade' => $subjects_grade,
			'rank' => $subjects_class,
			'language' => $subjects_language,
			'county' => $subjects_counties
		);
		/*$child->name = $subjects_name;
		$child->sex = $subjects_sex;
		$child->birth = $subjects_birth;
		$child->age = 0;
		$child->grade = $subjects_grade;
		$child->rank = $subjects_class;
		$child->language = $subjects_language;
		$child->county = $subjects_counties;
		$child->school = $subjects_school;
		$child->project_id =  $this->data['project_id'];
		$child->id =  $this->data['child_id'];*/
		
		if($count == 0){
			$project->updateChild($this->data['child_id'],$child);
			$this->data['member_id'] = $_SESSION['id'];
			$this->load->model('test_models');
			$project_List = new test_models;
			$this->data['name'] = $project_List->Project_name($this->data['project_id']);
			$this->load->view('project_board',$this->data);
			$count ++;
		}
		else
		{
			setcookie("project_id",$this->data['project_id'],time()+3600);
			$this->load->view('subjects_data_new',$basic_data);
		}
		
	}
	public function subjects_new_data()
	{//修改資料(受測者)]
		$child_data =  new Project_model();
		$this->data = $this->uri->uri_to_assoc(3);
		$this->data = $child_data->getModificationChildrenData($this->data['child_id']);
		$this->dato = $this->uri->uri_to_assoc(3);
		$this->dato['project_name'] = $child_data->getProjectName($this->dato['project_id']);
		$this->load->view('subjects-new-data',$this->dato,$this->data);
	}
	public function subjects_data_new()
	{//新增受測者畫面
		$pn = new Project_model;
		$this->data = $this->uri->uri_to_assoc(3);
		$this->data['project_name'] = $pn->getProjectName($this->data['project_id']);
		$this->load->view('subjects-data',$this->data);
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
	public function download_excel(){
		
		$this->load->helper('url');
		$this->load->model('score_model');
		$model = new score_model();
		$test_model = new test_models();
		$pm = new Project_model;
		$this->data = $this->uri->uri_to_assoc(3);
		
		$children['name'] = "";
		$children['score'] = "";
		$office_id = $this->data['office_id'];
		
		$this->data['project_name'] = $pm->getProjectName($this->data['project_id']);
		
		$project_name = $this->data['project_name'];
		$project_id = $this->data['project_id'];
		
		$this->data['children_data'] = $pm->getTestingList($project_id);
		
		$length = count($this->data['children_data']);
		$nb = 0;
		
		for($i = 0;$i < $length; $i++)
		{
			$testing_id = $test_model->excel_change_testing_id($this->data['children_data'][$i]->id);
			
			$testing_list_id = $testing_id[0]->id;
			$member_id = 1;
			
			$data['intern'] = $model->score_intern_speech_ajax($testing_list_id,$member_id,$project_id,$office_id); //注音
			
			$data['intern2'] = $model->score_intern_speech_ajax_2($testing_list_id,$member_id,$project_id,$office_id); //念句子 數數字 輪替唸音 說故事 資料
			
			$result['data'] = $data['intern']->result();
			
			$result2['data'] = $data['intern2']->result();
			
			
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */