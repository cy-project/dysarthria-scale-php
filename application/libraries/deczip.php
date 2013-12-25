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
		
		exec('java Deczip '.$filepath.' C:\\xampp\htdocs\dysarthria-scale-php\uploads\\', $file_list, $return_var);
		$sort_file_list = $this->sortTopic($file_list);
		
		return $sort_file_list;
	}
	
	private function sortTopic($Topicpath)
	{
		$length = count($Topicpath);
		
		for ( $idx = 0; $idx < $length; $idx+=2)
		{
			if ( $idx+1 < $length )
			{
				$file_arr = explode("_",$Topicpath[$idx+1]);

				if (count($file_arr) >= 2)
					
					$array[$file_arr[1]][] = $Topicpath[$idx];
			}

		}
			
		return $array;

	}

}