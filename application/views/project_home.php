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
					<li class="active">專案管理</li>
				</ul>
			<div class="container-fluid">
				<div class="row-fluid">
				
					<div class="container-fluid">
						<div class="row-fluid">
								<div class="btn-toolbar">
									<a href="<?=base_url("/projectadmin/project_new_admin")?>"><button class="btn btn-primary" id="new_people"><i class="icon-plus"></i>新增</button></a>
								</div>
							<form action="<?=base_url("projectview_admin/project_board")?>" method="post">
								<div class="well">
									<table class="table sortable">
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">專案名稱</a></th>
												<th><a href="#">地區</a></th>
												<th><a href="#">專案管理員</a></th>
												<th><a href="#">專案起始日期</a></th>
												<th class="sorttable_nosort">檢視</th>
											</tr>
										</thead>
										<tbody>
										<?php $lunght = count($this->data);
										for($i = 0;$i<$lunght;$i++){?>
											<tr>
												<td><?php echo $i+1;?></td>
												<td><?php echo $this->data[$i]->name;?></td>
												<td><?php echo $this->data[$i]->area;?></td>
												<td><?php echo $this->data[$i]->manager;?></td>
												<td><?php echo $this->data[$i]->start_date;?></td>
												<td>
													<a href="<?=base_url("/projectview_admin/project_board")?>/project_id/<?php echo $this->data[$i]->id;?>" ><i class="icon-eye-open"></i></a>
												</td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</form>
							
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
		<script>
			public function onclik(i){
				$.cookie('project_id', i);
				$(this).closest('form').submit();
			}
		</script>
		<script type="text/javascript">
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
	</body>
</html>





