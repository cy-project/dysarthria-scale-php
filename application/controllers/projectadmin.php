<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projectadmin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
	}
	public function project_home()
	{
		$this->load->view('project_home');
	}
	public function project_new_admin()
	{
		$this->load->view('project_new_admin');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */