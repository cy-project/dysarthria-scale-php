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
		$filepath=mb_convert_encoding($filepath,"big5","utf8");
		exec('java Deczip '.$filepath.'C:\\xampp\htdocs\dysarthria\uploads', $file_list, $return_var);
		return $file_list;
	}
	
	

}