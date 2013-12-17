<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rules extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		//$this->load->view('rules_views');
	}

	public function rules_views_ajax()
	{
		$this->load->helper('url');
		$this->load->model('rules_model');
		$rules= new rules_model();
		$data['rules']=$rules->select_rules_all();
		echo $this->load->view('rules_views_ajax',$data);
	
	}
	
	public function rules_views_up()
	{
		$this->load->helper('url');
		$rules_id =$this->input->post('rules_id');
		$weight =$this->input->post('weight');
		$this->load->model('rules_model');
		$rules= new rules_model();
		echo $rules->up_rules_value($rules_id,$weight);
		
	
	}

}
