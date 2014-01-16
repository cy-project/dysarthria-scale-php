<?php


class project_mysql_data extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	
	}
	
	public function select_project_all($member_id) 
	{
		
		$sel_sql="SELECT
project.name AS project_name,
Count(testing_lists.name) AS Counts,
project.id,
project.start_date,
project.area,
project.`status`,
member.name AS member_name,
project.county
FROM
testing_lists
Inner Join project ON testing_lists.project_id = project.id
Inner Join member ON project.manager = member.id
Inner Join people_list ON people_list.project_id = project.id
WHERE
people_list.member_id =  '$member_id'
GROUP BY project.id
ORDER BY project.start_date DESC";
		
		
		
		$query =$this->db->query($sel_sql); 

		return $query;
		
	}
	
	public function select_project_surveying($project_id,$member_id){
	
	$sel_sql="SELECT
children.language,
children.rank,
children.grade,
school.name AS school_name,
children.name AS children_name,
children.sex,
testing_list.`isupload`,
testing_list.id,
children.bir
FROM
testing_list
Inner Join children ON testing_list.children_id = children.id
Inner Join school ON children.school_id = school.id
WHERE
testing_list.project_id =  '$project_id'AND
testing_list.rater = '$member_id'";
		
		
		
		$query =$this->db->query($sel_sql); 

		return $query;
	
	}
	


}
