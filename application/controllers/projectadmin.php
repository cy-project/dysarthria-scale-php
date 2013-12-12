<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projectadmin extends CI_Controller {
	
	var $data =array();
	function __construct()
	{
		parent::__construct();
		session_start();
		
		$this->load->model('Project_model');
		$this->load->library('datamodel');
	}
	public function project_home()
	{
		$this->load->model('project_mysql_data');
		$this->load->view('project_home',$this->data);
	}
	public function project_new_admin()
	{
		$this->load->view('project_new_admin');
	}
	
	public function creating_project()
	{
		$project = New Project_model;
		$data = New datamodel;
		
		/*儲存新增專案資料*/
		$projectname = $this->input->post("ProjectName");  
		date_default_timezone_set('Asia/Taipei');
        $date = date("Y/m/d");  
        $area = $this->input->post("Area");  
        $county = $this->input->post("Counties");  
        $status = $this->input->post("purview");
		
		/*欄位不得為空值判斷*/
		if(trim($projectname) == ""){  
			$this->load->view('project_new_admin',Array(  
				"errorMessage" => "資料不得有空值，請重新輸入！" ,  
				"ProjectName" => $projectname
			));  
			return false;  
		}
		
		/*縣市下拉式選單判斷*/
		if($county == "0"){  
			$this->load->view('project_new_admin',Array(  
				"errorMessage" => "請選擇縣市！" ,  
				"ProjectName" => $projectname
			));  
			return false;  
		}
		
		/*地區下拉式選單判斷*/
		if($area == "請選擇"){  
			$this->load->view('project_new_admin',Array(  
				"errorMessage" => "請選擇地區！" ,  
				"ProjectName" => $projectname ,
				"Counties" => $county
			));  
			return false;  
		}
		
		$data->name = $projectname;
		$data->cr_date = $date;
		$data->area = $area;
		$data->county = $county;
		$data->status = $status;
		
		$project->createProject($data);
		
		redirect(base_url("/projectadmin/project_home"));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */