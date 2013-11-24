<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexnews extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function news()
	{
		$this->load->helper('url');
		$this->load->view('index-news');
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */