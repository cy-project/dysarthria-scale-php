<?php

class Dispatch
{
	
	function __construct()
	{
		$CI=& get_instance();
		$CI->load->model('dispatch_model');
		$CI->load->library('Datamodel');
		$CI->load->model('Project_model');
	}
	
	public function cookieData($cookied){
		$sting = "";
		$length = count($cookied);
		for($a = 0;$a<$length;$a++){
			$sting = $sting."|".$cookied[$a][0].",".$cookied[$a][1].",".$cookied[$a][2];
		}
		return $sting;
	}
	
	public function setDispatchKid($kiddata){
		$ProjectModel = new Project_model;
		$length = count($kiddata);
		for($a = 0;$a<$length;$a++){
			$kidarray = array(
				'detect' => $kiddata[$a][2],
				'rater' => $kiddata[$a][1]
			);
			$ProjectModel->updateTestlist($kiddata[$a][0], $kidarray);
		}
		return "ok";
	}
	
		public function DispatchData($project_id, $count, $selectedata){
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
					if($selectedata[$count1][0] == $KidBasicData[$count1]->id){
						if($selectedata[$count1][1] == 0){
							$KidBasicData[$count1]->rater_name = 0 ;
							$KidBasicData[$count1]->rater = 0 ;
						}
						if($selectedata[$count1][1] != 0){
							$KidBasicData[$count1]->rater_name = @$DispatchModel->getMemberName($selectedata[$count1][1]);
							$KidBasicData[$count1]->rater =  $selectedata[$count1][1];
						}
						if($selectedata[$count1][2] == 0){
							$KidBasicData[$count1]->detect_name = 0;
							$KidBasicData[$count1]->detect = 0;
						}
						if($selectedata[$count1][2] != 0){
							$KidBasicData[$count1]->detect_name = @$DispatchModel->getMemberName($selectedata[$count1][2]);
							$KidBasicData[$count1]->detect =  $selectedata[$count1][2];
						}
					}
				}
				$count1++;
			}
			return $KidBasicData;
		}
	
	public function KidData($project_id, $count){
		$DispatchModel = new dispatch_model;
		$FirstKidData = $DispatchModel->getProjectChildData($project_id);
		$count1 = 0;
		$selectdata = "";
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
				$KidBasicData[$count1]->rater_name = @$DispatchModel->getMemberName($KidBasicData[$count1]->rater);
				$KidBasicData[$count1]->detect_name = @$DispatchModel->getMemberName($KidBasicData[$count1]->detect);
				
			}
			$count1++;
		}
		for($a = 0;$a < $count1;$a++){
			$selectdata = $selectdata."|".$KidBasicData[$a]->id.",".$KidBasicData[$a]->rater.",".$KidBasicData[$a]->detect;
			
		}
			return $selectdata;
	}
	

}
