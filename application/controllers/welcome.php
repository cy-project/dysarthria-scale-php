<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('Personal_data');
		$this->load->model('Permission_model');
	
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function slide()
	{
		$this->load->view('slideshow');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	
	public function registering(){  
        $person = new Personal_data;

		$person->account = $this->input->post("account");  
        $person->password = $this->input->post("password");  
        $person->name = $this->input->post("name");  
        $person->email = $this->input->post("email");
	
    } 
}