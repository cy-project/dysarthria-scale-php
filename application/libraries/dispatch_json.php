<?php

class Dispatch_json
{
	function __construct()
	{
		$CI =& get_instance();
		$CI->load->model('Dispatch_model');
	}
	
	public function dispatch($pid)
	{
		$dm = new Dispatch_model();
		$array = $dm->createDispatchJson($pid);
		
		$fp = fopen("SCHEDULE/schedule_20131124_1.json","a");
		fwrite($fp, json_encode($array));
		
	} 

}

