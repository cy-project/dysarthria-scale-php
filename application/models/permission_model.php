<?php

class Permission_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Datamodel');
		$this->load->database();
	
	}
	
	public function testmodel()
	{
		$this->db->select('`name`');
		
		$this->db->from('permission');
		
		$this->db->where('id',1); 
		
		$data = $this->db->get();
		
		return $data;
		

	
	}
	
	public function createGroup($name)
	{
		$this->db->set('name',$name);
		
		$this->db->insert('group');

	}
	
	
	
	public function insertGroup($name,$pidarray)//array is a permission id array
	{
		
		$this->db->select('`id`');
		
		$this->db->where('name',$name);
		
		$this->db->from('group');
		
		$data = $this->db->get();
		
		$result = $data->result();
		
		$params = (array)$result;
		
		$gid = $params[0]->id;
		
		
		
		foreach($pidarray as $pid)
		{
			$this->db->set('`permission_id`',$pid);
			$this->db->set('`group_id`',$gid);
			$this->db->insert('permission_group');
		}
	
	}
	
	public function createPermision()//create a new permission keep
	{
	
	
	}
	
	
	public function addPermission($gid,$uid)//add user permission
	{
		
		$this->db->set('group_id',$gid);
		
		$this->db->set('member_id',$uid);
		
		$this->db->set('check',1);
	
		$this->db->insert('permission_list');
		
		
	}
	
	public function removePermission($uid)//remove user permission
	{
	
	
	}
	
	public function selectPermission($uid)
	{
		$this->db->select('`group_id`');
		
		$this->db->from('permission_list');
		
		$this->db->where('member_id',$uid);
		
		$this->db->where('check',1);
		
		$result = $this->db->get();
		
		return $result;
	}
	

}


