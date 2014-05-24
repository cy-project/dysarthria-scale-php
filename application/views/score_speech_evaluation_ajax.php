<p class="block-heading">語言自療師評測結果{ <?
 foreach($speech_name->result() as $row):?>
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
			$Temporary_title="";
			$Temporary_number=0;
			$temp=91;
		    foreach($speech->result() as $row):?>
		
			<?php
			
			if($row->part==1){
			
			
			
			//$voice_file_array = explode(",",$row->voice_file);
			
			$wrongcode_array = explode(",",$row->wrongcode);
			
			if( $Temporary_title == "" ){
			
							$note = explode(",",$row->note);

							$Temporary_title = $row->title;
						
						
						
					}else if( $Temporary_title == $row->title){
					
							$Temporary_number++;
			
							$note = explode(",",$row->note);

				
				}elseif($Temporary_title != $row->title){
			
						$note = explode(",",$row->note);

						$Temporary_title = $row->title;
						
						$Temporary_number=0;
			}
			
			 
			$note_str="";
			
			
			for($d=0;$d<count($note);$d++){
				
				if($note[$d]!=""){
				
					$note_str.=$note[$d]."-";

				}else{
				
					$note_str.=",";
				
				}
			
			}
			

			$note_str = explode(",",$note_str);
			
			$note_str = explode("-",$note_str[0]);
			
			
			
			
			
			$note="";
			
			for($r=0;$r<count($note_str);$r++){
			
				if($note_str[$r]!=""){
				
				$note[$r]=$note_str[$r];
				
				}
			
			}
	
					  
							  if($wrongcode_array[$Temporary_number]=="1"){
							  
									$s2="<tr><td>".$row->title."</td>";
									
							  
							  }elseif($wrongcode_array[$Temporary_number]=="0"){
											
									$s2="<td><span class=\"label label-success\">".$row->title."</span></td>";
											
							  }elseif($wrongcode_array[$Temporary_number]=="-1"){
									
									$s2="<td><span class=\"label label-warning\">".$row->title."</span></td>";
							  
							  }
							  
				$s3="<td>".$row->script."</td><td>".$note[$Temporary_number]."</td>
							  <td><div class=\"wavclass\" id=\"wavshow-".$temp."\"></div>
						  <input type=\"hidden\" id=\"wavget-".$temp."\" value=\"".$row->voice_file."\" />"."</td>
						     </tr>";
			
				$temp++;
				
				$Stringall.=$s2.$s3;
			
			
			
			}
			endforeach;
			
			
			?>
			
			<?php
			foreach($speech2->result() as $row):
			
			if($row->part != 4){
				$script_array=explode(" ",$row->script);
			
				
				}else{
				
					$strs="";
					
					$script_array3=explode(" ",$row->script);
					
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
					
					$script_array=explode(",",$strs);
				
				
				
			}
			
			$wrongcode_array=explode(",",$row->wrongcode);
			
			$wrongcode_array2="";
			
			for($i=0;$i<count($wrongcode_array);$i++){
			
				if($i == (count($wrongcode_array)-2)){
				
				$wrongcode_array2.=$wrongcode_array[$i];
				
						}else if($i < (count($wrongcode_array)-2)){
				
				$wrongcode_array2.=$wrongcode_array[$i].",";
				}
			
			}
			
			$wrongcode_array=explode(",",$wrongcode_array2);
		
			$s10="";
			
				
			for($i=0;$i<count($script_array);$i++){
				
				 if($wrongcode_array[$i]=="1"){
							  
									$s10.=$script_array[$i]."<br>";
									
							  
							  }elseif($wrongcode_array[$i]=="0"){
											
									$s10.="<span class=\"label label-success\" title=\"不清楚\">".$script_array[$i]."</span><br>";
											
							  }elseif($wrongcode_array[$i]=="-1"){
									
									$s10.="<span class=\"label label-warning\" title=\"不正確\">".$script_array[$i]."</span><br>";
							  
						}
			
			
			}
			
				
			$note=explode(",",$row->note);
				
				$note_str="";
				for($d=0;$d<count($note);$d++){
				
				if($note[$d]!=""){
				
					$note_str.=$note[$d]."<br>";

				}
			
			}
			
			
			$Stringall2.="<tr><td>".$row->title."</td>".
			"<td>".$s10."</td>".
			"<td>".$note_str."</td>".
			"<td><div class=\"wavclass\" id=\"wavshow-".$temp."\"></div>
				<input type=\"hidden\" id=\"wavget-".$temp."\" value=\"".$row->voice_file."\" /></td></tr>"; 
			
			
			
			
			$temp++;
			
			endforeach;
			
			echo $Stringall.$Stringall2;
			
			?>
</tbody>
</table>
