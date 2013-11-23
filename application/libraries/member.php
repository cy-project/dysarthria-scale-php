<?php

class Member
{

	function __construct()
	{
		$CI=& get_instance();
		$CI->load->model('Member_model');
		$CI->load->library('Personal_data');
	
	}
	
<<<<<<< HEAD
	public function register($person)
=======
	public function register($person)//µù¥U
>>>>>>> eea7443a571b230f72a82a8985d3f433cc6bb530
	{
		$mm = new Member_model;
		$mm->insertMember($person);
	}
	
<<<<<<< HEAD
	public function remove()
	{
	
	}
	
=======
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
>>>>>>> eea7443a571b230f72a82a8985d3f433cc6bb530


}