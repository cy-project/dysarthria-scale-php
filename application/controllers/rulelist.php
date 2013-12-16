<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rulelist extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
	
	}

	public function rulelistshow()
	{
		$this->load->helper('url');
		$this->load->view('rulelist');
	}
}

/* End of file user-track.php */
/* Location: ./application/controllers/usertrack.php */