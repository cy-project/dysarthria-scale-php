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
					<input type="radio" checked="checked" name="User" value="surveying" onclick="Select_People(1,0)">施測者
					<input type="radio" name="User" value="detect" onclick="Select_People(2,0)">檢測者
					<select class="input-xlarge" name="DropDownTimezonename" id="DropDownTimezone" class="input-xlarge">
									<!-- ajax -->
					</select>
					   施測日期:<input name="memberbirth" id="dispatchdate" placeholder="yyyy/xx/dd" type="text" value=""/>
					<button class="btn btn-primary" id="new_group" onclick="NewGroup(1)"><i class="icon-plus"></i>自動派遣</button>
				</div>
				<div class="row-fluid">
					<div class="well">	 
						<div>
							<button class="btn btn-primary" onclick="Confirm_Dispatch()"><i class="icon-plus"></i>確認派遣</button>
						</div>
						<div id="Menber_list">
										<!-- ajax -->
						</div>
					</div>
					<div>
						<button class="btn btn-primary" onclick="OKdispatch(<?php echo $project_id;?>)"><i class="icon-plus"></i>完成派遣</button>
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
			var count = 0;
			var kiddata = new Array();
			$().ready(function() {
				Select_People(1, count);
			});
			
			$("[rel=tooltip]").tooltip();
			
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
			
			function Confirm_Dispatch(){
				count++;
				var language = document.getElementsByName('User');
				var selectcount = "";
				var countdata = document.getElementById('DropDownTimezone').value;
				var kidselectdata =document.getElementsByName('Selected[]');
				
				for (var i=0; i<language.length; i++)
				{
					if (language[i].checked)
					{
						selectcount = language[i].value;
						break;
					}
				}
				
				if(countdata == '0'){
					alert("請選擇使用者");
				}
				else{
					for(var a = 0; a<kidselectdata.length;a++){
						if(kidselectdata[a].checked == true )
						{
							for(var b = 0 ; b<kiddata.length;b++){
								if(kiddata[b][0] == kidselectdata[a].value){
									if(selectcount == 'surveying')
									{
										kiddata[b][1] = countdata;
									}
									else{
										kiddata[b][2] = countdata;
									}
								}
							}
						}
					}
					if(selectcount == 'surveying')
					{
						Children(1,0);
					}
					else{
						Children(2,0);
					}
				}
			}
			
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
						takeRecordData();
						Children(f,con);
					}
				});
			}
			
			function Children(f,c){
				var URL = "<?=base_url("/projectview_admin/Kids_Menu")?>/project_id/<?php echo $project_id;?>";
					$.ajax({
						url: URL,
						type: 'POST',
						data:{'id':<?php echo $project_id;?>,'selected':f,'data':kiddata,'count':c},
						dataType:'html',
						error: function(xhr, ajaxOptions, thrownError) {
							alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
						},
						success: function(response) {
							$('#Menber_list').html(response);
							takeRecordData();
						}
					});
			}
			
			function OKdispatch(pid){
				var URL = "<?=base_url("/projectview_admin/StatrDispatch")?>";
				var boolen = dateValidationCheck($('#dispatchdate').val());
				if(!boolen){
					alert('請輸入 YYYY/MM/DD 日期格式');
				}
				else{
					$.ajax({
						url: URL,
						type: 'POST',
						data:{'id':<?php echo $project_id;?>,'time':$('#dispatchdate').val(),'kidselectdata':kiddata},
						dataType:'text',
						error: function(xhr, ajaxOptions, thrownError) {
							alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
						},
						success: function(response) {
							alert(response);
						}
					});
				}
				
			}
			
			function dateValidationCheck(str){
				var re = new RegExp("^([0-9]{4})[./]{1}([0-9]{1,2})[./]{1}([0-9]{1,2})$");
				var strDataValue;
				var infoValidation = true;
				 
				if ((strDataValue = re.exec(str)) != null){
					var i;
					i = parseFloat(strDataValue[1]);
					if (i <= 0000 || i > 9999){ // 年
						infoValidation = false;
					}
					i = parseFloat(strDataValue[2]);
					if (i <= 00 || i > 12){ // 月
						infoValidation = false;
					}
					i = parseFloat(strDataValue[3]);
					if (i <= 00 || i > 31){ // 日
						infoValidation = false;
					}
				}else{
					infoValidation = false;
				}
			 
				return infoValidation;
			}
			
			function takeRecordData(){
				data = document.cookie.split(";");
				selectarray = data[1].split("%7C");
				for(a = 0; a<selectarray.length-1;a++){
					kiddata[a] = selectarray[a+1].split("%2C");
				}
			}
			
			function Delete_Select(selectcount, id){
				for(a = 0 ; a<kiddata.length;a++){
					if(kiddata[a][0] == id){
						kiddata[a][selectcount] = 0;
						Children(selectcount, 0);
					}
				}	
			}
		</script>
		
    
	</body>
</html>