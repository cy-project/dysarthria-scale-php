	<!DOCTYPE html>
	<html lang="en">
		<?php
			include "head.php";
		?> 
		<body> 
			<?php
				include "navbar.php";
				include "sidebar-nav.php";
			?>
		
			<div class="content">
				
				<div class="header">
					
					<h1 class="page-title">修改人員</h1>
				</div>
				
					<ul class="breadcrumb">
						<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectadmin/project_home")?>">專案管理</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectview_admin/project_board")?>/project_id/<?php echo $this->dato['project_id'];?>"><?php echo $project_name[0]->name;?></a> <span class="divider">/</span></li>
						<li class="active">修改人員</li>
					</ul>
				<div class="container-fluid">
					<div class="row-fluid">
						<form id="tab" action="" method="post" name="dbform">
							<div class="btn-toolbar">
								<button class="btn btn-primary" type="button" onclick="testnull(1)"><i class="icon-save"></i>修改</button>
								<button class="btn btn-primary" onclick="testnull(2)">取消</button>
							</div>
							<div class="well">
							<?php 
							foreach($this->data->result() as $row):?>
								<label>姓名</label>
								<input type="text" name="subjects_name" id="subjects_name" value=<?=$row->name;?> class="input-xlarge">
								<label>性別</label>
								<select name="subjects_sex" name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
									<option selected="selected" value="2">請選擇</option>
									<option value="0">女</option>
									<option value="1">男</option>
								</select>
								<label>出生年月日(西元yyyy/mm/dd)</label>
								<?php
									if($row->bir == null){?>
									<input type="text" name="subjects_birth" value=" "class="input-xlarge">
									<?php }else{?>
									<input type="text" name="subjects_birth" value=<?=$row->bir;?> class="input-xlarge">
									<?php }?>
								
								<label>所在縣市</label>
								<?php
									if($row->county == null){?>
									<input type="text" name="subjects_counties" value=" "class="input-xlarge">
									<?php }else{?>
									<input type="text" name="subjects_counties" value=<?=$row->county;?> class="input-xlarge">
									<?php }?>
								<label>學校</label>
								<input type="text" name="subjects_school" value=" " class="input-xlarge">
								<label>年級</label>
								<?php
									if($row->grade == null){?>
									<input type="text" name="subjects_grade" value=" "class="input-xlarge">
									<?php }else{?>
									<input type="text" name="subjects_grade" value=" <?=$row->grade;?>" class="input-xlarge">
									<?php }?>
								<label>班級</label>
								<?php
									if($row->rank == null){?>
									<input type="text" name="subjects_class" value=" "class="input-xlarge">
									<?php }else{?>
									<input type="text" name="subjects_class" value=<?=$row->rank;?> class="input-xlarge">
									<?php }?>
								<label>常用語言</label>
								<select name="subjects_language" id="DropDownTimezone" class="input-xlarge">
									<option selected="selecte" value="0">請選擇</option>
									<option value="國語">國語</option>
									<option value="台語">台語</option>
									<option value="英語">英語</option>
								</select>
							</div>
							 <?php  
								endforeach;?> 
						</form>

						<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3 id="myModalLabel">Delete Confirmation</h3>
							</div>
							<div class="modal-body">
								<p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
							</div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
								<button class="btn btn-danger" data-dismiss="modal">Delete</button>
							</div>
						</div>


							
						<footer>
							<hr>
							<!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
							<p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
							<p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
						</footer>
							
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function testnull(v)
				{
					if(v==2)
					document.dbform.action="<?=base_url("/projectview_admin/project_board")?>/project_id/<?php echo $this->dato['project_id'];?>"; 
					else if (v==1){
						if (document.getElementById('subjects_name').value=='')
						{
							alert('null');
							document.getElementById('subjects_name').focus();
						}else if(document.getElementById('subjects_name').value!=''){
							document.dbform.action="<?=base_url("/projectview_admin/modification_data_child")?>/project_id/<?php echo $this->dato['project_id'];?>/child_id/<?php echo $this->dato['child_id']?>"; 
							$('#tab').closest('form').submit();
						}
					}
					
				} 
			</script>
			<script src="lib/bootstrap/js/bootstrap.js"></script>
			<script type="text/javascript">
				$("[rel=tooltip]").tooltip();
				$(function() {
					$('.demo-cancel-click').click(function(){return false;});
				});
			</script>
		</body>
	</html>


