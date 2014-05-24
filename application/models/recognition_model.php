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

}