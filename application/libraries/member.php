<?php

class Member
{

	function __construct()
	{
		$CI=& get_instance();
		$CI->load->model('Member_model');
		$CI->load->library('Personal_data');
	
	}
	
	public function register($person)//µù¥U
	{
		$mm = new Member_model;
		$mm->insertMember($person);
	}
	

	public function remove($uid)//§R°£
	{
		$mm = new Member_model;
		
		$mm->removeMember($uid);
	}
	
	public function freeze($uid)//åœæ¬Š
	{
		$mm = new Member_Model;
		
		$mm->freezeMember($uid);
	}

	
	public function update($uid,$array)
	{
		/**
		array struct like this array('column_name'=>value,'column_name'=>value);
		*/
	
		$mm = new Member_model;
		
		$mm->updateMember($uid,$array);
	}
	
	public function isExist($account)
	{
		$mm = new Member_model;
		
		$result = $mm->selectAccount($account);
		
		return $result;
		
	}
	
	
	
	public function getMemberData($account)
	{
		$mm = new Member_model;
		
		$person = $mm->getMemberData($account);
		
		return $person;
	}



}