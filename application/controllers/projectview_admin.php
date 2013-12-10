<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	var $data = array();
	var $countt;
	var $name,$competence,$timeis;
	function __construct()
	{
		parent::__construct();	
		//$this->load->libaray('Dtat_model');
		session_start();
	}
	public function new_picking(){
		$number_button=$_POST['number_button'];
		$number_page=$_POST['number_page'];
		if($number_button==1&&$number_page==2)//新增受測者
			echo'/subjects_data';
		elseif($number_button==2&&$number_page==1)//派遣
			echo '/testview';
		elseif($number_page==2&&$number_button==1)//新增
			echo '/new_personnel_Practitioner';
		
	}
	public function new_personnel_Practitioner(){
		$this->load->view('New-personnel-Practitioner');
	}
	public function new_project_board()
	{//新增專案
		
		//$data = new Data_model();
		
		$purview=$_POST['purview'];
		$project_name=$_POST['ProjectName'];
		$Counties=$_POST['Counties'];
		$Area=$_POST['Area'];
		$date=  date("Y-m-d");
		/*$data->name = $project_name;
		$data->county = $Counties;
		$data->area = $Area;
		$data->status = $purview;
		$data->cr_date = $date;*/
		$this->load->view('project_board');
	}
	public function project_board()
	{//檢視專案
		$this->name=$_GET['name'];
		$this->load->view('project_board');
	}	
	
	public function subjects_new_data()
	{//修改資料(受測者)
		$this->name=$_GET['name'];
		$this->data['stu_name'] =$this->name;
		$this->load->view('subjects-new-data',$this->data);
	}
	public function subjects_data()
	{//新增施測者
		$data=$_SESSION[''];
		$this->load->view('subjects-data');
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
	public function testview(){
		$this->load->view('testview',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */