<?php session_start();?>
<div class="well" style="border: 0px;">
		<table class="sortable table">
			<thead>
					<tr>
					<th><a href="#">#</a></th>
					<th><a href="#">幼稚園</a></th>
					<th><a href="#">年級</a></th>
					<th><a href="#">班級</a></th>
					<th><a href="#">姓名</a></th>
					<th><a href="#">性別</a></th>
					<th><a href="#">生日</a></th>
					<th><a href="#">語言</a></th>
					<th><a href="#">施測者</a></th>
					<th><a href="#">狀態</a></th>
					<th class="sorttable_nosort">檢測</th>
				</tr>
				</thead>

			<tbody>
			<?php 
			 foreach($children->result() as $row): 
			 if($row->member_namee == $_SESSION["username"]){
			 ?>
				<tr>
					<td><?=$row->testing_list_id?></td>
					<td><?=$row->school_nam?></td>
					<td><?=$row->grade?></td>
					<td><?=$row->rank?></td>
					<td><?=$row->children_name?></td>
					<td><?php 
						if($row->sex==1){ 
								echo "男";
						}elseif($row->sex==2){
								echo "女";
						}
						else{
								echo "";
						}?>
					</td>
					<td><?=$row->bir?></td>
					<td><?=$row->language?></td>
					
					<td><?=$row->member_namee?></td>
					
					<td><?php if($row->check==1){echo "檢測完畢";}else{"尚未檢測";}?></td>
					<td>
							
					<?php if($row->check==0){?>
						<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>/testing_list_id/<?=$row->testing_list_id?>/member_id/<?=$member_id?>/project_id/<?=$project_id?>"><i class="icon-pencil"></i></a>
					<?php }else{ echo"評測結束";}?>
					</td>
					<?php  
					}
					endforeach;?> 	
				</tr>
			</tbody>
		</table>
	</div>