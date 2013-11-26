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
						<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
						<li><a href="<?=site_url("/projectadmin/project_home")?>">專案管理</a> <span class="divider">/</span></li>
						<li><a href="project.html">幼音評測</a> <span class="divider">/</span></li>
						<li class="active">新增人員</li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
							
						<div class="btn-toolbar">
							<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
								<option selected="selected">請選擇</option>
								<option>構音評量</option>
								<option>幼音評量</option>
							</select>
							<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
								<option selected="selected">請選擇</option>
								<option>施測者</option>
								<option>評測者</option>
								<option>專案管理員</option>
							</select>
							<a href="project.html"><button class="btn btn-primary"><i class="icon-save"></i>確認</button></a>
							<a href="#myModal" data-toggle="modal"><button class="btn btn-primary">取消</button></a>
						</div>
						<div class="well">
							<div class="well">
								<table class="table sortable">
									<thead>
										<tr>
											<th><a href="#">#</a></th>
											<th><a href="#">姓名</a></th>
											<th><a href="#">帳號</a></th>
											<th><a href="#">職業</a></th>
											<th class="sorttable_nosort">已有權限</th>
											<th class="sorttable_nosort" onclick="checkall()"><a href="#">全選</a></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Mark</td>
											<td>the_mark1</td>
											<td>學生</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="1">
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Ashley</td>
											<td>the_mark2</td>
											<td>教師</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="2">
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Audrey</td>
											<td>the_mark3</td>
											<td>語言治療師</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="3">
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>John</td>
											<td>the_mark4</td>
											<td>學生</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="4">
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>Aaron</td>
											<td>the_mark5</td>
											<td>學生</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="5">
											</td>
										</tr>
										<tr>
											<td>6</td>
											<td>Chris</td>
											<td>the_mark6</td>
											<td>教師</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="6">
											</td>
										</tr>
										<tr>
											<td>7</td>
											<td>Mecar</td>
											<td>the_mark7</td>
											<td>學生</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="7">
											</td>
										</tr>
										<tr>
											<td>8</td>
											<td>Tom</td>
											<td>the_mark8</td>
											<td>語言治療師</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="8">
											</td>
										</tr>
										<tr>
											<td>9</td>
											<td>Jenney</td>
											<td>the_mark9</td>
											<td>學生</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="9">
											</td>
										</tr>
										<tr>
											<td>10</td>
											<td>Jemmy</td>
											<td>the_mark10</td>
											<td>學生</td>
											<td>
												<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option>施測者</option>
													<option>評測者</option>
													<option>專案管理員</option>
												</select>
											</td>
											<td>
												<input type="checkbox" name="selected" value="10">
											</td>
										</tr>
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
						else
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


