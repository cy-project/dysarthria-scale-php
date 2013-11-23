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
	
	public function freeze($uid)//°±Åv
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


}