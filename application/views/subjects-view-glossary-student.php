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
					
					<h1 class="page-title">檢視<?=$name?></h1>
				</div>
				
					<ul class="breadcrumb">
						<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectview_student/projectview")?>">專案管理</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectview_student/project_board")?>/project_id/<?=$project_id?>">幼音評測</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectview_student/subjects_view_group_student")?>/testing_list_id/<?=$testing_list_id?>/member_id/<?=$member_id?>/project_id/<?=$project_id?>">檢視類別</a> <span class="divider">/</span></li>
						<li class="active">檢視<?=$name?></li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
						
						<div id="myTabContent" >
								<div class="tab-pane active in" id="surveying_list">
								
								<!-- ajax -->
									
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
			
			<script type="text/javascript">
				$().ready(function(){//初始化載入

						fancybox_start();

						topics_ajax();
				});
				
				function fancybox_start(){

					$(".various").fancybox({
						maxWidth	: 700,
						maxHeight	: 354,
						fitToView	: false,
						width		: '70%',
						height		: '100%',
						autoSize	: false,
						closeClick	: false,
						openEffect	: 'none',
						closeEffect	: 'none'
						});

				}
				
				
				function topics_ajax(){
					
					$.ajax({
							  url: '<?php echo base_url();?>score/score_views_topics_ajax/testing_list_id/<?=$testing_list_id?>/part_id/<?=$part_id?>/member_id/<?=$member_id?>/project_id/<?=$project_id?>',
							  type: 'POST',
							  beforeSend:function(){
									$('#loadingIMG').show();
								},
							  complete:function(){
									$('#loadingIMG').hide();
								},			  
							  error: function(xhr, ajaxOptions, thrownError) {
								alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
								//$('#ReturnViews').html(xhr.responseText);
							  },
							  success: function(response) {
							  sorttables();
							  $('#surveying_list').html(response);
							  
							  }
						});

				}

				function Track_submit(i){ //按鈕驅動


				judgment_ajax(i);
					
				}

				function judgment_ajax(t){ // ajax 傳值

						$.ajax({
							  url: '<?php echo base_url();?>score/score_judgment_up',
							  type: 'POST',
								data: {
								judgment_id:t
							  }, 
							  error: function(xhr, ajaxOptions, thrownError) {
								alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
								//$('#ReturnViews').html(xhr.responseText);
							  },
							  success: function(response) {
							  //$('#ReturnViews').html(response);
							  
								  if(response=="yes"){
										topics_ajax();
										alertify.alert('更新成功');  
								  }

							  }
						});
						
						
				}
								
				
				
				$("[rel=tooltip]").tooltip();
				$(function() {
					$('.demo-cancel-click').click(function(){return false;});
				});
			</script>
		</body>
	</html>


