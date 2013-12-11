<div id="css_table">
		
			  <div class="css_tr">
				  <div class="css_td">專案名稱</div>
				  <div class="css_td">檢測者姓名</div>
				  <div class="css_td">檢測時間</div>
				  <div class="css_td">幼兒園</div>
				  <div class="css_td">年級</div>
				  <div class="css_td">班級</div>
				  <div class="css_td">幼兒名字</div>
				  <div class="css_td">性別</div>
				  <div class="css_td">幼兒語言</div>
				  <div class="css_td">主題</div>
				  <div class="css_td">題目</div>
				  <div class="css_td">檢測分數</div>
				  <div class="css_td">檢測錯誤碼</div>
				  <div class="css_td">檢測狀態</div>
				  <div class="css_td">追蹤狀態</div>
				  <div class="css_td">重測按鈕</div>
				    
			  </div>
				<?php foreach($track->result() as $row): ?>
				
			  <div class="css_tr">
				  <div class="css_td"><?=$row->project_name?></div>
				  <div class="css_td"><?=$row->member_name?></div>
				  <div class="css_td"><?=$row->date?></div>
				  <div class="css_td"><?=$row->school_name?></div>
				  <div class="css_td"><?=$row->rank?></div>
				  <div class="css_td"><?=$row->grade?></div>
				  <div class="css_td"><?=$row->children_name?></div>
				  <div class="css_td"><?=$row->sex?></div>
				  <div class="css_td"><?=$row->language?></div>
				  <div class="css_td"><?=$row->part_name?></div>
				  <?php if($row->part==1){?> 
				  <div class="css_td"><?=$row->title?></div>
				  <?php }else{?>
				  <div class="css_td"><?=$row->script?></div>
				  <?php } ?>
				  
				  <div class="css_td"><?=$row->judgment_result?></div>
				  <div class="css_td"><?=$row->judgment_wrongcode?></div>
				  <?php if($row->istrace==0){?> 
				  <div class="css_td">未通過</div>
				  <?php }else{?>
				  <div class="css_td">通過</div>
				  <?php } ?>
				  <?php if($row->check==0){?> 
				  <div class="css_td">未矯正</div>
				  <?php }else{?>
				  <div class="css_td">通過矯正</div>
				  <?php } ?>
				  <div class="css_td"><a  href="#" id="Score_submit" onclick="javascript:js_track_click('<?=$row->judgment_id?>','<?=$row->check?>');">確定</a></p></div>
			  </div>
		  <?php  endforeach;?>
		</div>