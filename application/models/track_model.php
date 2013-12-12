<?php

class track_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function select_track_list() //¨úpart_list¸ê®Æ
	{
		
		$select_sql="SELECT
part.name,
Count(result.id) as number,
part.id as part_id
FROM
trace_list
Inner Join judgment ON judgment.id = trace_list.judgment_id
Inner Join judg_list ON judgment.id = judg_list.judgment_id
Inner Join result ON judg_list.result_id = result.id
Inner Join topic ON result.topic_id = topic.id
Inner Join part ON topic.part = part.id
WHERE
trace_list.`check` =  '0'
GROUP BY
part.name
ORDER BY
part_id ASC";
		
		$query =$this->db->query($select_sql); //select

		return $query;
		
	}
	
	public function select_track_part_data($part_id){
		
		$select_sql="SELECT
judgment.wrongcode AS judgment_wrongcode,
judgment.result AS judgment_result,
judgment.`date`,
member.name AS member_name,
project.name AS project_name,
topic.title,
topic.script,
children.name AS children_name,
children.grade,
children.rank,
children.language,
school.name AS school_name,
part.name AS part_name,
judgment.id AS judgment_id,
topic.part,
children.sex,
judgment.istrace,
trace_list.`check`,
trace_list.`date`
FROM
judgment
Inner Join jubg_lists ON judgment.id = jubg_lists.judgment_id
Inner Join result ON jubg_lists.result_id = result.id
Inner Join member ON judgment.detect = member.id
Inner Join testing_list ON testing_list.id = result.testing_id
Inner Join project ON project.id = testing_list.project_id
Inner Join topic ON topic.id = result.topic_id
Inner Join part ON part.id = topic.part
Inner Join children ON children.id = testing_list.children_id
Inner Join school ON school.id = children.school_id
Inner Join trace_list ON judgment.id = trace_list.judgment_id
WHERE
topic.part =  '$part_id'";
		
		$query =$this->db->query($select_sql); //select

		return $query;
	
	
	}
	
	public function track_up_judgment($judgment_id,$check){
	$up_sql="";
	if($check==0){
	
	$up_sql="UPDATE `trace_list` SET `check`='1' WHERE (`judgment_id`='$judgment_id')";
	
	}else{
	
	$up_sql="UPDATE `trace_list` SET `check`='0' WHERE (`judgment_id`='$judgment_id')";
	
	}
	$this->db->query($up_sql); //select

	return "yes";
	

	}
}
