<?php

class rules_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function select_rules_all() 
	{
		
		$select_sql="SELECT * FROM `rules`";
		
		$query =$this->db->query($select_sql); 

		return $query;
		
	}
	
	public function select_rules_value($rules_id) 
	{
		
		$select_sql="SELECT * FROM `rules` where `rules`.id='$rules_id'";
		
		$query =$this->db->query($select_sql); 

		
		$weight="";
		
		foreach ($query->result_array() as $row)
		{
		  $weight= $row['weight'];
		}
		
		return $weight;
		
	}
	
	
	public function up_rules_value($rules_id,$weight) 
	{
		
		
		$up_sql="UPDATE `rules` SET `weight`='$weight' WHERE (`id`='$rules_id')";
		
		$this->db->query($up_sql); 

		return "yes";
		
	}
	
}
