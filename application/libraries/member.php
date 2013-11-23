<?php

class Member
{

	function __construct()
	{
		$CI=& get_instance();
		$CI->load->model('Member_model');
		$CI->load->library('Personal_data');
	
	}
	
	public function register($person)
	{
		$mm = new Member_model;
		$mm->insertMember($person);
	}
	
	public function remove()
	{
	
	}
	


}