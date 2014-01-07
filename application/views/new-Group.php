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
    <a id="1"><button class="btn btn-primary" id="new_people" onclick="ButtonClick(1)"><i class="icon-plus"></i>新增權限</button></a>
    <button class="btn">搜尋</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>群組名稱</th>
          <th>人數</th>
          <th>權限</th>
          <th style="width: 60px;">編輯權限</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><a href="#">教師</a></td>
          <td>18</td>
          <td>施測/上傳音檔/檢測(結果)</td>
          <td>
              <a href="user-teacher.html"><i class="icon-pencil"></i></a>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td><a href="#">語言治療師</a></td>
          <td>3</td>
          <td>施測/上傳音檔/檢測(結果)/檢測/追蹤(推薦)/追蹤(取消)</td>
          <td>
			  <a href="user-teacher.html"><i class="icon-pencil"></i></a>
          </td>
        </tr>
		<tr>
          <td>3</td>
          <td><a href="#">實習生</a></td>
          <td>26</td>
          <td>施測</td>
          <td>
			  <a href="user-teacher.html"><i class="icon-pencil"></i></a>
          </td>
        </tr>
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
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>

