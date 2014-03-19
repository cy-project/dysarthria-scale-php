
<p class="block-heading">實習生評測結果 { <?
 foreach($intern_name->result() as $row):?>
<?=$row->pname?>  <?=$row->cname?>  
 <? endforeach; ?>}</p>



<table class="sortable table">
	<thead>
			<tr>
			 
			  <th><a href="#">標題</a></th>
			  <th><a href="#">題目</a></th>
			  <th><a href="#">備註</a></th>
			  <th><a href="#">音檔</a></th>
			</tr>
		  </thead>
		  <tbody>
		  <?php 
			
			
		    $Stringall="";
			$Stringall2="";
			$temp=1;
		    foreach($intern->result() as $row):?>
		
			<?php
			
			
			
			if($row->part==1){
			
			$script_array=explode(",",$row->script);
			
			$voice_file_array=explode(",",$row->voice_file);
			
			$wrongcode_array=explode(",",$row->wrongcode);
			
			
			$note=explode(",",$row->note);
			
			
			$note_str="";
			
			
			for($d=0;$d<count($note);$d++){
				
				if($note[$d]!=""){
				
					$note_str.=$note[$d]."-";

				}else{
				
					$note_str.=",";
				
				}
			
			}
			

			$note_str=explode(",",$note_str);
			
			$note_str=explode("-",$note_str[0]);
			
			
			
			$note="";
			
			for($r=0;$r<count($note_str);$r++){
			
				if($note_str[$r]!=""){
				
				$note[$r]=$note_str[$r];
				
				}
			
			}
			
			//print_r($note);
		
			
		
			
			
			
			for($i=0;$i<count($script_array);$i++){
			
				
							  
							  if($wrongcode_array[$i]=="1"){
							  
									$s2="<td>".$row->title."</td>";
									
							  
							  }elseif($wrongcode_array[$i]=="0"){
											
									$s2="<td><span class=\"label label-success\">".$row->title."</span></td>";
											
							  }elseif($wrongcode_array[$i]=="-1"){
									
									$s2="<td><span class=\"label label-warning\">".$row->title."</span></td>";
							  
							  }
							  
				$s3="<td>".$script_array[$i]."</td><td>".$note[$i]."</td>
							  <td><div class=\"wavclass\" id=\"wavshow-".$temp."\"></div>
						  <input type=\"hidden\" id=\"wavget-".$temp."\" value=\"".$voice_file_array[$i]."\" />"."</td>
						     </tr>";
			
				$temp++;
				$Stringall.=$s2.$s3;
			}
			
			
			}else{  //-------------------------
				
				$s9="";
				$s10="";
				$script_array=explode(",",$row->script); 
				
				$wrongcode_array=explode(",",$row->wrongcode);
				
				$note=explode(",",$row->note);
				
				$note_str="";
				for($d=0;$d<count($note);$d++){
				
				if($note[$d]!=""){
				
					$note_str.=$note[$d]."<br>";

				}else{
				
					$note_str.=",";
				
				}
			
			}
			
			$note_str=explode(",",$note_str);
			$note="";
				for($r=0;$r<count($note_str);$r++){
			
				if($note_str[$r]!=""){
				
				$note[$r]=$note_str[$r];
				
				}
			
			}
				
				
				$wrongcode_arrays="";
				$asd_array="";
				$x=0;
				
				for($j=0;$j<count($wrongcode_array);$j++){
					
					if($wrongcode_array[$j]==""){
					
					$wrongcode_arrays[$x]=$asd_array;
					$x++;
					$asd_array="";
					}else{
					
						$asd_array.=$wrongcode_array[$j].",";
					
					}
							
				}
				
				
				
				$voice_file_array=explode(",",$row->voice_file);
						 
				
				
				for($j=0;$j<count($script_array);$j++){
				
				
				
				
				
				$s7="<td>".$row->title."</td>";
				
				
				
				if($row->part != 4){
					
					
					$script_array2=explode(" ",$script_array[$j]);
					
					
							}else{
							

					$strs="";
					$script_array3=explode(" ",$script_array[$j]);
					
					$t=0;
					$h=1;
					for($o=0;$o<count($script_array3)/2;$o++){
					
						if($o==2){
						
							$strs.=$script_array3[$t].$script_array3[$h];
							
									}else{
									
							$strs.=$script_array3[$t].$script_array3[$h].",";
							
						}
					$t+=2;
					$h+=2;
					
					}
					
					$script_array2=explode(",",$strs);
					
					//print_r($script_array2);
					}
					
					
					
					$wrongcode_array=explode(",",$wrongcode_arrays[$j]);
					
					for($i=0;$i<count($script_array2);$i++){
					
						if($wrongcode_array[$i]=="1"){
							  
									$s10.=$script_array2[$i]."<br>";
									
							  
							  }elseif($wrongcode_array[$i]=="0"){
											
									$s10.="<span class=\"label label-success\" title=\"不清楚\">".$script_array2[$i]."</span><br>";
											
							  }elseif($wrongcode_array[$i]=="-1"){
									
									$s10.="<span class=\"label label-warning\" title=\"不正確\">".$script_array2[$i]."</span><br>";
							  
						}
					}
					
					
					
					
					
					$s9.="<td>".$s10."</td><td>".$note[$j]."</td><td >
					<div class=\"wavclass\" id=\"wavshow-".$temp."\"></div>
						  <input type=\"hidden\" id=\"wavget-".$temp."\" value=\"".$voice_file_array[$j]."\" />"."</td></tr>";
					
					$Stringall2.=$s7.$s9;	
					
					$s9="";
					$s10="";
					$temp++;
				}

			
			}
			
			?>
			
			<?php endforeach;
			
			echo $Stringall.$Stringall2;
			
			?>
</tbody>
</table>

