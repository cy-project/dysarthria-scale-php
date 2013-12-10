	<?php

		class test_models extends CI_model {
		
		var $topiarray = array();
		
			function __construct() {
	
				parent::__construct();
		
				$this->load->database();
			}
			
			public function lond_List($member_id){
				$this->db->select('member_id,project_id');
				$this->db->from('People_List');
				$this->db->where('member_id',$member_id);
				$data = $this->db->get();
				$r = $data->result();
				$preame = (array)$r;
				$this->topiarray = $preame;
				$print($this->topiarray);
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
			
			
		}