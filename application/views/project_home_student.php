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
									<div class="well">
										<table id="projectview" class="table sortable">
											<!-- ajax -->
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
								<!--div class="modal-body">
									<p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
								</div>
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
									<button class="btn btn-danger" data-dismiss="modal">Delete</button>
								</div-->
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
			<script type="text/javascript">
				$().ready(function(){
				//初始化載入 
						project_views_ajax();
				});

		function project_views_ajax(){ // ajax 傳值

					$.ajax({
						  url: '<?php echo base_url();?>projectview_student/project_home_ajax',
						  type: 'POST',
						   dataType:'html', 
						  error: function(xhr, ajaxOptions, thrownError) {
							alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
							//$('#ReturnViews').html(xhr.responseText);
						  },
						  success: function(response) {
						  
							  sorttables();
							 
							  $('#projectview').html(response);
							
						  }
					});
			}
		</script>
	</body>
</html>



