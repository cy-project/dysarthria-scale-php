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
				<h1 class="page-title"><?php echo $name;?></h1>
			</div>
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li><a href="<?=base_url("/projectadmin/project_home")?>">專案管理</a> <span class="divider">/</span></li>
				<li class="active"><?php echo $name;?></li>
			</ul>
			<!-------------------------------------------------------------------------------底線------------------------------------------------------------------------->
			<div class="container-fluid">
			<!-------------------------------------------------------------------------------內容------------------------------------------------------------------------->
				<div class="row-fluid">
					<div class="btn-toolbar">
						<span>
							<a id="1"><button class="btn btn-primary" id="new_people" onclick="ButtonClick(1)"><i class="icon-plus"></i>新增</button></a>
						</span>
						<span>
							<a id="2"><button class="btn btn-primary" id="dispatch" onclick="ButtonClick(2)">派遣</button></a>
						</span>
					</div>
					<div class="well" >
						<ul class="nav nav-tabs" style="margin-bottom: 0px;">
							<li class="active" name="board"><a id="practitioner" href="#project_members" data-toggle="tab" onclick="OneClick(1)">專案成員</a></li>
							<li name="board" ><a id="subjects" href="#chit" data-toggle="tab" onclick="OneClick(2)">受測者</a></li>
							<li name="board"><a id="applicants" href="#application" data-toggle="tab" onclick="OneClick(3)">申請者</a></li>
							<li name="board"><a id="track_list_menu" href="#track_list" data-toggle="tab" onclick="OneClick(4)">追蹤名單</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade" id="chit" ><!--受測者-->
							</div>
							<div class="tab-pane active in" id="project_members"><!--專案成員-->
							</div>
							<div class="tab-pane fade" id="application"><!--申請者-->
							</div>
							<div class="tab-pane fade" id="track_list"><!--追蹤名單-->
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
			var count=1;
			$().ready(function() {
				OneClick(1);
			});
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
						document.location.href='<?=base_url("/projectview_admin/")?>'+msg+'/project_id/<?php echo $project_id;?>';
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert(xhr.status);
						alert(thrownError);
					}
				});
			}
			function OneClick(i) {
				$.cookie('name', i);
				var URLs='<?=base_url("/projectview_admin/subjects_list")?>';
					$.ajax({
					url: URLs,
					data: {'member_id':$.cookie('member_id'),'number_page':i,'project_id':<?php echo $project_id;?>},
					type:"POST",
					dataType:'html',
					success: function(msg){
						if(i==1)
							$('#project_members').html(msg);
						else if(i == 2)
							$('#chit').html(msg);
						else if(i == 3)
							$('#application').html(msg);
						else if(i == 4)
							$('#track_list').html(msg);
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert(xhr.status);
						alert(thrownError);
					}
					});
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
		<script>
				$( "#subjects" ).click(function() {
					$( "#dispatch:last-child" ).hide();
					$( "#new_people" ).show();
				});
				$( "#practitioner" ).click(function() {
					$( "#new_people" ).show();
					$( "#dispatch" ).show();
				});
				$( "#applicants" ).click(function() {
					$( "#dispatch:last-child" ).hide();
					$( "#new_people:last-child" ).hide();
				});
				$( "#track_list_menu" ).click(function() {
					$( "#dispatch" ).show();
					$( "#new_people:last-child" ).hide();
				});
		</script>
		<script type="text/javascript">
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
	</body>
</html>


