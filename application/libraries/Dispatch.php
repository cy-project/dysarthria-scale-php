<?php

class Dispatch
{
	
	function __construct()
	{
		$CI=& get_instance();
		$CI->load->model('dispatch_model');
		$CI->load->library('Datamodel');
	}
	
	public function DispatchData($project_id, $count){
		$DispatchModel = new dispatch_model;
		$FirstKidData = $DispatchModel->getProjectChildData($project_id);
		$count1 = 0;
		foreach($FirstKidData->result() as $i){
			$KidBasicData[$count1] = new Datamodel();
			$Data = $DispatchModel->ChildBasicData($i->children_id);
			foreach($i as $key => $val){
				$KidBasicData[$count1]->$key = $val;
				$KidBasicData[$count1]->school_name=$DispatchModel->schoolname($Data[0]->school_id);
				$KidBasicData[$count1]->rank=$Data[0]->rank;
				$KidBasicData[$count1]->grade = $Data[0]->grade;
				$KidBasicData[$count1]->name = $Data[0]->name;
				$KidBasicData[$count1]->sex = $Data[0]->sex;
				$KidBasicData[$count1]->select = $count;
				$KidBasicData[$count1]->rater_name = @$DispatchModel->getMemberName($i->rater);
				$KidBasicData[$count1]->detect_name = @$DispatchModel->getMemberName($i->detect);
			}
			$count1++;
		}
			return $KidBasicData;
	}
	

}
