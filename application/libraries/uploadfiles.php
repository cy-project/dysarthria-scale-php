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
	
		$ftp_server = "192.168.0.1";
		$ftp_user_name = "admin";
		$ftp_user_pass = "admin";
		
		
		$conn_id = ftp_connect($ftp_server);

		$login_resul = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
		
		
		foreach ($files as $data)
		{
			$um = new Upload_model();
			
			$file_arr = explode("/",$data->filepath ); 
		
			$rm_file_name = $file_arr[count($file_arr)-1];
		
			$remote_file = '/Public/'.$rm_file_name;
			
			if(ftp_put($conn_id, $remote_file, $path, FTP_ASCII))
			{
				echo "successfully $file\n";
				
				$um->insertFile($data);
			}
			else
			{
				echo "not upload $file \n";
			}
		}


		ftp_close($conn_id);

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


