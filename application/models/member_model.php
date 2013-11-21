<?php


class Member_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('Personal_data');
	
	}

	public function insertMember($person)
	{
	
	
	}


}
