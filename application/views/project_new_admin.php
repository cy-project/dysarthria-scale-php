	<!DOCTYPE html>
	<html lang="en">
		<?php
			include "head.php";
		?> 
		<body> 
			<?
				include "navbar.php";
				include "sidebar-nav.php";
			?>
			<div class="content">
				
				<div class="header">
					
					<h1 class="page-title">專案管理</h1>
				</div>
				
					<ul class="breadcrumb">
						<li><a href="<?=base_url()?>">首頁</a> <span class="divider">/</span></li>
						<li><a href="<?=site_url("/Projectadmin/project")?>">專案管理</a> <span class="divider">/</span></li>
						<li class="active">專案新增</li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
					
						<div class="container-fluid">
						<div class="row-fluid">
							<form action="http://localhost/dysarthria-scale-php/index.php/projectview_admin" method="post">
								<div class="btn-toolbar">
									<button class="btn btn-primary" id="new_people" onclick="$(this).closest('form').submit()"><i class="icon-plus"></i>建立</button>
								</div>
								<div class="well">
									<ul class="nav nav-tabs" style="margin-bottom: 0px;">
										<li class="active"><a data-toggle="tab">專案資料</a></li>
									</ul>
									<div class="tab-pane active in" id="chit">
										<div class="well" style="border: 0px;">
											<label>名稱</label>
											<input type="text" value="" class="input-xlarge">
											<label>地區</label>
											<input type="text" value="" class="input-xlarge">
											<label>所在縣市</label>
											<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
												<option selected="selected">請選擇</option>
												<option>高雄市</option>
												<option>台中市</option>
											</select>
											<label>所在區</label>
											<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
												<option selected="selected">請選擇</option>
												<option>楠梓區</option>
												<option>左營區</option>
											</select>
										</div>
									</div>
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
				$("[rel=tooltip]").tooltip();
				$(function() {
					$('.demo-cancel-click').click(function(){return false;});
				});
			</script>
		</body>
	</html>


