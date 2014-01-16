		<div class="well" style="border: 0px;">
			<table class="sortable table"><!--施測名單-->
				<thead>
					<tr>
						<th><a href="#">#</a></th>
						<th><a href="#">幼稚園</a></th>
						<th><a href="#">年級</a></th>
						<th><a href="#">班級</a></th>
						<th><a href="#">姓名</a></th>
						<th><a href="#">性別</a></th>
						<th><a href="#">生日</a></th>
						<th><a href="#">主要語言</a></th>
						<th><a href="#">狀態</a></th>
						<th><a href="#">上傳音檔</a></th>
					</tr>
				</thead>
				<tbody>
				<?php  
				$i=0;
				foreach($surveying->result() as $row):?>
					<tr>
						<td><?=$row->id?></td>
						<td><?=$row->school_name?></td>
						<td><?=$row->grade?></td>
						<td><?=$row->rank?></td>
						<td><?=$row->children_name?></td>
						<td>
						<?php 
						if($row->sex==1){ 
								echo "男";
						}else if($row->sex==0){
								echo "女";
						}else{
								echo "";
						}?>
						</td>
						<td><?=$row->bir?></td>
						<td><?=$row->language?></td>
						<td>
						<?php if($row->check==0){ echo "未施測"; }elseif($row->check == 1){ echo "已施測";}?>
						
						</td>
						<td>
							<?php if($row->check == 0){?> 
								<a href="<?=base_url("/projectview_student/project_upload")?>/project_id/<?=$project_id?>/testing_id/<?=$row->id?>/childrcn_id/<?=$row->id?>"><?=$uploadshow[$i]?></a>

							<?php }elseif($row->check == 1){
								echo "   ";
							}?>
							
						</td>
					</tr>
			    <?php  
				$i++;
				endforeach;?> 
				</tbody>
			</table>
		</div>