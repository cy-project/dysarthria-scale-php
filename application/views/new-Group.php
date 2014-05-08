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
				<h1 class="page-title">新增群組</h1>
			</div>
        
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li><a href="<?=base_url("/userapplication/usersadmin")?>">權限管理</a> <span class="divider">/</span></li>
				<li class="active">新增群組</li>

			</ul>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="btn-toolbar">
						<button class="btn btn-primary" id="new_group" onclick="NewGroup()"><i class="icon-plus"></i>新增權限</button>
						<button class="btn btn-primary" id="delete_group" onclick=""><i class="icon-plus"></i>取消</button>
						
					</div>
					<p><input type="text" name="appellation" id="inputname" placeholder="名稱"></p>
					<div class="row-fluid">
						<div class="block div-inline">
							<div class="test" id="Select_area"></div>
							<div class="test" id="Options_area" ></div>
						</div>
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
			var options_data = [];
			var count = 0;
			$().ready(function() {
				set_select(1);
				set_select(2);
			});
			
			function switch_options(f,b){
				var StringArray = f.split("_");
				var SelectArea = "#Select_area_"+StringArray[2];
				var OptionsArea = "#Options_area_"+StringArray[2];
				if(b == "2"){
					options_data[count] = StringArray[2];
					$(SelectArea).hide();
					$(OptionsArea).show();
					count++;
				}
				else if(b == "1"){
					for(i = 0;i < options_data.length;i++){
						if(options_data[i] == StringArray[2]){
							b = i;
						}
					}
					if(options_data[b] == StringArray[2]){
						for(a = b;a<options_data.length;a++){
							if(a == options_data.length-1){
								options_data[a] = 0;
							}
							else
								options_data[a] = options_data[a+1]; 
						}
						count--;
					}
					$(SelectArea).show();
					$(OptionsArea).hide();
				}
				alert(options_data);
			}
			
			function set_select(f){
				var count;
				var URL;
				var number;
				if(f == 1){
					count = "#Select_area";
					URL ='<?=base_url("/userapplication/Select_area_1")?>' ;
				}
				else if(f == 2){
					count ="#Options_area";
					URL ='<?=base_url("/userapplication/Options_area_2")?>' ;
				}
				$.ajax({
					url: URL,
					type: 'POST',
					dataType:'html', 
					error: function(xhr, ajaxOptions, thrownError) {
						alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
						//$('#ReturnViews').html(xhr.responseText);
					},
					success: function(response) {
						sorttables();
						$(count).html(response);
					}
				});
			}
			function NewGroup()
				{
					var URLs='<?=base_url("/userapplication/insertGroup")?>';
					var number = $("#inputname").val();
					var groupname = $("#inputname").val();
					if(groupname == ""|| options_data == ""){
						number = 2;
						alert("內容有缺");
					}
					else
						number = 1;
					$.ajax({
						url: URLs,
						data: {'number': number,'permissions_option':options_data,'groupname':groupname},
						type:"POST",
						dataType:'text',
						success: function(msg){
							document.location.href='<?=base_url("/userapplication/")?>'+msg;
						},
						error:function(xhr, ajaxOptions, thrownError){
							alert(xhr.status);
							alert(thrownError);
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