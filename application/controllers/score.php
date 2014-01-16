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
		
		
		echo $score->score_calculate($score_value,$note_value,$topic_id,$result_id,$member_id); //印出給ajax接收 (未通過0 false，通過1 ture)
	}
	
	
	
	public function score_views_children(){//針對專案找出幼兒的相關資料
		$this->load->helper('url');
		$this->load->library('score_lib');
		
		$score= new score_lib();	
			

		$data = $this->uri->uri_to_assoc(3);

		$data['children']=$score->score_children($data['project_id']);
		
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
	
	public function score_views_topics(){ //針對專案的檢測主題找出幼兒的檢測題目
		
		$this->load->helper('url');
		$data = $this->uri->uri_to_assoc(3);
		 
		
		$this->load->library('score_lib');
		$score= new score_lib();
		$data['topic_on']=$score->score_topic_on($data['testing_list_id'],$data['part_id']);
		
		$data['topic_yes']=$score->score_topic_yes($data['testing_list_id'],$data['part_id']);
		
		$this->load->view('score_views_topics',$data);

	
	}
	
	public function score_views_topics_ajax(){ 
	
		$this->load->helper('url');
		$data = $this->uri->uri_to_assoc(3);
		$this->load->library('score_lib');
		$score= new score_lib();
		
		$data['topic_on']=$score->score_topic_on($data['testing_list_id'],$data['part_id']);
		$data['topic_yes']=$score->score_topic_yes($data['testing_list_id'],$data['part_id']);
	
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
	
	
	
}