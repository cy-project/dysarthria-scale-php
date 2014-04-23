<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class score extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
	}
	
	public function score_views_symbol(){//ㄅㄆㄇㄈ符號，說故事　（這）
		$this->load->helper('url');
		$data = $this->uri->uri_to_assoc(3);
		
		$this->load->library('score_lib');
		
		$score= new score_lib();
		
		$data['topic']=$score->score_symbol($data['result_id']);
		
		$this->load->view('score_views_symbol',$data);
	}
	
	public function score_views_words(){//句子，數數字，輪替　（這）
		$this->load->helper('url');
		
		$data = $this->uri->uri_to_assoc(3);
		
		$this->load->library('score_lib');
		
		$score= new score_lib();
		
		$data['topic']=$score->score_words($data['result_id']);
		$this->load->view('score_views_words',$data);
		
	}
	
	/*---------------
	score_return() //評分計算會被單字 句子 數數字 輪替 等用ajax調用 
	input:
	score_value
	result_id
	Test_engineer
	--------------*/
	public function score_return()
	{
		$this->load->helper('url');
		$this->load->library('score_lib');
		$score= new score_lib();
		$score_value = $this->input->post('score_value');//評分值
		$note_value = $this->input->post('note_value');
		$result_id = $this->input->post('result_id'); //result表單 id
		$member_id = $this->input->post('member_id'); //施測者
		
		$topic_id = $this->input->post('topic_id');
		$project_id = $this->input->post('project_id');
		
		
		echo $score->score_calculate($score_value,$note_value,$topic_id,$result_id,$member_id,$project_id); //印出給ajax接收 (未通過0 false，通過1 ture)
	}
	
	
	
	public function score_views_children(){//針對專案找出幼兒的相關資料
		$this->load->helper('url');
		$this->load->library('score_lib');
		$this->load->library('permission');
		$score= new score_lib();	
		$permission= new permission();

		
		$data = $this->uri->uri_to_assoc(3);
		
		

		$data['permission_check']=$permission->select_people_Permission($data['member_id'],$data['project_id']);
		
		$data['children'] = $score->score_children($data['project_id'],$data['member_id'],$data['permission_check']);
		
		
		$this->load->view('score_views_children',$data);
	
	}
	
	
	public function score_views_part(){ //針對專案找出幼兒的檢測主題
		
		$this->load->helper('url');
		$this->load->library('score_lib');
		$score= new score_lib();
		$data = $this->uri->uri_to_assoc(3);
			
		$data['part']=$score->score_part();
		
		$this->load->view('score_views_part',$data);
	
	
	}
	
	/*public function score_views_topics(){ 
		
		$this->load->helper('url');
		$data = $this->uri->uri_to_assoc(3);
		 
		
		$this->load->library('score_lib');
		$score= new score_lib();
		$data['topic_on']=$score->score_topic_on($data['testing_list_id'],$data['part_id']);
		
		$data['topic_yes']=$score->score_topic_yes($data['testing_list_id'],$data['part_id']);
		
		$this->load->view('score_views_topics',$data);

	
	}*/
	
	public function score_views_topics_ajax(){ 
	//針對專案的檢測主題找出幼兒的檢測題目
		$this->load->helper('url');
		$data = $this->uri->uri_to_assoc(3);
		$this->load->library('score_lib');
		$score= new score_lib();
		$this->load->library('permission');
		$permission= new permission();
		$data['permission_check']=$permission->select_people_Permission($data['member_id'],$data['project_id']);
		
		$data['topic_on']=$score->score_topic_on($data['testing_list_id'],$data['part_id'],$data['permission_check']);
		
		$data['topic_yes']=$score->score_topic_yes($data['testing_list_id'],$data['part_id'],$data['permission_check']);
		
		echo $this->load->view('score_views_topics_ajax',$data);
	}
	
	
	public function score_judgment_up(){ 
	//針對專案的檢測主題之幼兒檢測題目手動追蹤
		$this->load->helper('url');
		$judgment_id =$this->input->post('judgment_id');
		$this->load->model('score_model');
		$model = new score_model();
		echo $model->judgment_up($judgment_id);
	}
	
	public function score_intern_ajax(){
	// 顯示檢測結果  語言實習生
	$this->load->helper('url');
	$this->load->model('score_model');
	$model = new score_model();
	
	$testing_list_id = $this->input->post('testing_list_id');
	$member_id = $this->input->post('member_id');
	$project_id = $this->input->post('project_id');
	$office_id = $this->input->post('office_id');
	
	$data['intern'] = $model->score_intern_speech_ajax($testing_list_id,$member_id,$project_id,$office_id); //注音資料
	
	$data['intern2'] = $model->score_intern_speech_ajax_2($testing_list_id,$member_id,$project_id,$office_id); //念句子 數數字 輪替唸音 說故事 資料
	
	$data['intern_name'] = $model->score_intern_speech_name($testing_list_id,$member_id,$project_id,$office_id); //兒童姓名及幼稚園名稱
	
	
	
	$this->load->view('score_intern_evaluation_ajax',$data);
	
	}
	
	public function score_speech_ajax(){
	// 顯示檢測結果 語言自療師
	$this->load->helper('url');
	$this->load->model('score_model');
	$model = new score_model();
	
	$testing_list_id = $this->input->post('testing_list_id');
	$member_id = $this->input->post('member_id');
	$project_id = $this->input->post('project_id');
	$office_id = $this->input->post('office_id');
	
	$data['speech'] = $model->score_intern_speech_ajax($testing_list_id,$member_id,$project_id,$office_id);
	
	$data['speech2'] = $model->score_intern_speech_ajax_2($testing_list_id,$member_id,$project_id,$office_id); //念句子 數數字 輪替唸音 說故事 資料
	
	$data['speech_name'] = $model->score_intern_speech_name($testing_list_id,$member_id,$project_id,$office_id);
	
	$this->load->view('score_speech_evaluation_ajax',$data);
	
	}
	
}