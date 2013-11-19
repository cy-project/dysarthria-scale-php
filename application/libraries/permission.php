<?php

class Permission 
{
	
	function __construct()
	{

		$CI = & get_instance();
		$CI->load->model('Permission_model');
	}
	
	public function test()
	{
		$pm = new Permission_model;
		
		return $pm->testmodel();
	
	
	}
	
	
	public function addPermission($uid)
	{
		$pm = new permission_model;
		
		
	
	}
	
	public function createGroup($pidarray)//create a permission group
	{
		$pm = new Permission_model;
		
		
		
	
	}



}



