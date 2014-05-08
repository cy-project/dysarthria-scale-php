<!DOCTYPE html>
<html lang="en">
	<?php
		include "head.php";
	?> 
	 <style type="text/css">
        #intern {
		float:left; 
		
		}
		
		#intern td th{
		
     
           
           table-layout: fixed;
word-break: break-all;
padding:1px;
vertical-align:bottom;

        } 
		
		
		
		#speech td th{
		
             word-break: break-all;
           
            table-layout: fixed;

padding:0px;
vertical-align:bottom;
        }
		
		#speech {
        float:right; 
        }
		

        
    </style>

	<body> 
		<?php
			include "navbar.php";
			include "sidebar-nav.php";
		?>

		<div class="content">
		<!-------------------------------------------------------------------------------路徑------------------------------------------------------------------------->
			<div class="header">
				<h1 class="page-title">檢驗評測結果(<? echo $name[0]->name;?>)</h1>
			</div>
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li>
				
				<a href="<?=base_url("/projectview_student/projectview")?>">專案管理</a> 
				<span class="divider">/
				</span></li>
				
				<li>
				<a href="<?=base_url("/projectview_student/project_board")?>/project_id/<?=$project_id?>"><? echo $name[0]->name;?></a> 
				<span class="divider">/檢驗評測結果(<? echo $name[0]->name;?>)
				</span></li>
				
				<li class="active"></li>
			</ul>
			<!-------------------------------------------------------------------------------底線------------------------------------------------------------------------->
			<div class="container-fluid">
			<!-------------------------------------------------------------------------------內容------------------------------------------------------------------------->
			<div class="row-fluid">
				
				<div  class="block span12">
					<p class="block-heading">檢驗評測結果</p>
					
					<div id="projectview" class="block-body">
					<div id="intern"></div>
					<div id="speech"></div>
				
					</div>
				
			</div>
					
					<!--	<div id="intern" class="block span6"></div>
					
						

						<div id="speech" class="block span6"></div>
						
						
					 -->
					
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
			
			
			$().ready(function(){
				//初始化載入
						
						sorttables();
						intern_ajax();
						speech_ajax();
						
						wav();
				});

			function intern_ajax(){ // ajax 傳值

			$.ajax({
				  url: "<?=base_url("/score/score_intern_ajax")?>",
				  type: 'POST',
				  data:{
				  testing_list_id:'<?=$testing_list_id?>',
				  member_id:'<?=$member_id?>',
				  project_id:'<?=$project_id?>',
				  office_id:0},
				   dataType:'html',
				  error: function(xhr, ajaxOptions, thrownError) {
					alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
					//$('#ReturnViews').html(xhr.responseText);
				  },
				  success: function(response) {
				  
					  sorttables();
					  
					  $("#intern").html(response);
					wav();
				  }
			});

				 
			}
			
			function speech_ajax(){
			
			$.ajax({
				  url: "<?=base_url("/score/score_speech_ajax")?>",
				  type: 'POST',
				  data:{
				  testing_list_id:'<?=$testing_list_id?>',
				  member_id:'<?=$member_id?>',
				  project_id:'<?=$project_id?>',
				  office_id:1},
				  dataType:'html',
				  error: function(xhr, ajaxOptions, thrownError) {
					alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
					//$('#ReturnViews').html(xhr.responseText);
				  },
				  success: function(response) {
				  
					  
					  
					  $("#speech").html(response);
					  sorttables();
						wav();
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


