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
							} ?>
							<?php 
							if(isset($upload_data)){ 
								?>
								<?php echo $upload_data['full_path'];?>
								<div class="well">
									
									<table id="projectview" class="table sortable">
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">題目</a></th>
												<th><a href="#">檔案名稱</a></th>
												<th><a href="#">是否清晰</a></th>
												<th><a href="#">撥放</a></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($project->result() as $row): ?>
										<tr>
												<td><?=$row->id?></td>
												<td><?=$row->project_name?></td>
												<td><?=$row->Counts?></td>
												<td>
													<select id="Score_value" name="Score_value[]">
													 <option value="1">正確</option>
													 <option value="0">不清楚</option>
													 <option value="-1">不正確</option>
													</select>
												</td>
												<td><embed width="100" height="20" type="application/x-shockwave-flash" src="<?=base_url("/js/singlemp3player.swf")?>" pluginspage="http://www.adobe.com/go/getflashplayer" flashvars="file=<?=base_url()?><?=$row->voice_file?>"/></td>
										</tr>
										<?php  endforeach;?> 
											
										</tbody>
									</table>
									
									
								</div>
							<?php 
							} else { ?>
								<?php echo form_open_multipart('projectview_student/upload');?>

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
			mp3s();
			});
			
			function mp3s(){

$('a[@href$="mp3"]').flash(
        { src: '<?=base_url("/js/singlemp3player.swf")?>', height: 50, width: 100 },
        { version: 7 },
        function(htmlOptions) {
            $this = $(this);
            htmlOptions.flashvars.file = $this.attr('href');
            $this.before($.fn.flash.transform(htmlOptions));						
        }
    );

}

			
	</body>
</html>


