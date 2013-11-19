<?php

class Datamodel
{
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
