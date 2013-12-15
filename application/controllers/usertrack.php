<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usertrack extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
	
	}

	public function usertracking()
	{
		$this->load->helper('url');
		$this->load->view('user-track');
	}
}

/* End of file user-track.php */
/* Location: ./application/controllers/usertrack.php */