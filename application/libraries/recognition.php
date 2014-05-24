<?php
/*google 語音辨識*/
class Recognition
{
	function __construct()
	{
		$CI = & get_instance();
		$CI->load->model('Recognition_model');
		$CI->load->library('Datamodel');
		$CI->load->library('Ftpdownload');
	}
	
	public function recognitionAudio($result_id)
	{
		$rm = new Recognition_model();
		
		$ftp = new Ftpdownload();
		
		$datamodel = new Datamodel();
		
		
		
		
		$temp_path = $rm->getVoicefile($result_id);
		
		//$tempfile = $ftp->downloadfile($voice_path);
		
		$array = explode("/",$temp_path);
		
		//print_r($array);
		
		$voice_path = '..\\'.$array[3].'\\'.$array[4].'\\'.$array[5];
		
		$topic_id = $rm->getTopicid($result_id);
		
		$topic_script = $rm->getTopicScript($topic_id);
		
		$topic_script->script = mb_convert_encoding($topic_script->script,"big5","utf-8");
		
	
		
		exec('java Recognition '.$voice_path.' '.$topic_script->script,$result, $return_var);
		
		$datamodel->result_id = $result_id;
		
		$datamodel->topic_id = $topic_id;
		
		$datamodel->result = $result[0];
		
		
		
		$rm->addResult($datamodel);
	
	}


}