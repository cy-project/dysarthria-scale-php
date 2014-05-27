<?php


class Recognition_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('Datamodel');
		
	
	}
	public function addResult($result)
	{
		
	
		$this->db->set('result_id',$result->result_id);
		$this->db->set('result',$result->result);
		$this->db->set('topic_id',$result->topic_id);
		$this->db->insert('google_judgment');
	}
	
	
	public function getTopicid($result_id)
	{
		$this->db->select('`topic_id`');
		$this->db->where('id',$result_id);
		$this->db->from('result');
		
		$data = $this->db->get();
		
		if ($data->num_rows > 0)
		{
			$r = $data->result();
			
			$params = (array)$r[0];
			
			return $params['topic_id'];
		}
		else
		{
			return 0;
		}
	}
	
	public function getVoicefile($result_id)
	{
		$this->db->select('`voice_file`');
		$this->db->from('result');
		$this->db->where('id',$result_id);
		$data = $this->db->get();
		
		if ($data->num_rows > 0)
		{
			$r = $data->result();
			
			$params = (array)$r[0];
			
			return $params['voice_file'];
		}
		else
		{
			return 0;
		}
	}
	
	
	
	public function getTopicScript($topic_id)
	{
	
		$topic_model = new Datamodel();
		$this->db->select('`script`');
		$this->db->from('topic');
		$this->db->where('id',$topic_id);
		$data = $this->db->get();
		
		if ($data->num_rows > 0)
		{
			$r = $data->result();
			
			$params = (array)$r[0];
			
			foreach ($params as $k => $v)
			{
				$topic_model->$k = $v;
			}
			
			return $topic_model;
		
		}
		else
		{
			return 0;
		
		}
	}
	
	public function getResultIDs()
	{
		$this->db->select('`id`');
		$this->db->from('result');
		$data = $this->db->get();
		$array = $data->result();
		
	
		return $array;
	}
	
	public function getJudgmentResult($result_id)//取得語言治療師的答案
	{
		$this->db->select('`judgment`.`id`,`wrongcode`,`available`');
		$this->db->from('judg_list');
		
		$this->db->join('judgment','judgment.id = judg_list.judgment_id');
		$this->db->join('result','judg_list.result_id = result.id');//取全部 可刪
		$this->db->join('topic','result.topic_id = topic.id');//取全部 可刪
		$this->db->where('judg_list.result_id',$result_id);
		$this->db->where('judgment.available','1');
		$this->db->where('topic.part','1');//目前取單音的部分 取全部 可刪
		$data = $this->db->get();
		
		
		if ($data->num_rows() > 0)
		{
			$array = $data->result();
			
			$wrong_code_aray = $this->split($array[0]->wrongcode);
			
			return $wrong_code_aray;
		}
		else
		{
			return 0;
		}
		
	}
	
	private function split($wrongcode)
	{
		
		$wrong_code_array = explode(",",$wrongcode);
		
		unset($wrong_code_array[count($wrong_code_array)-1]);//消除最後面的空白
		
		return $wrong_code_array;
	}
	
	public function getGoogleResult($result_id)//取得google的答案
	{
		$this->db->select('`result`,topic_id');
		$this->db->from('google_judgment');
		$this->db->join('topic','google_judgment.topic_id = topic.id');
		$this->db->where('google_judgment.result_id',$result_id);
		$this->db->where('topic.part','1');//目前只取單音的部分
		$data = $this->db->get();
		
		if ($data->num_rows() > 0)
		{
			$array = $data->result();
			
			return $array;
		}
		else
		{	
			return 0;
		}
		
	}
	
	public function updateGoogleisRight($result_id,$ans)
	{
		$array = array('isright' => $ans);
		$this->db->where('result_id',$result_id);
		$this->db->update('google_judgment',$array);


		
	}
	public function getGoogleJudgment()//取得還未與語言治療師比對過的資料
	{
		$this->db->select('`result_id`');
		$this->db->from('google_judgment');
		$this->db->where('isright','2');
		$data = $this->db->get();
		
		if ($data->num_rows() > 0)
		{
			$array = $data->result();

			return $array;
		}
		else
		{
			return 0;
		}
		
	}
	public function getStatisticsResult()
	{
		
	
	}
	
	
	public function getStatisticsPartResult($part)
	{
		$this->db->select('isright');
		$this->db->from('google_judgment');
		$this->db->join('topic','google_judgment.topic_id = topic.id');
		$this->db->where('topic.part',$part);//目前只取單音的部分
		$this->db->where('google_judgment.isright','1');
		$data = $this->db->count_all_results();
		
		echo $data;
	}
	

}