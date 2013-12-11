<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class rules_lib 
{
	
	public function rules_lib()
	{

		$CI = & get_instance();
		$CI->load->model('rules_model');
		$this->data = new rules_model(); // «Å§i model
	}
	
	
	
	public function rules_data_value($rules_id){
		$rules_data=$this->data->select_rules_value($part_id);
		return $rules_data;
	
	}
	
	
	

}



