<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dysarthria extends CI_Controller {

	public function index()
	{
		$this->load->view('dysarthria');
	}
	public function head()
	{
		$this->load->view('head');
	}
	public function navbar()
	{
		$this->load->view('navbar');
	}
	public function sidebar()
	{
		$this->load->view('sidebar-nav');
	}
	public function news()
	{
		$this->load->view('dysarthria-news');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */