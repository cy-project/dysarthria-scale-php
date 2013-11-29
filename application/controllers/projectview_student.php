<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_student extends CI_Controller {
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		
	}
	public function projectview(){
		$this->load->view("project_home_student");
	}
	public function project_board(){
		$this->load->view("project_board_student");
	}
	public function test(){
		$this->load->view("test");
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */