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
				<h1 class='page-title'>
				<?php if($count == 1){
					echo "新增群組";
				}
				elseif($count == 2){
					echo "編輯群組";
				}?>
				</h1>
			</div>
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li><a href="<?=base_url("/userapplication/usersadmin")?>">權限管理</a> <span class="divider">/</span></li>
				<li class="active">
				<?php 
				if($count == 1){
					echo "新增群組";
				}
				elseif($count == 2){
					echo "編輯群組";
				}?>
			</li>

			</ul>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="btn-toolbar">
						<button class="btn btn-primary" id="new_group" onclick="NewGroup(1)"><i class="icon-plus"></i>
						<?php 
						if($count == 1){
							echo "新增群組";
						}
						elseif($count == 2){
							echo "編輯群組";
						}?>
				</button>
						<a href="#"><button class="btn btn-primary" id="delete_group" onclick="NewGroup(2)"><i class="icon-plus"></i>取消</button></a>
						
					</div>
					<p><input type="text" name="appellation" id="inputname" placeholder="群組名稱" value="<?php 
						if($count == 2){
							echo $this->datoem[0]->name;
						}
							?>"></p>
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
				var ion;
				<?php if($count == 2){
				$length = count($this->datacount);?>
				count = <?php echo $length; ?>;
				<?php for($i = 0;$i<$length;$i++){?>
				ion =<?php echo $i; ?>;
				options_data[ion] = <?php echo $this->datacount[$i]->permission_id ;?>;
				<?php }} ?>
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
								options_data[a] = null;
							}
							else
								options_data[a] = options_data[a+1]; 
						}
						count--;
					}
					$(SelectArea).show();
					$(OptionsArea).hide();
				}
			}
			
			function set_select(f){
				var count_view;
				var URL;
				if(f == 1){
					count_view = "#Select_area";
					URL ='<?=base_url("/userapplication/Select_area_1")?>' ;
				}
				else if(f == 2){
					count_view ="#Options_area";
					URL ='<?=base_url("/userapplication/Options_area_2")?>' ;
				}
				$.ajax({
					url: URL,
					type: 'POST',
					data:{'id':<?php echo $id;?>,'count':<?php echo $count;?>},
					dataType:'html', 
					error: function(xhr, ajaxOptions, thrownError) {
						alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
						//$('#ReturnViews').html(xhr.responseText);
					},
					success: function(response) {
						sorttables();
						$(count_view).html(response);
					}
				});
			}
			function NewGroup(f)
				{
				alert('<?=base_url("/userapplication/newgroup")?>/count/'+count+'/id/<?php echo $id; ?>');
					var number;
					var URLs;
					count = <?php echo $count;?>;
					alert(count);
					if(f == 1){
						if(count == 1){
							URLs='<?=base_url("/userapplication/insertGroup")?>/id/<?php echo $this->data['id']; ?>';
						}
						else if(count == 2){
							URLs='<?=base_url("/userapplication/EditorGroup")?>/id/<?php echo $this->data['id']; ?>';
						}
						var groupname = $("#inputname").val();
						
						if(groupname == "" ){
							alert('內容有缺');
							number = 2;
							return;
						}
						
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
					else{
						document.location.href='<?=base_url("/userapplication/usersadmin")?>';
					}
					
				}
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
		
    
	</body>
</html>