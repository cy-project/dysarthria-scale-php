

 <script src="<?=base_url("/js/sorttable.js")?>" type="text/javascript"></script>

<div class="well" style="border: 0px;">
	<table class="sortable table">
		<thead>
			<tr>
				<th><a href="#">#</a></th>
				<th><a href="#">學生姓名</a></th>
				<th><a href="#">年齡</a></th>
				<th><a href="#">年級</a></th>
				<th><a href="#">班級</a></th>
				<th><a href="#">狀況</a></th>
				<th><a href="#">施測者</a></th>
				<th class="sorttable_nosort">編輯</th>
				<th class="sorttable_nosort">檢視</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$length = count($this->data);
			for($fix = 0;$fix < $length; $fix++)
			{
		?>
				<tr>
					<td id="number_sybjects_<?php echo $fix+1;?>" > <?php echo $this->data[$fix]->id;?> </td>
					<td id="name_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->name;?></td>
					<td id="age_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->age;?></td>
					<td id="class_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->grade;?></td>
					<td id="classname_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->rank;?></td>
					<td id="fraction_dybjects_<?php echo $fix+1;?>"><?php
						if($this->data[$fix]->rank == 0)
							echo "未施測";
							elseif($this->data[$fix]->rank == 1)
							echo "已施測";?>
					</td>
					<td id="rater_dybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->rater;?></td>
					<td>
						<a href="<?=base_url("/projectview_admin/subjects_new_data")?>/project_id/<?php echo $project_id;?>/child_id/<?php echo $this->data[$fix]->id;?>"><i class="icon-pencil"></i></a>
					</td>
					<td>
					<a href="<?=base_url("/projectview_admin/subjects_view_group")?>/project_id/<?php echo $project_id;?>/child_id/<?php echo $this->data[$fix]->id;?>"><i class="icon-eye-open"></i></a>
				</td>
			</tr>
		<?php	}?>
												
		</tbody>
	</table>
</div>
<script>
	function checkall() {
				checkboxes = document.getElementsByName('selected');
				for(var i=0, n=checkboxes.length;i<=n;i++) 
				{
					if(i==n){
						count=count+1;
					}
					if((count%2)==0)
					{
						checkboxes[i].checked = false;
					}
					else
					{
						checkboxes[i].checked = true;
					}
					
				}
			}
</script>