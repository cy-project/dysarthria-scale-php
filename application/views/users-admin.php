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
            <h1 class="page-title">權限管理</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
            <li class="active">權限管理</li>

        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
	<div class="btn-toolbar">
		<a href="<?=base_url("/userapplication/newgroup")?>/count/1/id/0"><button class="btn btn-primary" id="new_people"><i class="icon-plus"></i>新增</button></a>
	</div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>群組名稱</th>
          <th>人數</th>
          <th style="width: 60px;">編輯權限</th>
          <th style="width: 60px;">刪除權限</th>
        </tr>
      </thead>
      <tbody>
	  <?php 
			$length = count($this->data);
			for($count = 0;$count<$length;$count++){
	  ?>
        <tr>
          <td><?php echo $this->data[$count]->id;?></td>
          <td><a href="#" onclick="dialog(<?php echo $this->data[$count]->id;?>)"><?php echo $this->data[$count]->name;?></a></td>
          <td><?php echo $this->data[$count]->peoplecount;?></td>
          <td>
              <a href="<?=base_url("/userapplication/newgroup")?>/count/2/id/<?php echo $this->data[$count]->id;?>"><i class="icon-pencil"></i></a>
          </td>
		  <td>
              <a href="<?=base_url("/userapplication/RemoveGroup")?>/id/<?php echo $this->data[$count]->id;?>" ><i class="icon-remove"></i></a>
          </td>
        </tr>
		<?php }?>
       
      </tbody>
    </table>
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
		function dialog(id){
			var URL = "<?=base_url("/userapplication/showpermissions")?>";
			$.ajax({
					url: URL,
					type: 'POST',
					data:{'id':id},
					dataType:'text', 
					error: function(xhr, ajaxOptions, thrownError) {
						alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
						//$('#ReturnViews').html(xhr.responseText);
					},
					success: function(response) {
						if ( response === "")  {    
							alert("未設定"); 
						} 
						else{
							alert(response);
						}
						//alertify.alert($(count).html(response););
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


