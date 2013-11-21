<?php

class Member
{

	function __construct()
	{
		$CI=& get_instance();
		$CI->load->model('Member_model');
		$CI->load->library('Personal_data');
	
	}
	
	public function register($data_array)
	{
		$person = new Personal_data;
		
		foreach()
		{
		
		
		}
		
		
	
	}
	
	public function remove()
	{
	
	}
	


}