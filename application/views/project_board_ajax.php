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
				<?php foreach($surveying->result() as $row): ?>
					<tr>
						<td><?=$row->id?></td>
						<td><?=$row->school_name?></td>
						<td><?=$row->rank?></td>
						<td><?=$row->grade?></td>
						<td><?=$row->children_name?></td>
						<td>
						<?php 
						if($row->sex==1){ 
								echo "男";
						}elseif($row->sex==0){
								echo "女";
						}
						?>
						</td>
						<td><?=$row->bir?></td>
						<td><?=$row->language?></td>
						<td>
						<?php if($row->check==0){ echo "未施測"; }elseif($row->check){ echo "以施測";}?>
						
						</td>
						<td style="width: 10px;">
							<input type="file" name="file" />
						</td>
					</tr>
			    <?php  endforeach;?> 
				</tbody>
			</table>
		</div>