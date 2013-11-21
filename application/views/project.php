<!DOCTYPE html>
<html lang="en">
  <?php
    include "head.php";
  ?> 
  <body> 
    <?
	  include "navbar.php";
	  include "sidebar-nav.php";
	?>
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">專案管理</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="<?=base_url()?>">首頁</a> <span class="divider">/</span></li>
            <li class="active">專案管理</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="project-newproject.html"><button class="btn btn-primary"><i class="icon-plus"></i> 新增</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 26px;">#</th>
          <th>年份</th>
          <th>學校名稱</th>
          <th>人數</th>
          <th>地區</th>
          <th>專案管理員</th>
          <th>日期設定</th>
          <th>人員管理</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>2013</td>
          <td>OO幼稚園</td>
          <td>25</td>
          <td>高雄左營</td>
          <td>大學生A</td>
          <td>2013/9/25 <a href="#"><i class="icon-calendar"></i></a></td>
          <td><a href="project-dispatch.html">派遣</a></td>
          <td>
              <a href="project-data.html"><i class="icon-arrow-right"></i></a>
          </td>
        </tr>
        <tr>
          <td>2</td>
		  <td>2013</td>
          <td>XX幼稚園</td>
          <td>30</td>
          <td>屏東</td>
		  <td>大學生B</td>
		  <td> <a href="#"><i class="icon-calendar"></i></a></td>
		  <td><a href="project-dispatch.html">派遣</a></td>
          <td>
              <a href="#"><i class="icon-arrow-right"></i></a>
          </td>
        </tr>
		<tr>
          <td>3</td>
		  <td>2012</td>
          <td>ABC幼稚園</td>
          <td>50</td>
          <td>桃園</td>
		  <td>大學生C</td>
		  <td>尚未派遣</td>
		  <td><a href="project-dispatch.html">派遣</a></td>
          <td>
              <a href="#"><i class="icon-arrow-right"></i></a>
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


