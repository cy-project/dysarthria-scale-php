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
		$this->db->set('create_date',$data->cr_date);
		$this->db->set('area',$data->area);
		$this->db->set('county',$data->county);
		$this->db->set('status',$data->status);
		
		$this->db->insert('project');
	
	}
	
	public function getTestingList($pid)
	{
		$this->db->select('`children_id`,`rater`,`check`');
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
							
							$rater = $this->getMemberName($row->rater);
							
							
							
							$children[$idx]->rater = $rater[0]->name;
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
		
		$this->db->select('`name`,`sex`,`bir`,`age`,`grade`,`rank`,`language`');
		
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
	
	
	private function getMemberName($rater){
		$this->db->select('`name`');
		$this->db->where('member.id',$rater);
		$this->db->from('member');
		
		$result =  $this->db->get();
		return $result->result();
	}
	
	public function getProject_List($member_id){
		$this->db->select('`project_id`');
		$this->db->where('member_id',$member_id);
		$this->db->from('people_list');
		
		$result = $this->db->get();
		if ($result->num_rows > 0)
		{
			$idx = 0;
			foreach ($result->result() as $row)
			{
				$data = $this->getProjectData($row->project_id);
				if ($data->num_rows > 0)
				{
					$r = $data->result();
					$length = count($r);
					for($o = 0;$o<$length;$o++){
						$params = (array)$r[$length-1];
					
						$children[$idx] = new Datamodel();
						foreach ($params as $k => $v)
						{
							$children[$idx]->$k = $v;
							$children[$idx]->manger= $this->getMemberName($children[$idx]->manager);
						}
						
					}
						$idx++;
						
				}
			
			}
			return $children;
		}
		else
			return 0;
		
		
		
	}
	
	public function getProjectData($project_id){
		$this->db->select('`name`,`start_date`,`create_date`,`area`,`county`,`status`,`manager`');
		$this->db->where('id',$project_id);
		$this->db->from('project');
		
		$result = $this->db->get();
		
		return $result;
	}

}



