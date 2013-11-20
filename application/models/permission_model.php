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
		
		
		/*if ($data->num_rows() > 0)
		{
			$r = $data->result();
		
			
			
		}
		*/
	
	}
	
	
	public function insertGroup($pname,$pidarray)//array is a permission id array
	{
	
		
	
	}
	
	public function createPermision()//create a new permission
	{
	
	
	}
	
	
	public function addPermission($gid,$uid)//add user permission
	{
		$data = array('`group_id`'=>$gid,'`member_id`'=>$uid,'`check`'=>1);
		
		$this->db->set('group_id',$gid);
		
		$this->db->set('member_id',$uid);
		
		$this->db->set('check',1);
	
		$this->db->insert('permission_list');
		
		
	}
	
	public function removePermission($uid)//remove user permission
	{
	
	
	}
	
	public function getPermissionList()
	{
	
	}
	

}


