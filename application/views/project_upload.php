<!DOCTYPE html>
<html lang="en">
	<?php
		include "head.php";
	?> 
	<script>
	$().ready(function() {
	  wav();
	});
	</script>
	<body> 
		<?php
			include "navbar.php";
			include "sidebar-nav.php";
		?>
		<div class="content">
			
			<div class="header">
				
				<h1 class="page-title">專案管理</h1>
			</div>
			
				<ul class="breadcrumb">
					<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
					<li><a href="<?=base_url("/projectview_student/projectview")?>">專案管理</a> <span class="divider">/</span> 專案管理 <span class="divider">/</span></li>
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
								  <form enctype="multipart/form-data" method="post" action="<?=base_url("/projectview_student/uploading/project_id/".$project_id."/testing_id/".$testing_id)?>">
									<table id="projectview" class="table sortable">
										<thead>
											<tr>
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
										foreach($testfile as $row): ?>
										<tr>
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
															<option value="1=./uploads/<?php echo $wav_name[$i][$j];?>" selected="selected">清晰</option>
															<option value="0=./uploads/<?php echo $wav_name[$i][$j];?>">不清晰</option>
														</select>
												<?php
													}
													else
													{
												?>
														<select id="Score_value" name="Score_value[]">
															<option value="0=./uploads/<?php echo $wav_name[$i][$j];?>" selected="selected">不清晰</option>
															<option value="1=./uploads/<?php echo $wav_name[$i][$j];?>">清晰</option>
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
										endforeach;?> 
										</tbody>
									</table>
									<input type="submit" value="確認音檔" />
								  </form>
								</div>
							<?php 
							} else { ?>
								<form enctype="multipart/form-data" method="post" action="<?=base_url("/projectview_student/upload/project_id/".$project_id."/testing_id/".$testing_id)?>">
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
		
		<script type="text/javascript">
			
			
			$().ready(function(){
			sorttables();
			//mp3s();
			});
			
			/*function mp3s(){

			$('a[@href$="mp3"]').flash(
			{ src: '<?=base_url("/js/singlemp3player.swf")?>', height: 50, width: 100 },
			{ version: 7 },
			function(htmlOptions) {
				$this = $(this);
				htmlOptions.flashvars.file = $this.attr('href');
				$this.before($.fn.flash.transform(htmlOptions));						
			}*/
		);

}

			
	</body>
</html>


