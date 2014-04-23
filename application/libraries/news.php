<?php

class News
{
	function __construct()
	{
		$CI = & get_omstamce();
		$CI->load->model('News_model');
	}

	public function addNews($title,$content)
	{
		
		$news = new News_model();
		
		$news->addNews($title,$content);
	}
	
	public function listNews()
	{
		$news = new News_model();
		
		return $news->listNews($title,$content);
	}
	
	public function rmNews($id)
	{
		$news = new News_model();
		
		$news->rmNews($id);
	
	}
	
}
