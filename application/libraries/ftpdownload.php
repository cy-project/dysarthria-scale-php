<?php
/**保留*/
class Ftpdownload
{
	function __construct()
	{
		$CI = & get_instance();

	}
	
	public function downloadfile($path)
	{
		$ftp_server = "120.119.77.40";
		$ftp_port = 21;
		$ftp_user = "admin";
		$ftp_pass = "admin";
		$ftp_path = "/children/";
		$ftp_mode = FTP_BINARY;
		
		$array = explode("/",$path);
		
		@$ftp_connect = ftp_connect ($ftp_server, $ftp_port);
		@ftp_login ($ftp_connect, $ftp_user, $ftp_pass);
		@ftp_chdir ($ftp_connect, $ftp_path);
		
		$temp_path = 'C:\\xampp/htdocs/dysarthria-scale-php/temp/'.$array[5];
		
		@ftp_get ($ftp_connect,$temp_path,$array[4].'/'.$array[5],$ftp_mode);
		
		@ftp_close ($ftp_connect);
		
		return $temp_path;
	
	}

}