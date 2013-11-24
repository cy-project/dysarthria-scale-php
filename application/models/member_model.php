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

		$this->db->set('account',$person->account);
		$this->db->set('password',$person->password);
		$this->db->set('mail',$person->mail);
		$this->db->set('tel1',$person->tel1);
		$this->db->set('tel2',$person->tel2);
		$this->db->set('name',$person->name);
		$this->db->set('contacter',$person->contacter);
		$this->db->set('identity',$person->identity);

		$this->db->set('status',0);
		$this->db->insert('member');
	
	}

		$this->db->set('status',1);
		$this->db->insert('member');
	
	}
	
	public function removeMember($uid)
	{
		$this->db->where('id',$uid);
		
		$this->db->delete('member');
	
	}
	
	public function freezeMember($uid)
	{
		$data = array('status'=>0);
		
		$this->db->where('id',$uid);
		
		$this->db->update('member',$data);
	}

	
	public function updateMember($uid,$array)
	{
		$this->db->where('id',$uid);
		
		$this->db->update('member',$array);
	}
	
	public function getMemberData($uid)
	{
		$person = new Personal_data();
		$this->db->select('`account`,`password`,`mail`,`name`,`tel1`,`tel2`,`contacter`,`identity`,`status`');
		$this->db->from('member');
		$this->db->where('id',$uid);
		$data = $this->db->get();
		
		if ($data->num_rows > 0)
		{
			$r = $data->result();
			
			$params = (array)$r[0];
			
			foreach ($params as $k => $v)
			{
				
				$person->$k = $v;
			
			}
			
			return $person;
		}
		else
		{
			return 0;
		}
	
	}


}
