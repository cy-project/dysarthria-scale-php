<?php

class Statistics
{
	function __construct()
	{
		$CI = & get_instance();
		$CI->load->model('Recognition_model');
		$CI->load->library('Datamodel');
	
	}
	
	public function getStatistics()//統計語音辨識的正確率
	{
		$rm = new Recognition_model();
		
		$result = $rm->getStatisticsPartResult();
		
		return $result;
	}
	
	public function Comparison()//比對
	{
		$rm = new Recognition_model();
		
		$uncheck_array = $rm->getGoogleJudgment();//取得還未與語言治療師判斷過的google結果 
		
		foreach ($uncheck_array as $uncheck)
		{
			$google_result_array = $rm->getGoogleResult($uncheck->result_id);
			
			$wrong_code_array = $rm->getJudgmentResult($uncheck->result_id);
			
			if ($wrong_code_array != 0 && $google_result_array != 0)
			{
				if (count($wrong_code_array) < 3)
				{
					$num = (count($wrong_code_array)-1);
				}
				else
				{
					$num = (($google_result_array[0]->topic_id)%3);
					
					if ($num == 0)
					{
						$num = (count($wrong_code_array)-1);
					}
				
				}

				
				if ($wrong_code_array[$num] == ($google_result_array[0]->result))
				{
					$ans = 1;
					
					$rm->updateGoogleisRight($uncheck->result_id,$ans);
					
					echo 'YES <br/>';
				}
				else
				{
					$ans = 0;
					
					$rm->updateGoogleisRight($uncheck->result_id,$ans);
					
					echo 'NO <br/>';
				}
				
			}
			else
			{
				continue;
			}
			
		}
		
		
	}

}