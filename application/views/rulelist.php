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
				
				<h1 class="page-title">規則清單</h1>
			</div>
			
				<ul class="breadcrumb">
					<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
					<li class="active">規則清單</li>
				</ul>

			<div class="container-fluid">
				<div class="row-fluid">
				
					<div class="container-fluid">
						<div class="row-fluid">
								<!--<div class="btn-toolbar">
									<a href="#"><button class="btn btn-primary" id="new_people"><i class="icon-plus"></i>新增</button></a>
								</div>-->
							<form action="#" method="post">
								<div class="well">

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
		<script type="text/javascript">
			
			$().ready(function(){
			//初始化載入

					
					rules_views_ajax();
			});

			function rules_views_ajax(){ // ajax 傳值

					$.ajax({
						  url: '<?php echo base_url();?>rules/rules_views_ajax',
						  type: 'POST',
						   dataType:'html', 
						  error: function(xhr, ajaxOptions, thrownError) {
							alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
							//$('#ReturnViews').html(xhr.responseText);
						  },
						  success: function(response) {
								 sorttables();
							  $('.well').html(response);
						  }
					});
				
				
			}

			function result_up_ajax(i){

			$.ajax({
						  url: '<?php echo base_url();?>rules/rules_views_up',
						  type: 'POST',
							data: {
							rules_id:i,
							weight:$('#weight_'+i).val()
						  },
						  error: function(xhr, ajaxOptions, thrownError) {
							alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
							
						  },
						  success: function(response) {

							if(response=="yes"){
				

									rules_views_ajax();
									
							  }
						   
						  }
					});

			}

			function result_up(i){ //按鈕驅動


				alertify.confirm('您確定評分已完成?(如按下請"確定"，則後續無法變更)', function (e) {
				  if (e) {
				    alertify.log('確定，資料已送出！！');
					result_up_ajax(i);
				  } else {
				    alertify.error('取消');
				  }
				});


			}
			
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
	</body>
</html>


