<table class="sortable table">
			  <thead>
					<tr>
				  <td>專案名稱</td>
				  <td>評測者姓名</td>
				  <td>評測時間</td>
				  <td>幼兒園</td>
				  <td>年級</td>
				  <td>班級</td>
				  <td>幼兒名字</td>
				  <td>性別</td>
				  <td>幼兒語言</td>
				  <td>主題</td>
				  <td>題目</td>
				  <td>檢測分數</td>
				  <td>檢測錯誤碼</td>
				  <td>檢測狀態</td>
				  <td>追蹤狀態</td>
				  <td>重測按鈕</td>
					</tr>
			  </thead>
			 
			  <tbody> 
			  <?php foreach($track->result() as $row): ?>
				<tr>
				  <td><?=$row->project_name?></td>
				  <td><?=$row->member_name?></td>
				  <td><?=$row->date?></td>
				  <td><?=$row->school_name?></td>
				  <td><?=$row->rank?></td>
				  <td><?=$row->grade?></td>
				  <td><?=$row->children_name?></td>
				  <td><?=$row->sex?></td>
				  <td><?=$row->language?></td>
				  <td><?=$row->part_name?></td>
				  <?php if($row->part==1){?> 
				  <td><?=$row->title?></td>
				  <?php }else{?>
				  <td><?=$row->script?></td>
				  <?php } ?>
				  
				  <td><?=$row->judgment_result?></td>
				  <td><?=$row->judgment_wrongcode?></td>
				  <?php if($row->istrace==0){?> 
				  <td>未通過</td>
				  <?php }else{?>
				  <td>通過</td>
				  <?php } ?>
				  <?php if($row->check==0){?> 
				  <td>未矯正</td>
				  <?php }else{?>
				  <td>通過矯正</td>
				  <?php } ?>
				  <td>
				  <a  href="#" id="Score_submit" onclick="javascript:js_track_click('<?=$row->judgment_id?>','<?=$row->check?>');">確定</a>
				  </td>
				</tr>
				
				 <?php  endforeach;?>
			  </tbody>
		</table>	