<?php

class score_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function Add_judgment($result_id,$Strings_Scores,$Strings_note,$Scores_sum,$Standard,$member_id,$topic_id) //紀錄施測者評分結果 (寫入judgment 表單資料)
	{
		$Today=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO `judgment` (`detect`,`date`,`result`,`wrongcode`,`istrace`,`note`) VALUES ('$member_id','$Today','$Scores_sum','$Strings_Scores','$Standard','$Strings_note')";
			
		$this->db->query($sql); //add
		
		$select_sql="select `id` from `judgment` where `detect`='$member_id' and `date`='$Today' and `result`= '$Scores_sum'  and `wrongcode`='$Strings_Scores' and `istrace`='$Standard' and `note`='$Strings_note'";
		
		
		$query =$this->db->query($select_sql); //select
		
		$judgment_id="";
		
		foreach ($query->result_array() as $row)
		{
		  $judgment_id= $row['id'];
		}
	
		$select_sql2="SELECT
		result.testing_id
		FROM
		result
		WHERE
		result.id =  '$result_id'
		GROUP BY
		result.testing_id";
		
		$query2 =$this->db->query($select_sql2); //select
		
		$testing_id="";
		
		foreach ($query2->result_array() as $row)
		{
		  $testing_id= $row['testing_id'];
		}
		
		if(is_array($topic_id)){ //判斷$topic_id是否為陣列
		
		
		for($j=0;$j<sizeof($topic_id);$j++){
		
			 $select_sql3="SELECT
				result.testing_id,
				result.topic_id,
				result.id
				FROM
				result
				WHERE
				result.testing_id =  '$testing_id' AND
				result.topic_id =  '$topic_id[$j]'
				GROUP BY
				result.testing_id";
			$query3 =$this->db->query($select_sql3); //select
			$result_ids="";
			foreach ($query3->result_array() as $row){
			
			$result_ids= $row['id'];
			
			}
			
			$select_sql4="INSERT INTO `judg_list` (`judgment_id`,`result_id`) VALUES ('$judgment_id','$result_ids')";
			$this->db->query($select_sql4);
		}
		
		}else{
		
		$select_sql3="SELECT
				result.testing_id,
				result.topic_id,
				result.id
				FROM
				result
				WHERE
				result.testing_id =  '$testing_id' AND
				result.topic_id =  '$topic_id'
				GROUP BY
				result.testing_id";
			$query3 =$this->db->query($select_sql3); //select
			$result_ids="";
			foreach ($query3->result_array() as $row){
			
			$result_ids= $row['id'];
			
			}
			
			$select_sql4="INSERT INTO `judg_list` (`judgment_id`,`result_id`) VALUES ('$judgment_id','$result_ids')";
			
			$this->db->query($select_sql4);
		
		
		
		}
		
		return $judgment_id;
		//return $select_sql;
	}
	
	public function Add_trace_list($judgment_id,$Standard){
	
	
		$Today=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO `trace_list` (`judgment_id`,`date`,`check`) VALUES ('$judgment_id','$Today','$Standard')";
			
		$this->db->query($sql); //add
	
	}
	
	public function select_children_list($project_id){
	
		$sql="SELECT
					testing_list.id AS testing_list_id,
					testing_list.project_id,
					testing_list.children_id,
					testing_list.rater,
					testing_list.`check`,
					children.name as children_name,
					children.sex,
					children.bir,
					school.name as school_nam,
					children.grade,
					children.rank,
					children.language,
					member.name as member_namee 
					FROM
					testing_list
					Inner Join children ON testing_list.children_id = children.id
					Inner Join member ON testing_list.rater = member.id
					Inner Join school ON children.school_id = school.id
					WHERE
					testing_list.project_id =  '$project_id'";
			
		$query=$this->db->query($sql);
		return $query;
	}
	
		public function select_part_list(){
	
		$sql="SELECT
					part.id,
					part.name
					FROM
					part";
			
		$query=$this->db->query($sql);
		return $query;
	}
	
	public function select_topic_list_no($testing_list_id,$part_id){
		
			$sql="SELECT 
				topic.title,
				topic.script,
				result_del_judg.result_id
				FROM
				result_del_judg
				Inner Join topic ON topic.id = result_del_judg.topic_id
				WHERE
				result_del_judg.testing_id =  '$testing_list_id' AND
				topic.part =  '$part_id'
				GROUP BY
				topic.title";
			
		$query=$this->db->query($sql);
		
	  return $query;

	}
	
	public function select_topic_list_yes($testing_list_id,$part_id){
		
			$sql="SELECT
result.id AS result_id,
topic.title,
topic.script,
judgment.istrace,
judgment.id as judgment_ids
FROM
judg_list
Inner Join result ON judg_list.result_id = result.id
Inner Join topic ON topic.id = result.topic_id
Inner Join judgment ON judg_list.judgment_id = judgment.id
WHERE result.testing_id =  '$testing_list_id'
AND
topic.part =  '$part_id'
GROUP BY
topic.title";
			
		$query=$this->db->query($sql);
		
	  return $query;
	}
	
	public function Select_score_symbol($result_id){
	
		$select_sql="SELECT
result.topic_id,
result.testing_id,
topic.title
FROM
result
Inner Join topic ON result.topic_id = topic.id
WHERE
result.id =  '$result_id'";
			
		
		$query =$this->db->query($select_sql); //select
		
		$title="";
		$testing_id="";
		foreach ($query->result_array() as $row)
		{
		  $title= $row['title'];
		  $testing_id= $row['testing_id'];
		}
	
		$select_sql2="SELECT
				topic.id
				FROM
				topic
				WHERE
				topic.title =  '$title'";
				
		$query2 =$this->db->query($select_sql2); //select
		
		$strings="";
		foreach ($query2->result_array() as $row)
		{
		  $strings[] = $row['id'];
		}
		
		$str="";
		$length = count($strings);//取總數
		for ( $i=0 ; $i<$length ; $i++ ) {
		if($i==($length-1)){
		  $str.="result.topic_id ="."'".$strings[$i]."'";
		  }else{
		  $str.="result.topic_id ="."'".$strings[$i]."' OR ";
		  }
		}
		
		
		$select_sql3="SELECT
result.testing_id ,
result.topic_id as topic_id,
result.voice_file,
topic.title,
topic.script
FROM
result
Inner Join topic ON result.topic_id = topic.id
WHERE
result.testing_id =  '$testing_id' and(".$str.")";
		
		$query3 =$this->db->query($select_sql3); //select
	
		return $query3;
	}
	
	public function Select_score_words($result_id){
	
	$select_sql2="SELECT
			topic.title,
			topic.script,
			topic.id,
			topic.part,
			result.voice_file
			FROM
			result
			Inner Join topic ON result.topic_id = topic.id
			WHERE
			result.id =  '$result_id'";
	
	$query2 =$this->db->query($select_sql2); //select
	
		return $query2;
	}
	
	public function  judgment_up($judgment_id){
	
	$Today=date("Y-m-d H:i:s");
	
	$select_sql="SELECT * FROM `judgment` where `id`=$judgment_id";
	
	$query =$this->db->query($select_sql); //select
	
	$istrace="";
	foreach ($query->result_array() as $row){
			
			$istrace= $row['istrace'];
			
	}
	
	if($istrace==0){ //被追蹤
		$istrace=1;
		
		$del_sql="DELETE FROM `trace_list` WHERE (`judgment_id`='$judgment_id')";
		
		$this->db->query($del_sql);
		
	}elseif($istrace==1){ //尚未被追蹤
		$istrace=0;
		
		$in_sql="INSERT INTO `trace_list` (`judgment_id`,`date`) VALUES ('$judgment_id','$Today')";
		
		$this->db->query($in_sql);
	}
	
	$up_sql="UPDATE `judgment` SET `istrace`='$istrace' WHERE (`id`='$judgment_id')";  
	
	$this->db->query($up_sql); 
	
	 return "yes";
	}
	
	
}
