<?php

class Member
{

	function __construct()
	{
		$CI=& get_instance();
		$CI->load->model('Member_model');
		$CI->load->library('Personal_data');
	
	}
	
	public function register($person)//註冊
	{
		$mm = new Member_model;
		$mm->insertMember($person);
	}
	

	public function remove($uid)//刪除
	{
		$mm = new Member_model;
		
		$mm->removeMember($uid);
	}
	
	public function freeze($uid)//停權
	{
		$mm = new Member_Model;
		
		$mm->freezeMember($uid);
	}

	
	public function update($uid,$array)//更新資料
	{
		/**
		array struct like this array('column_name'=>value,'column_name'=>value);
		*/
	
		$mm = new Member_model;
		
		$mm->updateMember($uid,$array);
	}
	
	public function isExist($account)//判斷帳號是否存在
	{
		$mm = new Member_model;
		
		$result = $mm->selectAccount($account);
		
		return $result;
		
	}
	
	
	
	public function getMemberData($account)
	{
		$mm = new Member_model;
		
		if ($this->isExist($account) != 0)
		{
			$person = $mm->getMemberData($account);
		
			return $person;
		}

	}



}