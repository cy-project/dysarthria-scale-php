<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dysarthria extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
	}
	
	public function index()
	{
		  
		$data=$_SESSION;
		if(isset($_SESSION["account"]) && $_SESSION["account"] != null){ //已經登入的話直接回首頁  
			$this->load->view('dysarthria',$data);  
		}
		else {
			$this->load->view('login'); 
		}
	}
	public function news()
	{
		$this->load->view('dysarthria-news');
	}
	
	public function sidebar_nav(){
		/*echo $asd = trim($this->input->post("asd")); 
		echo $zxc = trim($this->input->post("zxc")); */
		
		$this->load->view('sidebar-nav');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */