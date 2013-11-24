<?php

class Personal_data
{
	/**
	account 帳號
	password 密碼
	mail 電郵
	tel1 連絡電話
	tel2 緊急連絡電話
	name 姓名
	contacter 緊急連絡人姓名
	identity 身分
	status 是否被停權 1代表停權 0代表沒被停權
	
	
	*/
	private $data = array();
	
	function __construct()
	{
	
	}
	
	public function __set($name,$value)
	{
		$this->data[$name] = $value;
	}
	
	public function __get($name)
	{
		if (array_key_exists($name,$this->data))
		{
			return $this->data[$name];
		}
	}


}
