<!DOCTYPE html>
<html lang="en">
	<?php
		include "head.php";
	?> 
	<script>
	$().ready(function() {
	  wav();
	  sorttables();
	  Audiofiles_click();
	});
	
	function Audiofiles_click(){
			
				$( "#Audiofiles" ).click(function() {
					Audiofiles_ajax();
				});
			
	}
	
	function Audiofiles_ajax(){
	
		var tjisval='';
		var yes_Score_value = $("select[id='Score_value']").map(
		function(){
			tjisval=$(this).val();
			
			tjisval=tjisval.split("=");
			if(tjisval[1]==1){
				return $(this).val();
				}
		}).get(); //取name[]的value型態array
		
		
		var no_Score_value = $("select[id='Score_value']").map(
		function(){
			tjisval=$(this).val();
			
			tjisval=tjisval.split("=");
			if(tjisval[1]==0){
				return $(this).val();
				}
		}).get(); //取name[]的value型態array
		
		
	
		yes_c=Comparisons_yes(yes_Score_value,'只能選一筆清楚的檔案');
		
		
		if(yes_c==true){
			
			ajax_to();
			
		}
		
	}
	
	function Comparisons_yes(Score_value,str){
		var topicsnumber="<?=$topics_num?>";
		var	Score_array="";
		var Score_split="";
		var Comparison =new Array();
		var c=0;
		var f=true;
		var v=false;
		
		
		for(i=0;i<Score_value.length;i++){
		
			Score_split=Score_value[i].split("=");
			Score_array=Score_split[0];
			
			if(i==0){
			
				Comparison[c]=Score_array;
				c++;
				
			}else{
			
			var d=0;
				for(j=0;j<=Comparison.length;j++){
					
						if(Score_array==Comparison[j]){
							
							d=1;
						}
						
				}
				
				if(d==0){
					Comparison[c]=Score_array;
					c++;
				}else{
					
					
					alertify.alert('第'+Score_array+'題-'+str);
					f=false;
					break;
				}
				
			}
			
		}
		
		
		
		if(Comparison.length==topicsnumber){
			
			V=true;
			
		}else if(Comparison.length>topicsnumber){
		
		alertify.alert('您目前選擇的清楚音檔，只有'+Comparison.length+'個音檔(未滿90個清楚音檔)<p><span style="color:red">因此請您再檢查一次!!</span>');
		
		
		}
		
		
		if((V==true)&&(f==true)){
			return true;
				}else{
			return false;
		}
		
		
	
	}
	
	
	function ajax_to(){
	
	var Score_values = $("select[id='Score_value']").map(function(){return $(this).val();}).get(); //取name[]的value型態array
	
	$.ajax({
			  url: '<?=base_url("/projectview_student/uploading/project_id/".$project_id."/testing_id/".$testing_id)?>',
			  type: 'POST',
				data: {
				score_values:Score_values
			  }, 
			  error: function(xhr, ajaxOptions, thrownError) {
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				//$('#ReturnViews').html(xhr.responseText);
			  },
			  success: function(response) {
			
				//alert(response);
				window.location.href= '<?=base_url("/projectview_student/project_board/project_id/".$project_id)?>';
			  
			  },beforeSend:function(){
					$('#Audiofiles').hide();
                    $('#loadingIMG').show();
              },complete:function(){
                    $('#loadingIMG').hide();
                },
		});
		
	
	
	}
	
	
	</script>
	<body> 
		<?php
			include "navbar.php";
			include "sidebar-nav.php";
		?>
		<div class="content">
			
			<div class="header">
				
				<h1 class="page-title">上傳(<?php echo $children_name[0]->name;?>)</h1>
			</div>
			
				<ul class="breadcrumb">
					<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
					<li><a href="<?=base_url("/projectview_student/projectview")?>">專案管理</a> <span class="divider">/</span></li>
					<li><a href="<?=base_url("/projectview_student/project_board")?>/project_id/<?php echo $project_id;?>"><?php echo $project_name[0]->name;?></a> <span class="divider">/</span></li>
					<li class="active">上傳</li>
				</ul>

			<div class="container-fluid">
				<div class="row-fluid">
				
					<div class="container-fluid">
						<div class="row-fluid">
							<?php
							if(isset($error)){
								echo $error;
							}
							?>
							<?php 
							if(isset($upload_data)){
								?>
								<div class="well">
								  <!--<form enctype="multipart/form-data" method="post" action="<?=base_url("/projectview_student/uploading/project_id/".$project_id."/testing_id/".$testing_id)?>">-->
									<table id="projectview" class="table sortable">
										<thead>
											<tr>
												<th><a href="#">題號</a></th>
												<th><a href="#">題目</a></th>
												<th><a href="#">檔案名稱</a></th>
												<th><a href="#">是否清晰</a></th>
												<th><a href="#">撥放</a></th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=0;
										$temp = 1;
										$number=1;
										foreach($testfile as $row): ?>
										<tr>
											<td><?php echo $number;?></td>
											<td><?=$row->script?></td>
											<td>
												<?php 
												for($j=0; $j < count($file_name[$i]);$j++)
												{
													echo $file_name[$i][$j] . "<br />";
												}
												?>
											</td>
											<td>
												<?php 
												for($j=0; $j < count($file_name[$i]);$j++)
												{
													if(count($file_name[$i]) == 1)
													{
												?>
														<select id="Score_value" name="Score_value[]">
															<option value="<?=$topic_id[$i]?>=1=./uploads/<?php echo $wav_name[$i][$j];?>=<?=base_url("/uploads/".$wav_name[$i][$j])?>" selected="selected">清晰</option>
															<option value="<?=$topic_id[$i]?>=0=./uploads/<?php echo $wav_name[$i][$j];?>=<?=base_url("/uploads/".$wav_name[$i][$j])?>">不清晰</option>
														</select>
												<?php
													}
													else
													{
												?>
														<select id="Score_value" name="Score_value[]">
															<option value="<?=$topic_id[$i]?>=0=./uploads/<?php echo $wav_name[$i][$j];?>=<?=base_url("/uploads/".$wav_name[$i][$j])?>" selected="selected">不清晰</option>
															<option value="<?=$topic_id[$i]?>=1=./uploads/<?php echo $wav_name[$i][$j];?>=<?=base_url("/uploads/".$wav_name[$i][$j])?>">清晰</option>
														</select>
												<?php
													}
												}
												?>
											</td>
											<td style="width: 300px;">
												<?php 
												for($j=0; $j < count($file_name[$i]);$j++)
												{
													
												?>
													<div class="wavclass" id="wavshow-<?php echo $temp;?>"></div>
													<input type="hidden" id="wavget-<?php echo $temp;?>" value="<?=base_url("/uploads/".$wav_name[$i][$j])?>" />
													</p>
												<?php
													$temp++;
												}
												?>
											</td>
										</tr>
										<?php  
										$i++;
										$number++;
										endforeach;?> 
										</tbody>
									</table>
									<input id='Audiofiles' type="submit" value="確認音檔" />
									<div id="loadingIMG" style="display:none"><img src="<?=base_url("/images/ajax-loader.gif")?>" height='14'/>資料處理中，請稍後。</div>
								  <!--</form>-->
								</div>
							<?php 
							} else { ?>
								<form enctype="multipart/form-data" method="post" action="<?=base_url("/projectview_student/upload/project_id/".$project_id."/testing_id/".$testing_id."/children_id/".$children_id)?>">
								<input type="file" name="userfile" style="width: 150px" />
								<input type="submit" value="上傳" />
								
								</form>
							<?php } ?>
							
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
			</div>
		</div>
		
		
			
	</body>
</html>


