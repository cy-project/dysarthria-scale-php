<?php

class Dispatch_json
{
	function __construct()
	{
		$CI =& get_instance();
		$CI->load->model('Dispatch_model');
	}
	
	public function dispatch($pid,$times)
	{
		$dm = new Dispatch_model();
		$array = $dm->createDispatchJson($pid);
		
		$date = $array['exam_info'][0]['start'];
		
		
		$date = explode("/",$date);
		
		$date = $date[0].$date[1].$date[2];

		$fp = fopen("../SCHEDULE/schedule_".$date."_".$times.".json","a");
		fwrite($fp, json_encode($array));
		
	} 

}

