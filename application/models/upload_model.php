<?php

class Upload_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('Personal_data');
		$this->load->library('Datamodel');
	
	}
	
	public function insertFile($data)
	{

		$this->db->set('testing_id',$data->testing_id);
		$this->db->set('topic_id',$data->topic_id);
		$this->db->set('voice_file',$data->voice_file);
		$this->db->insert('result');
	

	}


}
