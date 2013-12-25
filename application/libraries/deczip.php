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
		
		//echo $filepath;
		
		exec('java Deczip '.$filepath.' C:\\xampp\htdocs\dysarthria-scale-php\uploads\\', $file_list, $return_var);
		
		//echo $return_var;
		
		//$file_list=mb_convert_encoding($file_list,"utf8","big5");
			
		//$file_list=count($file_list);
		
		return $file_list;
	}
	
	

}