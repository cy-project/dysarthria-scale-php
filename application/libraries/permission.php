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
	
	
	public function addPermission($gid,$uid)//user add permission group
	{
		$pm = new permission_model;
		
		$pm->addPermission($gid,$uid);
		
	
	}
	
	public function createGroup($pidarray)//create a permission group
	{
		$pm = new Permission_model;
		
		
		
	
	}
	
	public function selectPermission($uid)
	{
		$pm = new Permission_model;
		
		return $pm->selectPermission($uid);
	
	}


}



