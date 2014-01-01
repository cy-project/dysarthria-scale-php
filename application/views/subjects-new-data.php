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
					
					<h1 class="page-title">修改人員(受測者)</h1>
				</div>
				
					<ul class="breadcrumb">
						<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectadmin/project_home")?>">專案管理</a> <span class="divider">/</span></li>
						<li><a href="<?=base_url("/projectview_admin/project_board")?>">幼音評測</a> <span class="divider">/</span></li>
						<li class="active">修改人員(受測者)</li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
						<form id="tab" action="<?=base_url("/projectview_admin/project_board")?>" method="post">
							<div class="btn-toolbar">
								<button class="btn btn-primary" type="submit"><i class="icon-save"></i>修改</button>
								<a href=""<?=base_url("/projectview_admin/project_board")?>""><button class="btn btn-primary">取消</button></a>
							</div>
							<div class="well">
								<label>姓名</label>
								<input type="text" value=<?echo $stu_name;?> class="input-xlarge">
								<label>性別</label>
								<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
									<option selected="selected" value="-12.0">男</option>
									<option value="-11.0">女</option>
								</select>
								<label>出生年月日(西元yyyy/mm/dd)</label>
								<input type="text" value="2006/11/21" class="input-xlarge">
								<label>所在縣市</label>
								<input type="text" value="高雄市" class="input-xlarge">
								<label>學校</label>
								<input type="text" value="OO幼稚園" class="input-xlarge">
								<label>年級</label>
								<input type="text" value="大班" class="input-xlarge">
								<label>班級</label>
								<input type="text" value="向日葵班" class="input-xlarge">
								<!--<label>家中排行</label>
								<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
									<option selected="selected" value="-11.0">長子</option>
									<option value="-12.0">長女</option>
									<option value="-13.0">次子</option>
									<option value="-13.0">次女</option>
								</select>-->
								<label>常用語言</label>
								<select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
									<option selected="selecte" value="-12.0">國語</option>
									<option value="-11.0">台語</option>
									<option value="-13.0">英語</option>
								</select>
							</div>
						</form>

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


