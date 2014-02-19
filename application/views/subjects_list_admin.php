

 <script src="<?=base_url("/js/sorttable.js")?>" type="text/javascript"></script>

<div class="well" style="border: 0px;">
	<table class="sortable table">
		<thead>
			<tr>
				<th><a href="#">#</a></th>
				<th><a href="#">學生姓名</a></th>
				<th><a href="#">性別</a></th>
				<th><a href="#">生日</a></th>
				<th><a href="#">年齡</a></th>
				<th><a href="#">年級</a></th>
				<th><a href="#">班級</a></th>
				<th><a href="#">常用語言</a></th>
				<th><a href="#">施測狀況</a></th>
				<th><a href="#">檢測狀況</a></th>
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
			if($fix != $length-1){
		?>
				<tr>
					<td id="number_sybjects_<?php echo $fix+1;?>" > <?php echo $this->data[$fix]->id;?> </td>
					<td id="name_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->name;?></td>
					<td id="sex_sybjects_<?php echo $fix+1;?>">
						<?php if ($this->data[$fix]->sex == 1) {
								echo "男";
							  }
							  else {
								echo "女";
							  }
						?>
					</td>
					<td id="bir_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->bir;?></td>
					<td id="age_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->age;?></td>
					<td id="class_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->grade;?></td>
					<td id="classname_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->rank;?></td>
					<td id="language_sybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->language;?></td>
					<td id="fraction_dybjects_<?php echo $fix+1;?>"><?php
						if($this->data[$fix]->isupload == 0)
							echo "未施測";
						else if($this->data[$fix]->isupload == 1)
							echo "已施測";?>
					</td>
					<td id="check_sybjects_<?php echo $fix+1;?>">
						<?php if ($this->data[$fix]->check == 1) {
								echo "已檢測";
							  }
							  else {
								echo "未檢測";
							  }
						?>
					</td>
					<td id="rater_dybjects_<?php echo $fix+1;?>"><?php echo $this->data[$fix]->rater;?></td>
					<td>
						<a href="<?=base_url("/projectview_admin/subjects_new_data")?>/project_id/<?php echo $project_id;?>/child_id/<?php echo $this->data[$fix]->id;?>"><i class="icon-pencil"></i></a>
					</td>
					<td>
					<a href="<?=base_url("/projectview_admin/subjects_view_group")?>/project_id/<?php echo $project_id;?>/child_id/<?php echo $this->data[$fix]->id;?>"><i class="icon-eye-open"></i></a>
				</td>
			</tr>
		<?php	}}?>
												
		</tbody>
	</table>
</div>