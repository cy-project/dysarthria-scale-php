<?php

class test_models extends CI_model 
{
	
	var $topiarray = array();
	
	function __construct() {

		parent::__construct();

		$this->load->database();
	}
	
	public function lond_List($member_id){
		$this->db->select('id');
		$this->db->from('Member');
		$this->db->where('id',$member_id);
		$data = $this->db->get();
		$r = $data->result();
		$preame = (array)$r;
		$this->topiarray = $preame;
		return $this->topiarray;
	}
	
	public function lond_data_test($sid){
		$data = $this->db->get('student');	
		$r = $data->result();
		$params = (array) $r;
		
		$value = new judge;
		$boolen = $value->getname($params, $sid);
		if(!strcasecmp ($boolen['boolen'], 'true'))
		{
			$this->db->select('student.name as student_name,dept.name as dept_name,college.name as college_name,dept_id');
			$this->db->from('student');
			$this->db->join('dept','student.dept_id = dept.id','INNER');
			$this->db->join('college','student.dept_id = college.id','INNER');
			$this->db->where('student.id', $boolen['id']);
			$data = $this->db->get();
			$r = $data->result();
			$preame = (array)$r;
			$this->topiarray = $preame;
		}
		
		return $this->topiarray;
	}
	
	public function lond_data_part_id($dept_id)
	{
		$this->db->select('part_id,title');
		$this->db->from('dept a');
		$this->db->join('questionnaire b','a.id = b.dept_id','INNER');
		$this->db->join('part c','b.id = c.questionnaire_id','INNER');
		$this->db->join('questions e','e.part_id = c.id','INNER');
		$this->db->where('b.dept_id',$dept_id);
		$data = $this->db->get();
		$r = $data->result();
		$preame = (array)$r;
		$this->topiarray = $preame;
		
		$value = new judge;
		$boolen = $value->capture_part_id($this->topiarray );
		
		
		return $boolen;
	}
	
	public function Project_name($pid){
		$this->db->select('`name`');
		$this->db->where('id',$pid);
		$this->db->from('project');
		$data = $this->db->get();
		$name = $data->result();
		$project_name = $name[0]->name;
		return $project_name;
	}
	
	public function upload_tempfile($data)
	{
		$this->db->set('testing_id',$data->testing_id);
		$this->db->set('zippath',$data->zippath);
		$this->db->insert('tempfile');
		
	}
	
	public function upload_tempcheck($testing_id)
	{
		$this->db->select("`zippath`");
		$this->db->where('testing_id',$testing_id);
		$this->db->from('tempfile');
		
		$zippath = $this->db->get()->result();
		
		return $zippath;
		
	}
	
	public function upload_test_file($zipresult)
	{
		$str="";
		
		for($i=0;$i < count($zipresult);$i++)
		{
			for($j=0;$j < count($zipresult[$i+1]);$j+=2)
			{
				$file_arr = explode(".",$zipresult[$i+1][$j+1]);
				$file_name = $file_arr[count($file_arr)-2];//撈檔名
				
				$file_arr2 = explode("_",$file_name);
				$file_name2 = $file_arr2[count($file_arr)-1];//撈題號
				
				$topics_id[] = $file_name2;
			}
		}
		
		$this->db->select("`script`");
		$this->db->where_in('id',$topics_id);
		$this->db->from('topic');
		$query = $this->db->get()->result();
		
		return $query;
	}
	
	public function upload_file_identification($testing_id)
	{
		$this->db->select("`children_id`");
		$this->db->from('testing_list');
		$this->db->where('id',$testing_id);
		
		$data = $this->db->get()->result();
		
		return $data;
		
	}
	
	public function excel_change_testing_id($children_id)
	{
		$this->db->select("`id`");
		$this->db->from('testing_list');
		$this->db->where('children_id',$children_id);
		
		$data = $this->db->get()->result();
		
		return $data;
		
	}
	
	public function count_topics()
	{
		$count = $this->db->count_all_results('topic');
		
		return $count;
	}
	
	public function excel_equals_topic($script_id)
	{
		$this->db->select("`script`");
		$this->db->from('topic');
		$this->db->where('id',$script_id);
		
		$data = $this->db->get()->result();
		$data_result = $data[0]->script;
		
		return $data_result;
		
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
}