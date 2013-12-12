<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projectadmin extends CI_Controller {
	
	var $data =array();
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('Project_model');
	}
	public function project_home()
	{
		setcookie("member_id",$_SESSION['id'],time()+3600);
		$project_list =  new Project_model();
		$member_id = $_SESSION['id'];
		
		$this->data = $project_list->getProject_List($member_id);
		print_r($this->data);
		$this->load->view('project_home',$this->data);
	}
	public function project_new_admin()
	{
		$this->load->view('project_new_admin');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */