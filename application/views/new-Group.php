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
						<a id="1"><button class="btn btn-primary" id="new_people" onclick="ButtonClick(1)"><i class="icon-plus"></i>新增權限</button></a>
					</div>
					<p><input type="text" name="appellation" placeholder="名稱"></p>
					<div class="row-fluid">
						<div class="block">
							<?php 
							$length1 = count($this->data);
							$tope = array();
							$tope[1] = "人員管理權限";
							$tope[2] = "專案管理權限";
							$tope[3] = "檢測權限";
							$tope[4] = "施測權限";
							$tope[5] = "公告權限";
							for($count1 = 1;$count1<=$length1;$count1++){	
								echo "<p class='block-heading'>".$tope[$count1]."</p>
								<div id='page-stats' class='block-body collapse in'>
								<div class='pull-left span4 unstyled'>";
								$length2 = count($this->data[$count1]);
								for($count2 = 0; $count2<$length2;$count2++){
									$length3 = count($this->data[$count1][$count2]);
									echo "<div class='pull-left span4 unstyled'>";
									for($count3 = 0;$count3<$length3;$count3++){
										echo "<p><samp>".$this->data[$count1][$count2][$count3]."</samp><input type='checkbox'></p>";
									}
									echo "</div>";
								}
								echo "</div></div>
							<div class='clearfix'></div>";
							}?>
						
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
    


		<script src="lib/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
    
	</body>
</html>