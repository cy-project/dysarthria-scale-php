<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projectview_admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
		if ($_COOKIE['name'] == '1') {
			echo $_COOKIE['name'];
		} else {
		
		}
	}
	public function project_board()
	{
		$this->load->view('project_board');
	}
	public function news()
	{
		$this->load->view('index-news');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */