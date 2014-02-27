<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userapplication extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('Project_model');
	}

	public function users()
	{
		$this->load->view('users');
	}
	public function usersadmin()
	{
		$this->load->view('users-admin');
	}
	public function newgroup()
	{
		$GroupDetails = new Project_model();
		$this->data = $GroupDetails->getGroupDetails();
		$this->load->view('new-Group',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */