<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userapplication extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
	
	}

	public function users()
	{
		$this->load->helper('url');
		$this->load->view('users');
	}
	public function head()
	{
		$this->load->helper('url');
		$this->load->view('head');
	}
	public function navbar()
	{
		$this->load->helper('url');
		$this->load->view('navbar');
	}
	public function sidebar()
	{
		$this->load->helper('url');
		$this->load->view('sidebar-nav');
	}
	public function usersadmin()
	{
		$this->load->helper('url');
		$this->load->view('users-admin');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */