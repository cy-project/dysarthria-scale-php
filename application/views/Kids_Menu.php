<link rel="stylesheet" type="text/css" href="<?=base_url("/lib/bootstrap/css/bootstrap.css")?>">
<link rel="stylesheet" type="text/css" href="<?=base_url("/stylesheets/theme.css")?>">
<link rel="stylesheet" href="<?=base_url("/lib/font-awesome/css/font-awesome.css")?>">
	<table class="table sortable">	
		<thead>
			<tr> 
				<th><a href="#">#</a></th>
				<th>學生姓名</th>
				<th>性別</th>
				<th>學校</th>
				<th>年級</th>
				<th>班級</th>
				<th class="sorttable_nosort">選擇</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$length = count($this->data);
			for($aou = 0 ;$aou < $length;$aou++)
			{ ?>
			<tr>
				<td><?php echo $this->data[$aou]->id; ?></td>
				<td><?php echo $this->data[$aou]->name; ?></td>
				<td><?php if($this->data[$aou]->sex == 1)
					echo "男";else echo "女"; ?></td>
				<td><?php echo $this->data[$aou]->school_name; ?></td>
				<td><?php echo $this->data[$aou]->grade; ?></td>
				<td><?php echo $this->data[$aou]->rank; ?></td>
				<td>
						<?php if(($this->data[$aou]->rater == "") || ($this->data[$aou]->detect == ""))
						{ ?>
					<input name="Selected" type="checkbox" value="<?php echo $this->data[$aou]->id;?>"/>
									<?php 
						}
						else 
						{
							if($this->data[$aou]->select == 2){
								echo $this->data[$aou]->detect_name;?>
							<a data-toggle="modal" role="button" href="#">
							<i class="icon-remove" onclick="Delete_Select(<?php echo $this->data[$aou]->select;?>,<?php echo $aou;?>)"></i>
							</a>
								<?php
							}
							if($this->data[$aou]->select == 1){
								echo $this->data[$aou]->rater_name;?>
							<a data-toggle="modal" role="button" href="#">
							<i class="icon-remove" onclick="Delete_Select(<?php echo $this->data[$aou]->select;?>,<?php echo $aou;?>)"></i>
							</a>
								<?php
							}
						}
						?>
				</td>
			</tr>
<?php } ?>
		</tbody>
	</table>
	<script>
		var test1;
		var test2;
		function Delete_Select(fun, count){
			test1 =<?php print_r($this->data);?>
			alert(test1);
		}
	</script>