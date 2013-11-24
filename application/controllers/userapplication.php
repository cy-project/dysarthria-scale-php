<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userapplication extends CI_Controller {

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