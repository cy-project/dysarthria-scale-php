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
