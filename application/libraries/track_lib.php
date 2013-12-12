<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class track_lib 
{
	
	public function track_lib()
	{

		$CI = & get_instance();
		$CI->load->model('track_model');
		$this->data = new track_model(); // «Å§i model
	}
	
	public function track_list() 
	{
		$part_list=$this->data->select_track_list();
		return $part_list;
	}
	
	public function track_part_data($part_id){
		$tpdata_list=$this->data->select_track_part_data($part_id);
		return $tpdata_list;
	
	}
	
	
	

}



