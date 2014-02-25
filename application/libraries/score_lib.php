<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class score_lib 
{
	
	public function score_lib()
	{

		$CI = & get_instance();
		$CI->load->model('score_model');
		$CI->load->model('rules_model');
		
		$this->data = new score_model(); // 宣告 model
	}
	/* 檢測者計算公式 */
	public function score_calculate($score_value,$note_value,$topic_id,$result_id,$member_id)
	{
		
		$rules_model = new rules_model(); // 宣告 model
		$weight=$rules_model->select_rules_value(1);
		
		$Condition=$weight;//規則 1.大於，0.大於等於   (沒有連規則)
		
		$Scores_sum=0; //單筆總和
		
		for($i=0;$i<sizeof($score_value);$i++){
	
			$Scores_sum +=$score_value[$i];

		}
		
		$Strings_Scores=""; //存1,1,-1,1, 型態
		
		for($j=0;$j<sizeof($score_value);$j++){
	
			$Strings_Scores .=$score_value[$j].",";

		}
		
		$Strings_note=""; //存1,1,-1,1, 型態
		
		for($w=0;$w<sizeof($note_value);$w++){
	
			$Strings_note .=$note_value[$w].",";

		}
		
		$AverageValue=sizeof($score_value)/2; //總數平均值
		
		$Standard=0; //未通過0 false，通過1 ture
		
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
		
		$return_check=$this->data->Add_judgment($result_id,$Strings_Scores,$Strings_note,$Scores_sum,$Standard,$member_id,$topic_id); //紀錄施測者評分結果 (寫入judgment 表單資料)
		
		$arrays=explode("-",$return_check);
		
		$judgment_id=$arrays[0];
		
		$permission_check=$arrays[1];
		
		if(($Standard==0)&&($permission_check==2)){
		
		$this->data->Add_trace_list($judgment_id,$Standard);
		//被施測者(小孩)未通過測驗，將資料寫入追蹤名單中(trace_list)
		}
		
		//return $Strings_note."-".$Strings_Scores."-".$Scores_sum;
		return $Standard;
	}
	
	
	/* 取出專案裡面全部小孩子的資料 */
	public function score_children($project_id){
		$children_data=$this->data->select_children_list($project_id);
		return $children_data;
	}
	/*  取出專案找出幼兒的檢測主題 */
	public function score_part(){
		$part_data=$this->data->select_part_list();
		return $part_data;
	}
	/* 取出幼兒的未檢測題目 */
	public function score_topic_on($testing_list_id,$part_id){
		$topic_data=$this->data->select_topic_list_no($testing_list_id,$part_id);
		return $topic_data;
	}
	/* 取出幼兒的已檢測題目 */
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