<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_student extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		session_start();
		$this->load->helper(array('form','url'));
	}
	public function projectview(){
		$this->load->view("project_home_student");
	}
	
	public function project_home_ajax(){
	
		$this->load->model('project_mysql_data');
		$project = new project_mysql_data();
		$data['project']=$project->select_project_all();
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
		$this->load->model('project_mysql_data');
		$project = new project_mysql_data();
		$data['project']=$project->select_project_all();
		$this->load->view("project_upload",$data);
	}
	
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
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