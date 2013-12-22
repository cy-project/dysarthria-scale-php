
		<thead>
			<tr>
				<th><a href="#">#</a></th>
				<th><a href="#">專案名稱</a></th>
				<th><a href="#">人數</a></th>
				<th><a href="#">地區</a></th>
				<th><a href="#">專案管理員</a></th>
				<th><a href="#">專案起始日期</a></th>
				<!--<th><a href="#">專案執行狀態</a></th>-->
				<th class="sorttable_nosort">檢視</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($project->result() as $row): 
		echo $row;?>
		<tr>
				<td><?php echo $row->id;?></td>
				<td><?=$row->project_name?></td>
				<td><?=$row->Counts?></td>
				<td><?=$row->county?><?=$row->area?></td>
				<td><?=$row->member_name?></td>
				<td><?=$row->start_date?></td>
				<!--<td>
				<?php if($row->status==0){
					echo "執行中";
				}else{
					echo "結束";
				}
				?>
				
				</td>-->
				
				<td>
					<a href="<?=base_url("/projectview_student/project_board")?>/project_id/<?=$row->id?>"><i class="icon-eye-open"></i></a>
				</td>
		</tr>
		<?php  endforeach;?> 
			
			
		</tbody>
