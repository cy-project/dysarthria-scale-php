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
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a></li>
			</ul>
			<div class="container-fluid">
			<?php 
				if($_SESSION["status"] == 3) { 
			?>
				<div class="row-fluid">
					<div class="block">
						<p class="block-heading">人員統計</p>
						<div id="page-stats" class="block-body collapse in">

							<div class="stat-widget-container">
								<div class="stat-widget">
									<div class="stat-button">
										<p class="detail">受測者</p>
										<p class="title">2,500(+10)</p>
									</div>
								</div>

								<div class="stat-widget">
									<div class="stat-button">
										<p class="detail">完成率</p>
										<p class="title">80%</p>                        
									</div>
								</div>

								<div class="stat-widget">
									<div class="stat-button">
										<p class="detail">追蹤人數</p>
										<p class="title">1,500(+10)</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
				else {

				}

				if($_SESSION["status"] == 1 || $_SESSION["status"] == 3) { 
			?>
				<div class="row-fluid">
					<div class="block span6">
						<p class="block-heading">專案管理</p>
						<div class="block-body">
							<table id="projectview" class="table">
								<!-- ajax -->
							</table>
						</div>
					</div>
					
					<div class="block span6">
						<p class="block-heading">最新消息(測試中)<?php if($_SESSION["status"] == 3) { ?> <a href="<?=base_url("/dysarthria/news")?>" class="disnon"><span class="label label-important">發布消息</span><?php } ?></a></p>
						<div id="tablewidget" class="block-body collapse in">
							<table class="table">
							  <thead>
								<tr>
								  <th style="width: 50px;">日期</th>
								  <th>對象</th>
								  <th>標題</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td>2013/09/04</td>
								  <td><span class="label label-warning">全部</span></td>
								  <td>語言治療師研討會</td>
								</tr>
								<tr>
								  <td>2013/09/03</td>
								  <td><span class="label label-info">語言治療師</span></td>
								  <td>會議準備</td>
								</tr>
								<tr>
								  <td>2013/09/02</td>
								  <td><span class="label label-success">教師</span></td>
								  <td>彙整人數</td>
							   </tr>
								 <tr>
								  <td>2013/09/01</td>
								  <td><span class="label label-inverse">大學生</span></td>
								  <td>檔案上傳</td>
								</tr>
								<tr>
								  <td>2013/08/31</td>
								  <td><span class="label label-success">教師</span> <span class="label">其他</span></td>
								  <td>課程報名</td>
								</tr>
							  </tbody>
							</table>
							<p><a href="#">More...</a></p>
						</div>
					</div>
				</div>
				<?php
					if($_SESSION["status"] == 3) {
				?>
				<div class="row-fluid">
					<div class="block span6">
						<p class="block-heading">權限申請狀況</p>
						<div id="tablewidget" class="block-body collapse in">
							<table class="table">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>姓名</th>
								  <th>申請身分</th>
								  <th>帳號</th>
								  <th>備註</th>
								  <th style="width: 35px;">審核</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td>1</td>
								  <td>Mark</td>
								  <td>大學生</td>
								  <td>the_mark7</td>
								  <td>STU學生</td>
								  <td>
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
									  <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
								  </td>
								</tr>
								<tr>
								  <td>2</td>
								  <td>Ashley</td>
								  <td>教師</td>
								  <td>ash11927</td>
								  <td>桃園OO幼兒園教師</td>
								  <td>
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
									  <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
								  </td>
								</tr>
							  </tbody>
							</table>
						</div>
					</div>
					
					<div class="block span6">
						<p class="block-heading">追蹤狀況</p>
						<div id="widget2container" class="block-body collapse in">
							<table class="table">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>案例編號</th>
								  <th>學生姓名</th>
								  <th>評分狀況</th>
								  <th>學校</th>
								  <th>追蹤</th>
								  <th style="width: 45px;"></th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td>1</td>
								  <td>010</td>
								  <td>王小明</td>
								  <td>60%</td>
								  <td>OO幼兒園</td>
								  <td><a href="track.html">追蹤狀況</a></td>
								  <td>
									  <a href="user.html"><i class="icon-pencil"></i></a>
									  <a href="project-data-result.html"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
							  </tbody>
							</table>
						</div>
					</div>
				</div>		
				<?php
						}
					}
					else{
				?>
					<p>您沒有任何權限，請至專案管理申請！</p>
				<?php
					}
				?>
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
		
		$("[rel=tooltip]").tooltip();
		$(function() {
			$('.demo-cancel-click').click(function(){return false;});
		});
	</script>    
  </body>
</html>


