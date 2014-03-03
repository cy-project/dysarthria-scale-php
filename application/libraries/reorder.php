<?php

class Reorder
{
	private $data = array();
	
	function __construct()
	{
	
	}
	
	public function GroupSort($GroupData)
	{
		$length = count($GroupData);
		$count = array();
		for($a = 1;$a<6;$a++){
			$count[$a] = 0;
		}
		for($MeasuredFunding = 0; $MeasuredFunding<$length;$MeasuredFunding++){
			if($GroupData[$MeasuredFunding]->type == 1){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->name;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 2){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->name;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 3){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->name;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 4){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->name;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 5){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->name;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
		}
		return $this->data;
	}
	
	public function AgainSort($newdata){
		$length = count($newdata);
		$count = array();
		$count1 = array();
		for($con = 1;$con <= $length;$con++){
			$length1 = count($newdata[$con]);
			for($a = 0;$a<3;$a++){
				$count1[$a] = 0;
			}
			for($com = 0;$com<$length1;$com++){
				if(($com+1)%3 == 0){
					$count[$con][2][$count1[2]] = $newdata[$con][$com];
					$count1[2]++;
				}
				elseif(($com+1)%3 == 2){
					$count[$con][1][$count1[1]] = $newdata[$con][$com];
					$count1[1]++;
				}
				elseif(($com+1)%3 == 1){
					$count[$con][0][$count1[0]] = $newdata[$con][$com];
					$count1[0]++;
				}
			}
		}
		return $count;
	}
	
	public function GroupSort1($GroupData)
	{
		$length = count($GroupData);
		$count = array();
		for($a = 1;$a<6;$a++){
			$count[$a] = 0;
		}
		for($MeasuredFunding = 0; $MeasuredFunding<$length;$MeasuredFunding++){
			if($GroupData[$MeasuredFunding]->type == 1){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->id;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 2){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->id;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 3){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->id;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 4){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->id;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
			elseif($GroupData[$MeasuredFunding]->type == 5){
				$this->data[$GroupData[$MeasuredFunding]->type][$count[$GroupData[$MeasuredFunding]->type]] = $GroupData[$MeasuredFunding]->id;
				$count[$GroupData[$MeasuredFunding]->type]++;
			}
		}
		return $this->data;
	}

}
