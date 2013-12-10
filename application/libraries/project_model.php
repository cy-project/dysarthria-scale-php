<?php

class Project_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->libaray('Datamodel');
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
		$this->db->form('testing_list');
		
		$resutlt = $this->db->get();
		
		if ($result->num_rows > 0)
		{
			foreach ($result->result() as $row)
			{
				$data = $this->getChildData($row->children_id);
				
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
							$children[$i]->rater = $row->rater;
							$children[$i]->check = $row->check;
						
						}
					}	
				}
			
			}
			return $children;
		}
		else
		{
			return 0;
		}

	}
	
	private getChildData($childid)
	{		
		
		$this->db->select('`name`,`sex`,`bir`,`age`,`grade`,`rank`,`language`');
		
		$this->db->where('id',$childid);
		
		$this->db->from('children');
		
		$data = $this->db->get();
		
		return $data;

	}
	
	private getChildrenData($childrenid)
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

}



