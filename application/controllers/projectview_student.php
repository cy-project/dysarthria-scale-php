<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_student extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->model('Project_model');
		session_start();
		$this->load->helper(array('form','url'));
		$this->load->library('Deczip');
	}
	public function projectview(){
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$project_list =  new Project_model();
		$member_id = $_SESSION['id'];
		$this->data = $project_list->getProject_List($member_id);
		$this->load->view("project_home_student",$this->data);
	}
	
	public function project_home_ajax(){
		
		$member_id = $_SESSION['id'];
	
		$this->load->model('project_mysql_data');
		$project = new project_mysql_data();
		
		$data['project']=$project->select_project_all($member_id);
		
		$this->load->view("project_home_ajax",$data);
		
	}
	
	public function project_board(){

		$data = $this->uri->uri_to_assoc(3);
		$this->load->view("project_board_student",$data);
		
	}
	
	public function project_board_ajax(){
		
		$data = $this->uri->uri_to_assoc(3);
		$this->load->model('project_mysql_data');
		$project = new project_mysql_data();
		$data['surveying']=$project->select_project_surveying($data['project_id']);
		$this->load->view("project_board_ajax",$data);
		
	}
	
	public function project_upload(){
		
		$this->load->view("project_upload");
	}
	
	public function upload()
	{	
		$deczip = new Deczip;
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types']='zip|jpg';
		$config['max_size']	= '100000';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';
		
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('project_upload',$error);
		}
		else
		{
			/*system/library/Upload.php line202 暴力破解法!!!*/
			$data = array('upload_data' => $this->upload->data());
			
			$path = $data['upload_data']['full_path'];//;"C:\\xampp\htdocs\dysarthria-scale-php\uploads\test.zip"
			
			$zipresult = $deczip->dec($path);
			
			$this->load->model('test_models');
			$test_models = new test_models();
			
			
			$data['testfile']=$test_models->upload_test_file($zipresult);
			
			
			for($i=0;$i<count($zipresult);$i+=2){
				
					$file_arr = explode(".",$zipresult[$i+1]);
					 
					$file_name[]=$file_arr[count($file_arr)-2];//撈檔名;
					
			}
			$data['file_name']=$file_name;
		
			
			//print_r($data);
			
			$this->load->view('project_upload',$data);
		}
	}
	
	/*public function project_uploading(){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload',$config);

		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('project_upload',$error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('project_upload',$data);
		}
	}*/
	
	public function subjects_view_group_student(){
		/*$category=$_GET['category'];
		if($category=='檢視'){
			$this->data['category']=$_GET['category']."類別";
			$this->data['name']="(".$_GET['name'].")";
		}
		elseif($category=="評測"){
			$this->data['category']=$_GET['category']."類別";
			$this->data['name']="(案例".$_GET['name'].")";
		}*/
		$data = $this->uri->uri_to_assoc(3);
		//print_r($data);
		$this->load->view("subjects-view-group-student",$data);
	}
	
	public function subjects_view_glossary_student(){
	
		
		
		$data = $this->uri->uri_to_assoc(3);
		$data['name']=$_GET['name'];
		//print_r($data);
		$this->load->view("subjects-view-glossary-student",$data);
		
	}
	
	public function testview(){
		$name=$_GET['name'];
		$this->data['name']=$name;
		$this->load->view("testview",$this->data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */