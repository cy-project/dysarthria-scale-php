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
					
					<h1 class="page-title">檢視詞彙<?php echo $name;?></h1>
				</div>
				
					<ul class="breadcrumb">
						<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
						<li><a href="<?=site_url("/projectview_student/projectview")?>">專案管理</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectview_student/project_board")?>?name=幼音評測">幼音評測</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectview_student/subjects_view_group_student")?>?name=<?php echo $name;?>">檢視類別</a> <span class="divider">/</span></li>
						<li class="active">檢視詞彙<?php echo $name;?></li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
						<div class="btn-toolbar">
							<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
								<option selected="selected">請選擇</option>
								<option>注音:ㄅ</option>
								<option>注音:ㄆ</option>
								<option>注音:ㄇ</option>
								<option>注音:ㄈ</option>
								<option>注音:ㄉ</option>
								<option>注音:ㄊ</option>
								<option>注音:ㄋ</option>
								<option>注音:ㄌ</option>
								<option>注音:ㄍ</option>
								<option>注音:ㄎ</option>
								<option>注音:ㄏ</option>
								<option>注音:ㄐ</option>
								<option>注音:ㄑ</option>
							</select>
							<a href="subjects_view.php"><button class="btn btn-primary">確認</button></a>
							<a href="#myModal" data-toggle="modal"><button class="btn btn-primary">取消</button></a>
						</div>
						<div id="myTabContent" class="tab-content">
								<div class="tab-pane active in" id="surveying_list">
									<div class="well" style="border: 0px;">
										<table class="sortable table"><!--施測名單-->
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
						<div class="well" style="border: 0px;">	
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
				var count=1;
				function OneClick() {
					document.getElementById('test').disabled = true;
					document.getElementById('new_people').disabled = false;
				}
				function OneClick1() {
					document.getElementById('test').disabled = false;
					document.getElementById('new_people').disabled = false;
				}
				function OneClick2() {
					document.getElementById('test').disabled = true;
					document.getElementById('new_people').disabled = true;
				}
				function checkall() {
					checkboxes = document.getElementsByName('selected');
					for(var i=0, n=checkboxes.length;i<=n;i++) 
					{
						if(i==n){
							count=count+1;
						}
						if((count%2)==0)
						{
							checkboxes[i].checked = false;
						}
						elseSubjects
						{
							checkboxes[i].checked = true;
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

