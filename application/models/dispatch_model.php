<?php

class Dispatch_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function createDispatchJson($pid)//get testing_list
	{
	
		$array = array();
		$children = array();
		$member = array();
		$exam_info = array();
		$examination = array();
		
		$this->db->select('`children_id`,`id`');
		$this->db->where('project_id',$pid);
		$this->db->where('check',0);
		$this->db->from('testing_list');
		$data = $this->db->get();		
		
		if ($data->num_rows() > 0)
		{
			$idx = 0;
			foreach ($data->result() as $row)
			{
				
				$result = $this->getChildData($row->children_id);//取得小孩的資料
				$children[$idx]['subject_id'] = $row->children_id;
				$children[$idx]['subject_name'] = $result[0]->name;
				$children[$idx]['subject_sex'] = $result[0]->sex;
				$children[$idx]['subject_birthday'] = $result[0]->bir;	
				$idx++;
			}
			
		}
		
		
		$this->db->select('`rater`');
		$this->db->distinct();//篩選重複資料  
		$this->db->where('project_id',$pid);
		$this->db->where('check',0);
		$this->db->from('testing_list');
		$data2 = $this->db->get();
		
		
		 $params = $data2->result();
		if ($data2->num_rows() > 0)
		{
			$idx = 0;
			foreach ($params as $tt)
			{			
				$result = $this->getPersonData($tt->rater);//取得施測者資料
				$member[$idx]['team_id'] = $tt->rater;
				foreach ($result as $r)
				{
					$member[$idx]['account'] = $r->account;
					$member[$idx]['password'] = $r->password;
					$member[$idx]['name'] = $r->account;	
				}
				$idx++;
			}

		}
		
		$this->db->select('`id`,`project_id`,`children_id`,`rater`');
		$this->db->where('project_id',$pid);
		$this->db->where('check',0);
		$this->db->from('testing_list');
		$data3 = $this->db->get();		

		if ($data3->num_rows() > 0)
		{
			$idx = 0;
			foreach ($data3->result() as $row)
			{
				
				$result = $this->getStartDate($pid);//取得開始日期
				$exam_info[$idx]['exam_info_id'] = $row->id;
				$exam_info[$idx]['team_id'] = $row->rater;
				$exam_info[$idx]['subject_id'] = $row->children_id;
				$exam_info[$idx]['start'] = $result[0]->start_date;	
				$exam_info[$idx]['end'] = $result[0]->start_date;	
				$exam_info[$idx]['examination_id'] = "10";
				$idx++;
			}
			
		}
		
		
		$examination[0]['examination_id'] = "10";
		$examination[0]['file_name'] = "exam_2.json";
		$examination[0]['version'] = "2";
		
		$array['team'] = $member;
		$array['subject'] = $children;
		$array['exam_info'] = $exam_info;
		$array['examination'] = $examination;
		
		return $array;
				
	
	}
	
	private function getStartDate($pid)
	{
		$this->db->select('`start_date`');
		$this->db->where('id',$pid);
		//$this->db->where('status',1); keep
		$this->db->from('project');
		return $this->db->get()->result();	
	}
	
	private function getPersonData($uid)
	{
		
		$this->db->select('`account`,`password`');
		$this->db->from('member');
		$this->db->where('id',$uid);
		
		return $this->db->get()->result();
		
	}
	
	private function getChildData($cid)
	{
		
		$this->db->select('`name`,`sex`,`bir`');
		$this->db->from('children');
		$this->db->where('id',$cid);
		
		return $this->db->get()->result();

		
	}
	
	public function manberdata($project_id, $position){
		$namedata = array();
		$count = 0;
		$this->db->select("`member_id`");
		$this->db->from('people_list');
		$this->db->where('project_id', $project_id);
		$this->db->where('position', $position);
		$data = $this->db->get()->result();
		foreach($data as $key => $con){
			$namedtat[$count] = $this->membername($con->member_id);
			$count++;
		}
		return $namedtat;
	}
	
	public function membername($member_id){
		$this->db->select('`name`,`id`');
		$this->db->from('member');
		$this->db->where('id', $member_id);
		$data = $this->db->get()->result();
		return $data;
	}
	
	public function getProjectChildData($project_id){
		$this->db->select('`children_id`,`id`,`rater`, `detect`');
		$this->db->from('testing_list');
		$this->db->where('project_id', $project_id);
		$this->db->where('isupload', '0');
		$data = $this->db->get();
		return $data;
	}
	
	public function ChildBasicData($children_id){
		$this->db->select('`id`,`name`,`sex`,`school_id`,`grade`,`rank`');
		$this->db->from('children');
		$this->db->where('id',$children_id);
		$data = $this->db->get();
		return $data->result();
	}
	
	public function schoolname($school_id){
		$this->db->select('`name`');
		$this->db->from('school');
		$this->db->where('id',$school_id);
		$data = $this->db->get()->result();
		return $data[0]->name;
	}
	
	public function getMemberName($rater){
		$this->db->select('`name`');
		$this->db->where('id',$rater);
		$this->db->from('member');
		$result =  $this->db->get()->result();
		return $result[0]->name;
	}

}