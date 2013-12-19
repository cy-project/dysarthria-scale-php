	
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
				
				<h1 class="page-title">專案管理</h1>
			</div>
			
				<ul class="breadcrumb">
					<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
					<li><a href="<?=base_url("/projectview_student/projectview")?>">專案管理</a> <span class="divider">/</span> 專案管理 <span class="divider">/</span></li>
					<li class="active">上傳</li>
				</ul>

			<div class="container-fluid">
				<div class="row-fluid">
				
					<div class="container-fluid">
						<?php
						if(isset($error)){
							echo $error;
						} ?>
						<?php 
						if(isset($upload_data)){ 
							?>
							<?php echo $upload_data['full_path'];?>
						<?php 
						} else { ?>
							<?php echo form_open_multipart('projectview_student/do_upload');?>

							<input type="file" name="userfile" style="width: 150px" />
							<input type="submit" value="上傳" />
							
							</form>
						<?php } ?>
						<div class="row-fluid">
								<div class="well">
									<table id="projectview" class="table sortable">
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">檔案名稱</a></th>
												<th><a href="#">等等</a></th>
												<th><a href="#">等等</a></th>
												<th><a href="#">等等</a></th>
												<th><a href="#">等等</a></th>
												<!--<th><a href="#">專案執行狀態</a></th>-->
												<th class="sorttable_nosort">勾選</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($project->result() as $row): ?>
										<tr>
												<td><?=$row->id?></td>
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
													
												</td>
										</tr>
										<?php  endforeach;?> 
											
										</tbody>
									</table>
								</div>
							
							<div class="pagination">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
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
			</div>
		</div>
	</body>
</html>


