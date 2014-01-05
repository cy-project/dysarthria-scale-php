<?php
/**保留*/
class Ftpdownload
{
	function __construct()
	{
		$CI = & get_instance();

	}
	
	public function downloadfile()
	{
		$ftp_server = "192.168.137.79";
		$ftp_port = 21;
		$ftp_user = "admin";
		$ftp_pass = "admin";
		$ftp_path = "/children/";
		$ftp_mode = FTP_BINARY;
		
		@$ftp_connect = ftp_connect ($ftp_server, $ftp_port);
		@ftp_login ($ftp_connect, $ftp_user, $ftp_pass);
		@ftp_chdir ($ftp_connect, $ftp_path);
		
		@ftp_get ($ftp_connect,'D:\\test.zip','test/test.zip',$ftp_mode);
		
		@ftp_close ($ftp_connect);
	
	}

}