<?php
/**將Wav to mp3*/
class Transform 
{
	function __construct()
	{
		$CI = & get_instance();
	}
	
	public function trans($filepath,$targetpath)//$filepath 路徑不需要副檔名 如 D:\\test $targetpath 則需要副檔名 如 D:\\test.mp3
	{
		exec('java -jar transform.jar '.$filepath.' '.$targetpath, $file_list, $return_var);
		
		if (file_exists($targetpath))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


}