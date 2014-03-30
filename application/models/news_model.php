<?php

class News_model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	
	}
	
	public function addNews($title,$content)//暫定
	{
		$this->db->set('title',$title);
		$this->db->set('content',$content);
		$this->db->insert('news');
	}
	
	public function rmNews($id)
	{
		$this->db->where('id',$id);
		
		$this->db->delete('news');
	
	}
	
	public function listNews()
	{
		$this->db->select('`id`,`title`,`content`,`date`');
		$this->db->from('news');
		$data = $this->db->get();
		
		return $data->resutlt();
	}
	
	
}