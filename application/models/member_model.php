<?php


class Member_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('Personal_data');
	
	}

	public function insertMember($person)
	{
		$this->set('account',$person->account);
		$this->set('password',$person->password);
		$this->set('mail',$person->mail);
		$this->set('tel1'$person->tel1);
		$this->set('tel2',$person->tel2);
		$this->set('name',$person->name);
		$this->set('contacter',$person->contacter);
		$this->set('identity',$person->identity);
		$this->set('status',0);
		$this->insert('member');
	
	}


}
