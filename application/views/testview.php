<!DOCTYPE html>
<html lang="en">
  <?php
    include "head.php";
  ?> 
	<body> 
	<!--<![endif]-->
    <?php
	  include "navbar.php";
	  include "sidebar-nav.php";
	?>
		<div class="content">
        
			<div class="header">
				<h1 class='page-title'>派遣選擇</h1>
			</div>
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li><a href="<?=base_url("/projectadmin/project_home")?>">專案管理</a> <span class="divider">/</span></li>
				<li><a href="<?=base_url("/projectview_admin/project_board")?>/project_id/<?php echo $project_id;?>"><?php echo $name;?></a> <span class="divider">/</span></li>
				<li class="active">派遣選擇</li>
			</ul>
		<div class="container-fluid">
			<div class="row-fluid">
				<div>
					<input type="radio" checked="checked" name="User" value="surveying" onclick="Select_People(1, 1)">施測者
					<input type="radio" name="User" value="detect" onclick="Select_People(2, 1)">檢測者
					<select class="input-xlarge" name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
						
					</select>
					   施測日期:<input name="member.birth" placeholder="年-月-日" type="time" value=""/>
					<button class="btn btn-primary" id="new_group" onclick="NewGroup(1)"><i class="icon-plus"></i>自動派遣</button>
				</div>
				<div class="row-fluid">
					<div class="well">	 
						<div>
							<button class="btn btn-primary"><i class="icon-plus"></i>確認派遣</button>
						</div>
						<div id="Menber_list">
										<!-- ajax -->
						</div>
					</div>
					<div>
						<button class="btn btn-primary"><i class="icon-plus"></i>完成派遣</button>
						<button class="btn btn-primary"><i class="icon-plus"></i>取消派遣</button>
					</div>
				</div>

				<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">人員更換</h3>
					</div>
					<div class="modal-body">
						<p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要更換?</p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true" >取消</button>
						<button class="btn btn-danger" data-dismiss="modal" onclick="">確定</button>
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
    

		<style type="text/css"> 
			.test{
				border-color:#D7CAE4; 
				border-style:solid;
				width:300px; 
				height:auto; 
				float:left; 
				display:inline;
			} 
		</style>
		<script src="lib/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
			var surveying_count = 0;
			var detect_count = 0;
			var surveying;
			var detect;
			$().ready(function() {
				Select_People(1, 1);
			});
			$("[rel=tooltip]").tooltip();
			
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
			
			
			
			function Select_People(f, con){
				var URL = "<?=base_url("/projectview_admin/select_the_page")?>";
				$.ajax({
					url: URL,
					type: 'POST',
					data:{'id':<?php echo $project_id;?>,'selected':f},
					dataType:'text', 
					error: function(xhr, ajaxOptions, thrownError) {
						alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
					},
					success: function(response) {
						$('#DropDownTimezone').html(response);
						Children(f, con);
					}
				});
			}
			
			function Children(f ,con){
				var URL = "<?=base_url("/projectview_admin/Kids_Menu")?>";
				if(surveying_count == 0 || detect_count == 0){
					$.ajax({
						url: URL,
						type: 'POST',
						data:{'id':<?php echo $project_id;?>,'selected':f},
						dataType:'html', 
						error: function(xhr, ajaxOptions, thrownError) {
							alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
						},
						success: function(response) {
							$('#Menber_list').html(response);
							if(f == 1){
								surveying = response;
								surveying_count++;
							}
								
							else{
								detect = response;
								detect_count++;
							}
								
						}
					});
				}
				else{
					if(f == 1)
					{
						$('#Menber_list').html(surveying);
						surveying_count++;
					}
					else
					{
						$('#Menber_list').html(detect);
						detect_count++;
					}
				}
				
				count = count+con;
			}
		</script>
		
    
	</body>
</html>