<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('Personal_data');
		$this->load->library('Member');
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
		
		/*欄位不得為空值判斷*/
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
		/*密碼不相同判斷*/
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
		/*使用身分判斷*/
		if( $identity == "0" ){  
			$this->load->view('register',Array(  
				"errorMessage" => "請選擇身分！" ,  
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
		/*帳號驗證判斷*/
		$exist = $mem->isExist($account);
		
		if ($exist == 0)
		{
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
		else
		{
			$this->load->view('register',Array(  
				"errorMessage" => "這個帳號已有人使用，請重新輸入帳號！" ,  
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
		
 
    }
	
	public function login()
	{
		session_start();  
		if(isset($_SESSION["account"]) && $_SESSION["account"] != null){ //已經登入的話直接回首頁  
			redirect(base_url("/dysarthria/index")); //轉回首頁  
			return true;
		}  
		$this->load->view('login');
	}
	
	public function logining()
	{  
		$mem = new Member;
		
		session_start();  
		if(isset($_SESSION["account"]) && $_SESSION["account"] != null){ //已經登入的話直接回首頁  
			redirect(base_url("/dysarthria/index")); //轉回首頁  
			return true;  
		}  
		$account = trim($this->input->post("account"));  
		$password = trim($this->input->post("password"));  
		
		$exist = $mem->isExist($account);
		
		if($exist == 0)
		{
			$this->load->view(  
				"login",  
				Array( "account" => $account ,  
					"errorMessage" => "使用者帳號或密碼錯誤"  
				)  
			);        
			return true;
		}
		else
		{
			$user = $this->check($account,$password);
		}
		
		if($user == 0)
		{
			$this->load->view(  
				"login",  
				Array( "account" => $account ,  
					"errorMessage" => "使用者帳號或密碼錯誤"  
				)  
			);        
			return true;
		}
		else
		{
			$_SESSION["account"] = $account; //SESSION 帳號
			
			$person = $mem->getMemberData($account);
			$_SESSION["username"] = $person->name; //SESSION 使用者名稱
			
			redirect(base_url("/dysarthria/index")); //轉回首頁
		}
	} 

	public function check($account,$password)
	{
		
		$mem = new Member;
		
		$person = $mem->getMemberData($account);

		if($person->password == $password)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	
	}
	
	public function logout(){  
		session_start();  
		session_destroy();  
		redirect(base_url("/welcome/login")); //轉回登入頁  
	}
}