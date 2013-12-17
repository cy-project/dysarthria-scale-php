<?php
/**解壓縮檔案 只能for clinet端壓縮出來的檔案*/

class Deczip
{
	function __construct()
	{
		$CI = & get_instance();
	}
	
	public function dec($filepath)
	{
		exec('java Deczip '.$filepath.' D:\\', $file_list, $return_var);
		
		return $file_list;
	}
	
	

}