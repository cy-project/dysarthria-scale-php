<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->library('Datamodel');
		session_start();
	}
	public function new_picking(){
		$number_button=$_POST['number_button'];
		$number_page=$_POST['number_page'];
		if($number_button==1&&$number_page==2)//新增受測者
			echo'/subjects_data_new';
		elseif($number_button==2&&$number_page==1)//派遣
			echo '/practitioner_alter';
		elseif(($number_page==1 || $number_page==3 || $number_page==4 )&&$number_button==1)//設置專案成員位置
			echo '/new_personnel_Practitioner';
		
	}
	public function new_personnel_Practitioner(){
		$this->load->view('New-personnel-Practitioner');
	}
	public function new_project_board()
	{//新增專案
		
		$dota = new Datamodel();
		
		$purview=$_POST['purview'];
		$project_name=$_POST['ProjectName'];
		$Counties=$_POST['Counties'];
		$Area=$_POST['Area'];
		$date=  date("Y/m/d");
		$dota->name = $project_name;
		$dota->county = $Counties;
		$dota->area = $Area;
		$dota->status = $purview;
		$dota->cr_date = $date;
		$this->load->view('project_board');
	}
	public function subjects_list(){
		$member_id = $_POST['member_id'];
		$number_page = $_POST['number_page'];
		echo $number_page;
	}
	public function subjects_data(){
		$subjects_name=$_POST['subjects_name'];
		$subjects_sex=$_POST['subjects_sex'];
		$subjects_birth=$_POST['subjects_birth'];
		$subjects_counties=$_POST['subjects_counties'];
		$subjects_school=$_POST['subjects_school'];
		$subjects_grade=$_POST['subjects_grade'];
		$subjects_class=$_POST['subjects_class'];
		$subjects_language=$_POST['subjects_language'];
		$date=  date("Y/m/d");
	}
	public function project_board()
	{//檢視專案
		$cont = array();
		$member_id=$_SESSION["id"];
		$this->load->model('test_models');
		$project_List = new test_models;
		$cont = $project_List->lond_List($_SESSION["id"]);
		$this->data['member_id'] = $member_id;
		$this->load->view('project_board',$this->data);
	}	
	
	public function subjects_new_data()
	{//修改資料(受測者)
		//$this->name=$_GET['name'];
		$this->data['stu_name'] =$_GET['name'];
		$this->load->view('subjects-new-data',$this->data);
	}
	public function subjects_data_new()
	{//新增受測者
		$this->load->view('subjects-data');
	}
	public function practitioner_alter(){
		//$this->name=$_GET['name'];
		$this->data['name'] =$_GET['name'];
		$this->load->view('practitioner-alter',$this->data);
	}
	public function evaluators_naw_data()
	{
		//$this->name=$_GET['name'];
		$this->data['evaluators_name'] =$_GET['name'];
		$this->load->view('evaluators-naw-data',$this->data);
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