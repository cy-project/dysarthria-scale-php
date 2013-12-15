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
				<h1 class="page-title">幼音評測</h1>
			</div>
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li><a href="<?=base_url("/projectview_student/projectview")?>">專案管理</a> <span class="divider">/</span></li>
				<li class="active"><?php echo $name;?></li>
			</ul>
			<!-------------------------------------------------------------------------------底線------------------------------------------------------------------------->
			<div class="container-fluid">
			<!-------------------------------------------------------------------------------內容------------------------------------------------------------------------->
				<div class="row-fluid">
					<form >
					<div class="btn-toolbar">
						<a><button class="btn btn-primary" id="transfer_files"><i class="icon-plus"></i>上傳音檔</button></a>
					</div>
					<div class="well" >
						<ul class="nav nav-tabs" style="margin-bottom: 0px;">
							<li class="active" name="board"><a id="surveying" href="#surveying_list" data-toggle="tab" onclick="OneClick(1)">施測名單</a></li>
							<li name="board" ><a id="evaluation" href="#evaluation_list" data-toggle="tab" onclick="OneClick(2)">評測名單</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
								<div class="tab-pane active in" id="surveying_list"><!--施測名單-->
									<div class="well" style="border: 0px;">
										<table class="sortable table">
											<thead>
												<tr>
													<th><a href="#">#</a></th>
													<th><a href="#">幼稚園</a></th>
													<th><a href="#">班級</a></th>
													<th><a href="#">年級</a></th>
													<th><a href="#">姓名</a></th>
													<th><a href="#">姓別</a></th>
													<th><a href="#">生日</a></th>
													<th><a href="#">主要語言</a></th>
													<th><a href="#">狀態</a></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>王小明</td>
													<td>7</td>
													<td>向日葵班</td>
													<td>大班</td>
													<td>已施測</td>
												</tr>
												<tr>
													<td>2</td>
													<td>李小刀</td>
													<td>6</td>
													<td>向日葵班</td>
													<td>中班</td>
													<td>未施測</td>
												</tr>
													<tr>
													<td>3</td>
													<td>馬小九</td>
													<td>6</td>
													<td>向日葵班</td>
													<td>中班</td>
													<td>已施測</td>
												</tr>
												<tr>
													<td>4</td>
													<td>周小倫</td>
													<td>7</td>
													<td>向日葵班</td>
													<td>大班</td>
													<td>已施測</td>
												</tr>
												<tr>
													<td>5</td>
													<td>張大三</td>
													<td>5</td>
													<td>向日葵班</td>
													<td>中班</td>
													<td>未施測</td>
												</tr>
												<tr>
													<td>6</td>
													<td>李大仁</td>
													<td>8</td>
													<td>向日葵班</td>
													<td>大班</td>
													<td>已施測</td>
												</tr>
												<tr>
													<td>7</td>
													<td>王小明</td>
													<td>7</td>
													<td>向日葵班</td>
													<td>大班</td>
													<td>未施測</td>
												</tr>
												<tr>
													<td>8</td>
													<td>李小刀</td>
													<td>6</td>
													<td>向日葵班</td>
													<td>中班</td>
													<td>未施測</td>
												</tr>
												<tr>
													<td>9</td>
													<td>馬小九</td>
													<td>6</td>
													<td>向日葵班</td>
													<td>中班</td>
													<td>已施測</td>
												</tr>
												<tr>
													<td>10</td>
													<td>周小倫</td>
													<td>7</td>
													<td>向日葵班</td>
													<td>大班</td>
													<td>未施測</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
									<div class="tab-pane fade" id="evaluation_list"><!--評測名單-->
										<div class="well" style="border: 0px;">
											<table class="sortable table">
												<thead>
														<tr>
														<th><a href="#">#</a></th>
														<th><a href="#">幼稚園</a></th>
														<th><a href="#">班級</a></th>
														<th><a href="#">年級</a></th>
														<th><a href="#">姓名</a></th>
														<th><a href="#">姓別</a></th>
														<th><a href="#">生日</a></th>
														<th><a href="#">主要語言</a></th>
														<th><a href="#">狀態</a></th>
														<th class="sorttable_nosort">檢測</th>
													</tr>
													</thead>

												<tbody>
													<tr>
														<td>1</td>
														<td>014</td>
														<td>7</td>
														<td>向日葵班</td>
														<td>大班</td>
														<td>已評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=014&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>084</td>
														<td>8</td>
														<td>向日葵班</td>
														<td>大班</td>
														<td>未評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=084&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>024</td>
														<td>5</td>
														<td>向日葵班</td>
														<td>中班</td>
														<td>已評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=024&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>4</td>
														<td>094</td>
														<td>7</td>
														<td>向日葵班</td>
														<td>大班</td>
														<td>未評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=094&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>5</td>
														<td>074</td>
														<td>5</td>
														<td>向日葵班</td>
														<td>中班</td>
														<td>已評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=074&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>6</td>
														<td>064</td>
														<td>7</td>
														<td>向日葵班</td>
														<td>大班</td>
														<td>已評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=064&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>7</td>
														<td>044</td>
														<td>5</td>
														<td>向日葵班</td>
														<td>中班</td>
														<td>未評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=044&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>8</td>
														<td>034</td>
														<td>6</td>
														<td>向日葵班</td>
														<td>中班</td>
														<td>未評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=034&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>9</td>
														<td>016</td>
														<td>8</td>
														<td>向日葵班</td>
														<td>大班</td>
														<td>已評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=016&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
													<tr>
														<td>10</td>
														<td>024</td>
														<td>6</td>
														<td>向日葵班</td>
														<td>中班</td>
														<td>已評測</td>
														<td>
															<a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=024&category=評測"><i class="icon-pencil"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</form>
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
			var count=1;
			function ButtonClick(i){
				var con=$.cookie("name");
				
				var URLs='<?=base_url("/projectview_admin/new_picking")?>';
				
				if($.cookie("name")==null){
					con=1;
					$.cookie("name", con);
				}
				else{
					con=$.cookie("name");
				}
				$.ajax({
					url: URLs,
					data: {'number_button':i,'number_page':con},
					type:"POST",
					dataType:'text',
					success: function(msg){
						document.location.href='<?=base_url("/projectview_admin/")?>'+msg;
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert(xhr.status);
						alert(thrownError);
					}
				});
			}
			function OneClick(i) {	
				$.cookie('name', i);
			}
		</script>
		<script>
				$( "#surveying" ).click(function() {
					$( "#transfer_files" ).show();
				});
				$( "#evaluation" ).click(function() {
					$( "#transfer_files:last-child" ).hide();
				});
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


