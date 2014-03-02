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
	
	
	public function addPermission($gid,$uid,$pid)//add user permission 還要加判斷避免重複增加
	{
		
		$this->db->set('group_id',$gid);
		
		$this->db->set('member_id',$uid);
		
		$this->db->set('project_id',$pid);
		
		$this->db->set('check',1);
	
		$this->db->insert('permission_list');
		
		
	}
	
	public function removePermission($gid,$uid,$pid)//remove user permission
	{
		$this->db->where('group_id',$gid);
		
		$this->db->where('member_id',$uid);
		
		$this->db->where('project_id',$pid);
		
		$this->db->delete('permission_list');
	
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
	
	public function select_people_Permission($member_id ,$project_id){
		
		
		$permission_id_13="";
		$permission_id_15="";
		$check="";
		
		$sql="SELECT
permission.id AS `permission_id`,
permission.`name` AS `name`,
people_list.member_id AS member_id,
people_list.project_id AS project_id,
permission_list.`check`
from (((`people_list` join `permission_list` on((`people_list`.`id` = `permission_list`.`people_list_id`))) join `permission_group` on((`permission_group`.`group_id` = `permission_list`.`group_id`))) join `permission` on((`permission_group`.`permission_id` = `permission`.`id`)))
WHERE
people_list.member_id = '".$member_id."' AND
people_list.project_id = '".$project_id."' AND
permission.id = '13'"; //檢測(專案)
			
		$query=$this->db->query($sql);
		
		foreach ($query->result_array() as $row)
		{
		  $permission_id_13= $row['permission_id'];
		  $check= $row['check'];
		  
		}
		
		$sql2="SELECT
permission.id AS `permission_id`,
permission.`name` AS `name`,
people_list.member_id AS member_id,
people_list.project_id AS project_id,
permission_list.`check`
from (((`people_list` join `permission_list` on((`people_list`.`id` = `permission_list`.`people_list_id`))) join `permission_group` on((`permission_group`.`group_id` = `permission_list`.`group_id`))) join `permission` on((`permission_group`.`permission_id` = `permission`.`id`)))
WHERE
people_list.member_id = '".$member_id."' AND
people_list.project_id = '".$project_id."' AND
permission.id = '15'"; //檢測可信度
			
		$query2=$this->db->query($sql2);
		
		foreach ($query2->result_array() as $row)
		{
		  $permission_id_15= $row['permission_id'];
		}
		
		if(($permission_id_15=="")&&($permission_id_13==13)&&($check==1)){
		// 是 實習語言治療師
		
			return 1;
			
		}elseif(($permission_id_15==15)&&($permission_id_13==13)&&($check==1)){
		// 是 語言治療師
		
			return 2;
		
		}else{
		
			return 3; //沒有權限
			
		}
		
	
	}
	
	public function getGroupDetails(){
		$this->load->library('Reorder');
		$this->db->select('`name`,`type`');
		$this->db->from('permission');
		$result = $this->db->get();
		$sortfunction = new Reorder();
		$sortdata = $sortfunction->GroupSort($result->result());
		$againsortdata = $sortfunction->AgainSort($sortdata);
		return $againsortdata;
	}
	
	public function getGroupDetails1(){
		$this->load->library('Reorder');
		$this->db->select('`name`,`type`,`id`');
		$this->db->from('permission');
		$result = $this->db->get();
		$sortfunction = new Reorder();
		$sortdata = $sortfunction->GroupSort1($result->result());
		$againsortdata = $sortfunction->AgainSort($sortdata);
		return $againsortdata;
	}
	
	public function getPermisstionListData(){
		$this->db->select('`id`,`name`');
		$this->db->from('group');
		$groupdata = $this->db->get();
		
		
		
		if ($groupdata->num_rows > 0)
			{
				$length = count($groupdata->result());
				print_r($length);
			}
		else
		{
			return 0;
		}
		
		//return $groupdata->result();
	}
	
	public function getGroupCountData($id){
		$this->db->select('`people_list_id`');
		$this->db->from('permission_list');
		$this->db->where('group_id',$id);
		$GroupPelpleListData = $this->db->get();
		$count = count($GroupPelpleListData->result());
		return $count;
	}

}


