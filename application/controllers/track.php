<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class track extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		//$this->load->view('score_views_track_index');
	}

	public function track_views_ajax()
	{
		$this->load->helper('url');
		$this->load->library('track_lib');
		$track= new track_lib();
		$data['track']=$track->track_list();
		echo $this->load->view('score_views_track_index_ajax',$data);
	
	}
	
	public function score_views_track_type()
	{	
		$this->load->helper('url');
		$data = $this->uri->uri_to_assoc(3);
		$this->load->library('track_lib');
		$track= new track_lib();
		$this->load->view('score_views_track_type',$data);
		
	}
	
	public function score_views_track_type_ajax()
	{	
		$this->load->helper('url');
		$part_id =$this->input->post('part_id');
		$this->load->library('track_lib');
		$track= new track_lib();
		$data['track']=$track->track_part_data($part_id);
		echo $this->load->view('score_views_track_type_ajax',$data);
		
	}
	
	public function score_views_track_up()
	{
		$this->load->helper('url');
		$judgment_id =$this->input->post('judgment_id');
		$check =$this->input->post('check');
		$this->load->model('track_model');
		$model= new track_model();
		echo $model->track_up_judgment($judgment_id,$check);
	
	}

}
