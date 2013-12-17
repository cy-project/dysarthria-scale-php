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
			<h1 class="page-title">追蹤名單</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
			<li class="active">追蹤名單</li>
		</ul>

        <div class="container-fluid">
            <div class="row-fluid">
				<div class="btn-toolbar">
					
				  <div class="btn-group">
				  </div>
				</div>
				<div class="well">
					<!-- ajax -->
				</div>
				<!--
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
				-->
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
        
		$().ready(function(){ //初始化載入

		sorttables();
		js_track_index_ajax();
		fancybox_start();
		});


		function fancybox_start(){

		$(".various").fancybox({
			maxWidth	: 820,
			maxHeight	: 700,
			fitToView	: false,
			width		: '70%',
			height		: '100%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
			});


		}



		function js_track_index_ajax(){ 

			$.ajax({
					  url: '<?php echo base_url();?>track/track_views_ajax',
					   type:"POST",
					   dataType:'html',
					  error: function(xhr, ajaxOptions, thrownError) {
						$('.well').html('Ajax request 發生錯誤'+xhr.responseText);
						//$('#ReturnViews').html(xhr.responseText);
					  },
					  success: function(response) {
						sorttables();
						$('.well').html(response);
			
					  }
				});

		}
		
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


