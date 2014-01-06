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
		<!-------------------------------------------------------------------------------路徑------------------------------------------------------------------------->
			<div class="header">
				<h1 class="page-title">專案管理</h1>
			</div>
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li><a href="<?=base_url("/projectview_student/projectview")?>">專案管理</a> <span class="divider">/<?php echo $name[0]->name;?></span></li>
				<li class="active"></li>
			</ul>
			<!-------------------------------------------------------------------------------底線------------------------------------------------------------------------->
			<div class="container-fluid">
			<!-------------------------------------------------------------------------------內容------------------------------------------------------------------------->
				<div class="row-fluid">
					<div class="well" >
						<ul class="nav nav-tabs" style="margin-bottom: 0px;">
							<li class="active" name="board"><a id="surveying" href="#surveying_list" data-toggle="tab" onclick="OneClick(1)">施測名單</a></li>
							<li name="board" ><a id="evaluation" href="#evaluation_list" data-toggle="tab" onclick="OneClick(2)">評測名單</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
								<div class="tab-pane active in" id="surveying_list"><!--施測名單-->
									<!-- ajax -->
								</div>
									<div class="tab-pane fade" id="evaluation_list"><!--評測名單-->
										<!-- ajax -->
									</div>
								
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
					</div>
					<!-------------------------------------------------------------------------------底線------------------------------------------------------------------------->
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
			
			
			$().ready(function(){
				//初始化載入

						sorttables();
						project_board_ajax(1);
				});

			function project_board_ajax(f){ // ajax 傳值

					if(f==1){
			
					var divurl="<?php echo base_url();?>projectview_student/project_board_ajax/project_id/<?=$project_id?>/member_id/<?=$_SESSION["id"]?>";
					var divval='#surveying_list';
			
				}else if(f==2){
				
					var divurl="<?php echo base_url();?>score/score_views_children/project_id/<?=$project_id?>/member_id/<?=$_SESSION["id"]?>";	
					var divval='#evaluation_list';
					
			}
			$.ajax({
				  url: divurl,
				  type: 'POST',
				   dataType:'html', 
				  error: function(xhr, ajaxOptions, thrownError) {
					alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
					//$('#ReturnViews').html(xhr.responseText);
				  },
				  success: function(response) {
				  
					  sorttables();
					  $(divval).html(response);
					
				  }
			});

				 
			}
			
			function OneClick(i) {	
				$.cookie('name', i);
				project_board_ajax(i);
			}
	
			$( "#surveying" ).click(function() {
				$( "#transfer_files" ).show();
			});
			
			$( "#evaluation" ).click(function() {
				$( "#transfer_files:last-child" ).hide();
			});
			
		
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
	</body>
</html>


