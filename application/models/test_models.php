	<?php

		class test_models extends CI_model {
		
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
			
			public function upload_test_file($zipresult)
			{
				$str="";
				for($i=0;$i < count($zipresult);$i+=2)
				{
					$file_arr = explode(".",$zipresult[$i+1]);
					$file_name = $file_arr[count($file_arr)-2];//撈檔名
					$file_arr2 = explode("_",$file_name);
					$file_name2 = $file_arr2[count($file_arr)-1];//撈題號
					
					if($i==(count($zipresult)-2)){
						$str.="topic.id ="."'".$file_name2."'";
					}else{
						$str.="topic.id ="."'".$file_name2."' OR ";
					}
				}
				
				
				$sql="SELECT
					script
					FROM
					topic WHERE
					(".$str.")";
			
				$query=$this->db->query($sql);
				
				
				
				return $query;
			}
		}