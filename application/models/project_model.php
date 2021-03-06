<?php

class Project_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Datamodel');
		$this->load->database();
	}
	

	
	public function createProject($data)
	{
		$this->db->set('name',$data->name);
		$this->db->set('create_date',"0");
		$this->db->set('start_date',"0");
		$this->db->set('area',$data->area);
		$this->db->set('county',$data->county);
		$this->db->set('status',$data->status);
		$this->db->set('school_id',$data->school_id);
		$this->db->set('manager',$data->manager);
		
		$this->db->insert('project');
	
	}
	
	public function setStatrtime($array, $pid, $time){
		
		$count = $this->statrcount($time);
		
		$this->db->where('id',$pid);
		
		$this->db->update('project',$array);
		
		$length = count($count);
		
		return $length+1;
	}
	
	public function statrcount($time){
		$this->db->select('`id`');
		$this->db->where('start_date', $time);
		$this->db->from('project');
		$result = $this->db->get()->result();
		return $result;
	}
	
	public function getTestingList($pid)
	{
		$this->db->select('`children_id`,`rater`,`check`,`isupload`');
		$this->db->where('project_id',$pid);	
		$this->db->from('testing_list');
		
		
		
		$result =  $this->db->get();
		
		
		if ($result->num_rows > 0)
		{
			$idx = 0;
			foreach ($result->result() as $row)
			{
				
				$data = $this->getChildData($row->children_id);
				if ($data->num_rows > 0)
				{

						$r = $data->result();
						
						$params = (array)$r[0];
						
						
						$children[$idx] = new Datamodel();
						
						foreach ($params as $k => $v)
						{
							
							$children[$idx]->$k = $v;
							
							if ($row->rater != 0)
							{							
								$rater = $this->getMemberName($row->rater);
								
							}
							else 
							{
								$rater = "尚未配置";
							}
							
							$children[$idx]->rater = $rater;
							
							$children[$idx]->isupload = $row->isupload;
							
							$children[$idx]->check = $row->check;
						}
						
				}
				$idx++;
			}
			return $children;
		}
		else
		{
			return 0;
		}

	}

	private function getChildData($childid)
	{		
		
		$this->db->select('`id`,`name`,`sex`,`bir`,`age`,`grade`,`rank`,`language`,`county`');
		
		$this->db->where('id',$childid);
		
		$this->db->from('children');
		
		$data = $this->db->get();
		
		return $data;

	}
	
	
	private function getChildrenData($childrenid)
	{
		
		
		$this->db->select('`name`,`sex`,`bir`,`age`,`grade`,`rank`,`language`');
		
		$this->db->where_in('id',$childrenid);
		
		$this->db->from('children');
		
		$data = $this->db->get();
		
		if ($data->num_rows > 0)
		{
			for ($i = 0; $i < $data->num_rows ; $i++)
			{
				$r = $data->result();
				
				$params = (array)$r[$i];
				
				
				$children[$i] = new Datamodel();
				
				foreach ($params as $k => $v)
				{
					
					$children[$i]->$k = $v;
				
				}
			}

			return $children;
		}
		else
		{
			return 0;
		}
	}
	
	public function getModificationChildrenData($childrenid)
	{
		
		
		$this->db->select('`id`,`name`,`sex`,`bir`,`age`,`grade`,`rank`,`language`,`county`,`school_id`');
		
		$this->db->where('id',$childrenid);
		
		$this->db->from('children');
		
		$data = $this->db->get();
		
		if ($data->num_rows > 0)
		{
			for ($i = 0; $i < $data->num_rows ; $i++)
			{
				$r = $data->result();
				
				$params = (array)$r[$i];
				
				
				$children[$i] = new Datamodel();
				
				foreach ($params as $k => $v)
				{
					
					$children[$i]->$k = $v;
					$children[$i]->school= $this->getSchoolName($children[$i]->school_id);
				
				}
			}
			return $children;
		}
		else
		{
			return 0;
		}
	}
	
	public function getSchoolName($school_id){
		$this->db->select('`name`');
		$this->db->where('id',$school_id);
		$this->db->from('school');
		
		$result =  $this->db->get();
		return $result->result();
	}
	
	public function getMemberName($rater){
		$this->db->select('`name`');
		$this->db->where('id',$rater);
		$this->db->from('member');
		
		$result =  $this->db->get()->result();
		$dataname = $result[0]->name;
		return $dataname;
	}
	
	public function getProject_List($member_id){
		
			$this->db->select('*');
			$this->db->from('project');
			
			$result = $this->db->get();
			
			if ($result->num_rows > 0)
			{
				$idx = 0;
				foreach ($result->result() as $row)
				{
					$project_data[$idx] = new Datamodel();
					foreach ($row as $k => $v)
					{
						$project_data[$idx]->$k = $v;
						$project_data[$idx]->manger= @$this->getMemberName($row->manager);
					}
					$idx++;
				
				}
				return $project_data;
			}
			return 0;
	}
	
	public function selectschool_id($project_id){
		$this->db->select('`school_id`');
		$this->db->where('id', $project_id);
		$this->db->from('project');
		
		$result = $this->db->get()->result();
		
		return $result[0]->school_id;
	}
	
	public function getProjectData($project_id){
		$this->db->select('`id`,`name`,`start_date`,`create_date`,`area`,`county`,`status`,`manager`');
		$this->db->where('id',$project_id);
		$this->db->from('project');
		
		$result = $this->db->get();
		
		return $result;
	}
	public function addChild($child)
	{
		$this->db->set('name',$child->name);
		$this->db->set('sex',$child->sex);
		$this->db->set('age',$child->age);
		$this->db->set('grade',$child->grade);
		$this->db->set('rank',$child->rank);
		$this->db->set('language',$child->language);
		$this->db->set('county',$child->county);
		$this->db->set('school_id',$child->school);
		$this->db->set('bir',$child->bir);
		
		$this->db->insert('children');
		
	   $this->addSubjects($child);
		
	
	}
	
	public function schoolname($name){
		$this->db->set('name', $name);
		
		$this->db->insert('school');
		
		$id = $this->schoolid($name);
		
		return $id[0]->id;
	}
	
	public function schoolid($name){
		$this->db->select('`id`');
		$this->db->where('name', $name);
		$this->db->from('school');
		
		$result = $this->db->get()->result();
		
		return $result;
	}
	
	public function selectschoolname(){
		$this->db->select('`id`,`name`');
		$this->db->from('school');
		$result = $this->db->get()->result();
		
		return $result;
	}
	
	private function addSubjects($child)
	{
		$this->db->select('`id`');
		$this->db->where('name',$child->name);//可能會有同名問題
		$this->db->from('children');
		$result = $this->db->get()->result();
		
		$child->id = $result[0]->id;
		
		$this->db->set('project_id',$child->project_id);
		$this->db->set('children_id',$child->id);
		$this->db->set('rater',0);
		$this->db->set('check',0);
		$this->db->insert('testing_list');

	}
	
	public function addRater($data)
	{
		$this->db->set('rater',$data->rater);
		$this->db->where('project_id',$data->pid);
		$this->db->update('testing_list');
	}
	
	public function addPeople($member)
	{
		$this->db->set('member_id',$member->id);
		$this->db->set('project_id',$member->pid);
		$this->db->set('position',0);
		$this->db->insert('people_list');
	}
	
	public function getPeopleList($pid)
	{
		$this->db->select('`member_id`,`position`,`id`,`project_id`');
		$this->db->where('project_id',$pid);
		$this->db->from('people_list');
		
		
		
		$result =  $this->db->get();
		
		if ($result->num_rows > 0)
		{
			$idx = 0;
			foreach ($result->result() as $row)
			{
				$member_data = $this->getMemberData($row->member_id);
				if($member_data->num_rows > 0){
					$r = $member_data->result();
						
						$params = (array)$r[0];
						
						
						$people_data[$idx] = new Datamodel();
						foreach ($params as $k => $v)
						{
							
							$people_data[$idx]->$k = $v;
							$rater = $this->getMemberName($row->member_id);
							$people_data[$idx]->position = $row->position;
							
							
							
						}
					$idx++;
				}
						
			}
			//print_r($people_data);
			return $people_data;
		}
		else
		{
			return 0;
		}

	}
	
	private function getPermissionData($rater){
		$this->db->select('`group_id`');
		$this->db->where('people_list_id',$rater);
		$this->db->from('permission_list');
		
		$result =  $this->db->get();
		return $result;
	}
	
	private function getMemberData($id){
		$this->db->select('`account`,`identity`,`name`');
		$this->db->where('id',$id);
		$this->db->from('member');
		$result = $this->db->get();
		return $result;
	}
	
	public function getProjectName($project_id){
		$this->db->select('`name`');
		$this->db->where('id',$project_id);
		$this->db->from('project');
		$result = $this->db->get();
		return $result->result();
	}
	
	public function getChildrenName($children_id){
		$this->db->select('`name`');
		$this->db->where('id',$children_id);
		$this->db->from('children');
		$result = $this->db->get();
		return $result->result();
	}
	
	public function updateChild($uid,$array)
	{
		$this->db->where('id',$uid);
		
		$this->db->update('children',$array);
	}
	
	public function updateTestlist($uid,$array)
	{
		$this->db->where('id',$uid);
		
		$this->db->update('testing_list',$array);
	}
	
	public function memberid($account, $username){
		$this->db->select('`id`');
		$this->db->where('account',$account);
		$this->db->where('name', $username);
		$this->db->from('member');
		$result = $this->db->get()->result();
		return $result[0]->id;
	}

}



