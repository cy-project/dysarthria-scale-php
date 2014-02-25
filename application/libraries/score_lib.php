<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class score_lib 
{
	
	public function score_lib()
	{

		$CI = & get_instance();
		$CI->load->model('score_model');
		$CI->load->model('rules_model');
		
		$this->data = new score_model(); // �ŧi model
	}
	/* �˴��̭p�⤽�� */
	public function score_calculate($score_value,$note_value,$topic_id,$result_id,$member_id)
	{
		
		$rules_model = new rules_model(); // �ŧi model
		$weight=$rules_model->select_rules_value(1);
		
		$Condition=$weight;//�W�h 1.�j��A0.�j�󵥩�   (�S���s�W�h)
		
		$Scores_sum=0; //�浧�`�M
		
		for($i=0;$i<sizeof($score_value);$i++){
	
			$Scores_sum +=$score_value[$i];

		}
		
		$Strings_Scores=""; //�s1,1,-1,1, ���A
		
		for($j=0;$j<sizeof($score_value);$j++){
	
			$Strings_Scores .=$score_value[$j].",";

		}
		
		$Strings_note=""; //�s1,1,-1,1, ���A
		
		for($w=0;$w<sizeof($note_value);$w++){
	
			$Strings_note .=$note_value[$w].",";

		}
		
		$AverageValue=sizeof($score_value)/2; //�`�ƥ�����
		
		$Standard=0; //���q�L0 false�A�q�L1 ture
		
		switch ($Condition) {
		
				case 1:
					if($AverageValue<$Scores_sum){
						$Standard=1;
						
					}
					break;
				case 2:
					if($AverageValue<=$Scores_sum){
						$Standard=1;
					}
					break;
					
		}
		
		$return_check=$this->data->Add_judgment($result_id,$Strings_Scores,$Strings_note,$Scores_sum,$Standard,$member_id,$topic_id); //�����I���̵������G (�g�Jjudgment �����)
		
		$arrays=explode("-",$return_check);
		
		$judgment_id=$arrays[0];
		
		$permission_check=$arrays[1];
		
		if(($Standard==0)&&($permission_check==2)){
		
		$this->data->Add_trace_list($judgment_id,$Standard);
		//�Q�I����(�p��)���q�L����A�N��Ƽg�J�l�ܦW�椤(trace_list)
		}
		
		//return $Strings_note."-".$Strings_Scores."-".$Scores_sum;
		return $Standard;
	}
	
	
	/* ���X�M�׸̭������p�Ĥl����� */
	public function score_children($project_id){
		$children_data=$this->data->select_children_list($project_id);
		return $children_data;
	}
	/*  ���X�M�ק�X���઺�˴��D�D */
	public function score_part(){
		$part_data=$this->data->select_part_list();
		return $part_data;
	}
	/* ���X���઺���˴��D�� */
	public function score_topic_on($testing_list_id,$part_id){
		$topic_data=$this->data->select_topic_list_no($testing_list_id,$part_id);
		return $topic_data;
	}
	/* ���X���઺�w�˴��D�� */
	public function score_topic_yes($testing_list_id,$part_id){
		$topic_data=$this->data->select_topic_list_yes($testing_list_id,$part_id);
		return $topic_data;
	}
	
	public function score_symbol($result_id){
		$symbol_data=$this->data->Select_score_symbol($result_id);
		return $symbol_data;
	}
	
	public function score_words($result_id){
		$symbol_data=$this->data->Select_score_words($result_id);
		return $symbol_data;
	}
	
}