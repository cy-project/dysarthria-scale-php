<?php

class score_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('permission');
	}
	
	public function Add_judgment($result_id,$Strings_Scores,$Strings_note,$Scores_sum,$Standard,$member_id,$topic_id,$project_id) //紀錄施測者評分結果 (寫入judgment 表單資料)
	{
	
		
		$permission = new permission();
		
		$permission_check=$permission->select_people_Permission($member_id,$project_id);
		
		$Today=date("Y-m-d H:i:s");
		
		$sql="";
		$select_sql="";
		if($permission_check==2){
		
		$sql="INSERT INTO `judgment` (`detect`,`date`,`result`,`wrongcode`,`istrace`,`note`,`available`) VALUES ('$member_id','$Today','$Scores_sum','$Strings_Scores','$Standard','$Strings_note','1')";
		
		
		$select_sql="select `id` from `judgment` where `detect`='$member_id' and `date`='$Today' and `result`= '$Scores_sum'  and `wrongcode`='$Strings_Scores' and `istrace`='$Standard' and `note`='$Strings_note'and `available`= '1'";
		
		}else{
		
		$sql="INSERT INTO `judgment` (`detect`,`date`,`result`,`wrongcode`,`istrace`,`note`,`available`) VALUES ('$member_id','$Today','$Scores_sum','$Strings_Scores','$Standard','$Strings_note','0')";
		
		$select_sql="select `id` from `judgment` where `detect`='$member_id' and `date`='$Today' and `result`= '$Scores_sum'  and `wrongcode`='$Strings_Scores' and `istrace`='$Standard' and `note`='$Strings_note'and `available`='0'";
		
		}	
		$this->db->query($sql); //add
		
		
		
		
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
		
		
		
		
		if($permission_check==2){
		
		$sqlinto="select count(`topic`.`id`) as number from topic where (`topic`.`id` in( SELECT topic.id
FROM
testing_list
Inner Join project ON testing_list.project_id = project.id
Inner Join result ON testing_list.id = result.testing_id
Inner Join judg_list ON result.id = judg_list.result_id
Inner Join topic ON result.topic_id = topic.id
Inner Join judgment ON judgment.id = judg_list.judgment_id
WHERE
testing_list.id =  '$testing_id' AND
judgment.available =  '1' ))";
			
		$query4 =$this->db->query($sqlinto); //select
		
		$number_testing="";
		
		foreach ($query4->result_array() as $row){
			
			$number_testing= $row['number'];
			
		}
		
		$sqlinto2="SELECT
				count(topic.id) AS number
				FROM
				topic";
				
		$query5 =$this->db->query($sqlinto2); //select
		
		$number_topic="";
		
		foreach ($query5->result_array() as $row){
			
			$number_topic= $row['number'];
			
		}
		
		
		
		
		
			if($number_testing==$number_topic){  //如果評測題已全部評測完畢後，將testing_list的check改為1（這）
			
				$upsql="UPDATE `testing_list` SET `detect_check`='1' WHERE (`id`='$testing_id')";
				
				$this->db->query($upsql); //select
			
			}
		
		}else{
			
			$sqlinto="select count(`topic`.`id`) as number from topic where (`topic`.`id` in( SELECT topic.id
FROM
testing_list
Inner Join project ON testing_list.project_id = project.id
Inner Join result ON testing_list.id = result.testing_id
Inner Join judg_list ON result.id = judg_list.result_id
Inner Join topic ON result.topic_id = topic.id
Inner Join judgment ON judgment.id = judg_list.judgment_id
WHERE
testing_list.id =  '$testing_id' AND
judgment.available =  '0' ))";
			
		$query4 =$this->db->query($sqlinto); //select
		
		$number_testing="";
		
		foreach ($query4->result_array() as $row){
			
			$number_testing= $row['number'];
			
		}
		
		$sqlinto2="SELECT
				count(topic.id) AS number
				FROM
				topic";
				
		$query5 =$this->db->query($sqlinto2); //select
		
		$number_topic="";
		
		foreach ($query5->result_array() as $row){
			
			$number_topic= $row['number'];
			
		}
		
		
			if($number_testing==$number_topic){  //如果評測題已全部評測完畢後，將testing_list的check改為1（這）
			
				$upsql="UPDATE `testing_list` SET `check`='1' WHERE (`id`='$testing_id')";
				
				$this->db->query($upsql); //select
			
			}
		}
		
		
		return $judgment_id."-".$permission_check;
		//return $select_sql;
	}
	
	public function Add_trace_list($judgment_id,$Standard){
	
	
		$Today=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO `trace_list` (`judgment_id`,`date`,`check`) VALUES ('$judgment_id','$Today','$Standard')";
			
		$this->db->query($sql); //add
	
	}
	
	public function select_children_list($project_id,$member_id,$permission_check){
	
	
	$sql="SELECT
					testing_list.id AS testing_list_id,
testing_list.project_id,
testing_list.children_id,
testing_list.rater,
testing_list.`check`,
children.name AS children_name,
children.sex,
children.bir,
school.name AS school_nam,
children.grade,
children.rank,
children.language,
member.name AS member_namee,
testing_list.detect_check
FROM
					testing_list
					Inner Join children ON testing_list.children_id = children.id
					Inner Join member ON testing_list.rater = member.id
					Inner Join school ON children.school_id = school.id
WHERE
testing_list.project_id =  '".$project_id."'";
	
	
	
	
	
	//$permission_check : 1.實習語言治療師 2.語言治療師 3.沒有權限
	
		if($permission_check ==1){
		
			$sql.=" AND testing_list.rater =  '".$member_id."'";
			
			}elseif($permission_check ==2){
		
			$sql.=" AND testing_list.detect =  '".$member_id."'";
		}
	
		
			
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
	
	public function select_topic_list_no($testing_list_id,$part_id,$permission_check){
		
		$sql="";
		if($permission_check==2){
		
			$sql="SELECT 
				topic.title,
				topic.script,
				result_del_judg2.result_id
				FROM
				result_del_judg2
				Inner Join topic ON topic.id = result_del_judg2.topic_id
				WHERE
				result_del_judg2.testing_id =  '$testing_list_id' AND
				topic.part =  '$part_id'";
				
			}elseif($permission_check==1){
			
			$sql="SELECT 
				topic.title,
				topic.script,
				result_del_judg.result_id
				FROM
				result_del_judg
				Inner Join topic ON topic.id = result_del_judg.topic_id
				WHERE
				result_del_judg.testing_id =  '$testing_list_id' AND
				topic.part =  '$part_id'";
			
			}	
			
			if($part_id==1){
			$sql=$sql." GROUP BY topic.title";
			}
			
		$query=$this->db->query($sql);
		
	  return $query;

	}
	
	public function select_topic_list_yes($testing_list_id,$part_id,$permission_check){
	
		if($permission_check==2){
		
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
topic.part =  '$part_id' AND
judgment.available =  '1'";

}elseif($permission_check==1){

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
topic.part =  '$part_id' AND
judgment.available =  '0'";


}
		if($part_id==1){
			$sql=$sql." GROUP BY topic.title";
		}	
			
		$query=$this->db->query($sql);
		
	  return $query;
	}
	
	public function Select_score_symbol($result_id){ //ㄅㄆㄇㄈ符號，說故事　（這）
	
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
		
		$query3 =$this->db->query($select_sql3); //（這）select　出　voice_file
	
		return $query3;
	}
	
	public function Select_score_words($result_id){ //句子，數數字，輪替　（這）
	
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
	
	$query2 =$this->db->query($select_sql2);  //（這）select　出　voice_file
	
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
	
	
	public function  score_intern_speech_ajax($testing_list_id,$member_id,$project_id,$office_id){
	
	$select_sql="";
	
	if($office_id==0){ //實習生
	
	$select_sql="SELECT
project.`name` as pname,
children.`name`as cname,
topic.title,
group_concat(topic.script) AS script,
group_concat(result.voice_file) AS voice_file,
group_concat(judgment.wrongcode) as wrongcode,
topic.part,
group_concat(judgment.note) as note
FROM
project
INNER JOIN testing_list AS testings ON testings.project_id = project.id
INNER JOIN result ON result.testing_id = testings.id
INNER JOIN topic ON result.topic_id = topic.id
INNER JOIN judg_list ON judg_list.result_id = result.id
INNER JOIN judgment ON judg_list.judgment_id = judgment.id
INNER JOIN children ON testings.children_id = children.id
WHERE
testings.id = '".$testing_list_id."' AND
project.id = '".$project_id."' AND
judgment.available = '".$office_id."'
GROUP BY
topic.title
";
	
	}elseif($office_id==1){ //語言治療師
	
	$select_sql="SELECT
project.`name` as pname,
children.`name`as cname,
topic.title,
group_concat(topic.script) AS script,
group_concat(result.voice_file) AS voice_file,
group_concat(judgment.wrongcode) as wrongcode,
topic.part,
group_concat(judgment.note) as note
FROM
project
INNER JOIN testing_list AS testings ON testings.project_id = project.id
INNER JOIN result ON result.testing_id = testings.id
INNER JOIN topic ON result.topic_id = topic.id
INNER JOIN judg_list ON judg_list.result_id = result.id
INNER JOIN judgment ON judg_list.judgment_id = judgment.id
INNER JOIN children ON testings.children_id = children.id
WHERE
testings.id = '".$testing_list_id."' AND
project.id = '".$project_id."' AND
judgment.available = '".$office_id."'
GROUP BY
topic.title
";
	
	}

	
	$query =$this->db->query($select_sql); //select
	
	return $query;
	
	
	}
	
	public function score_intern_speech_name($testing_list_id,$member_id,$project_id,$office_id){
	
	$select_sql="SELECT
project.`name` AS pname,
children.`name` AS cname
FROM
project
INNER JOIN testing_list AS testings ON testings.project_id = project.id
INNER JOIN children ON testings.children_id = children.id
WHERE
testings.id = '".$testing_list_id."' AND
project.id = '".$project_id."'
";
	
	

	
	$query =$this->db->query($select_sql); //select
	
	return $query;
	
	
	}
	
}
