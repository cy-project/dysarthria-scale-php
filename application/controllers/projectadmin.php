<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projectadmin extends CI_Controller {
	
	var $data =array();
	function __construct()
	{
		parent::__construct();
		session_start();
	
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */