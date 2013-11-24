<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('Personal_data');
		$this->load->library('member');
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function slide()
	{
		$this->load->view('slideshow');
	}

	public function register()
	{
		$this->load->view('register');
	}
	
	public function registering(){  
        $person = new Personal_data;
		$mem = new Member;
		
		$account = $this->input->post("account");  
        $password = $this->input->post("password");  
        $passwordrt = $this->input->post("passwordrt");  
        $name = $this->input->post("name");  
        $mail = $this->input->post("email");
        $tel1 = $this->input->post("telephone");
        $contacter = $this->input->post("contact");
        $tel2 = $this->input->post("telephone2");
        $identity = $this->input->post("recipient");
		
		if( trim($account) =="" || trim($password) =="" || trim($name) =="" || trim($mail) =="" || trim($tel1) =="" || trim($contacter) =="" || trim($tel2) =="" || trim($identity) =="" ){  
			$this->load->view('register',Array(  
				"errorMessage" => "資料不得有空值，請重新輸入！" ,  
				"account" => $account ,
				"name" => $name ,
				"mail" => $mail ,
				"tel1" => $tel1 ,
				"contacter" => $contacter ,
				"tel2" => $tel2 ,
				"identity" => $identity
			));  
			return false;  
		}  
	  
		if( $password != $passwordrt ){  
			$this->load->view('register',Array(  
				"errorMessage" => "密碼不相同，請重新輸入！" ,  
				"account" => $account ,
				"name" => $name ,
				"mail" => $mail ,
				"tel1" => $tel1 ,
				"contacter" => $contacter ,
				"tel2" => $tel2 ,
				"identity" => $identity
			));  
			return false;  
		}  
		
		/*model帳號驗證實作*/
		
		$person->account = $account;
        $person->password = $password;
        $person->name = $name;
        $person->mail = $mail;
        $person->tel1 = $tel1;
        $person->contacter = $contacter;
        $person->tel2 = $tel2;
        $person->identity = $identity;
		
		$mem->register($person);
		
		$this->load->view('register',Array(  
			"successMessage" => "你已經完成註冊，接下來馬上到登入頁面去試試看吧！  
			<a href=" . base_url() . ">回首頁</a> " ,  
		)); 
    }
	
	public function login()
	{
		$this->load->view('login');
	}
	
	/*public function login(){  
		session_start();  
		if(isset($_SESSION["user"]) && $_SESSION["user"] != null){ //已經登入的話直接回首頁  
			redirect(base_url()); //轉回首頁  
			return true;  
		}  
	  
		$this->load->view('login');  
	} 
	
	public function logining(){  
		session_start();  
		if(isset($_SESSION["user"]) && $_SESSION["user"] != null){ //已經登入的話直接回首頁  
			redirect(site_url("/")); //轉回首頁  
			return true;  
		}  
	  
		$account = trim($this->input->post("account"));  
		$password = trim($this->input->post("password"));  
	  
		$this->load->model("UserModel");  
		$user = $this->UserModel->getUser($account,$password);  
	  
		if($user == null){  
			$this->load->view(  
				"login",  
				Array( "pageTitle" => "發文系統 - 會員登入"  ,  
					"account" => $account,  
					"errorMessage" => "使用者或密碼錯誤"  
				)  
			);        
			return true;  
		}  
	  
		$_SESSION["user"] = $user;  
		redirect(site_url("/")); //轉回首頁  
	}  
	  
	public function logout(){  
		session_start();  
		session_destroy();  
		redirect(site_url("/user/login")); //轉回登入頁  
	}*/	
}