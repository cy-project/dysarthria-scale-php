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
	
	
	public function insertGroup($name,$uid)//user add permission group
	{
		$pm = new permission_model;
		
		$pm->insertGroup($name,$uid);
		
	
	}
	
	public function createGroup($name)//create a permission group
	{
		$pm = new Permission_model;
		
		$pm->createGroup($name);
		
	
	}
	
	public function selectPermission($uid)
	{
		$pm = new Permission_model;
		
		return $pm->selectPermission($uid);
	
	}


}



