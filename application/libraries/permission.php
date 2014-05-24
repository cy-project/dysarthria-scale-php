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
	
	
	public function insertGroup($name,$pidarray)//user add permission group
	{
		$pm = new permission_model;
		
		$pm->insertGroup($name,$pidarray);
		
	
	}
	
	public function createGroup($name)//create a permission group
	{
		$pm = new Permission_model;
		
		$pm->createGroup($name);
		
	
	}
	
	public function addPermission($gid,$uid,$pid)//add user permission gid->group_id uid->member_id pid->project_id=0 mean is all
	{
		$pm = new Permission_model;
		
		$pm->addPermission($gid,$uid,$pid);
	}
	
	public function removePermission($gid,$uid,$pid)
	{
		$pm = new Permission_model;
		
		$pm->removePermission($gid,$uid,$pid);
	
	}
	
	public function selectPermission($uid)//return gid object array
	{
		$pm = new Permission_model;
		
		return $pm->selectPermission($uid);
	
	}
	
	public function select_people_Permission($member_id ,$project_id){
		
		$pm = new Permission_model;
		
		return $pm->select_people_Permission($member_id ,$project_id);
	
	}
	public function getPermissionsList(){
		$PermissionsList = new Permission_model;
		$PermissionsListData = $PermissionsList->getPermisstionListData();
		return $PermissionsListData;
	}
	
	public function selecPermissionName($id){
		$data = array();
		$doto = array();
		$Permissionsdata = new Permission_model;
		$count = $Permissionsdata->selectPermissionName($id);
		$length = count($count);
		for($i = 0; $i < $length ;$i++){
			$data[$i] = $Permissionsdata->selectPermissionData($count[$i]->permission_id);
			$doto[$i] = $data[$i][0]->name;
		}
		return implode("\n",$doto);
		//return $data;
	}

}



