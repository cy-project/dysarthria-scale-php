<?php

class Uploadfiles
{
	function __construct()
	{
		$CI = & get_instance();
		$CI->load->library('Datamodel');
		$CI->load->model('Upload_model');
	}
	
	public function uploadFiles($files)//上傳檔案到NAS
	{
	
		$ftp_server = "192.168.137.79";
		$ftp_port = 21;
		$ftp_user = "admin";
		$ftp_pass = "admin";
		$ftp_path = "/children";
		$ftp_mode = FTP_BINARY;
		
		@$ftp_connect = ftp_connect ($ftp_server, $ftp_port);
		@ftp_login ($ftp_connect, $ftp_user, $ftp_pass);
		@ftp_chdir ($ftp_connect, $ftp_path);
		@ftp_mkdir($ftp_connect,'test');

		
		
		foreach ($files as $data)
		{
			$um = new Upload_model();
			
			$file_arr = explode("/",$data->filepath ); 
		
			$rm_file_name = $file_arr[count($file_arr)-1];
		
			$remote_file = '/children/test/'.$rm_file_name;
			
			if(ftp_put($ftp_connect, $remote_file, $data->filepath, FTP_ASCII))
			{
				echo "successfully".$data->filepath." \n";
				
				//$um->insertFile($data);
			}
			else
			{
				echo "not upload ".$data->filepath." \n";
			}
		}


		@ftp_close ($ftp_connect);

	}
	
	public function rmFiles($array_path)
	{
		
		foreach ($array_path as $path)
		{
		
			$filepath=mb_convert_encoding($path,"big5","utf8");
			
			if (file_exists($filepath))
			{
				unlink($filepath);
			}
			
		}
		
	}

}


