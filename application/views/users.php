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
            <h1 class="page-title">權限申請狀況</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="<?=base_url()?>">首頁</a> <span class="divider">/</span></li>
            <li class="active">權限申請狀況</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i>新增用戶</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>姓名</th>
          <th>申請身分</th>
          <th>帳號</th>
          <th>備註</th>
          <th style="width: 35px;">確認</th>
          <th style="width: 35px;">取消</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mark</td>
          <td>大學生</td>
          <td>the_mark7</td>
          <td>STU學生</td>
          <td>
			  <a href="#" alt="確認"><i class="icon-ok"></i></a>
          </td>
		  <td>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Ashley</td>
          <td>教師</td>
          <td>ash11927</td>
          <td>桃園OO幼兒園教師</td>
          <td>
			  <a href="#" alt="確認"><i class="icon-ok"></i></a>
          </td>
		  <td>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>Audrey</td>
          <td>大學生</td>
          <td>audann84</td>
          <td></td>
          <td>
			  <a href="#" alt="確認"><i class="icon-ok"></i></a>
          </td>
		  <td>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td>John</td>
          <td>大學生</td>
          <td>jr5527</td>
          <td></td>
          <td>
			  <a href="#" alt="確認"><i class="icon-ok"></i></a>
          </td>
		  <td>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>Aaron</td>
          <td>語言治療師</td>
          <td>aaron_butler</td>
          <td></td>
          <td>
			  <a href="#" alt="確認"><i class="icon-ok"></i></a>
          </td>
		  <td>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        <tr>
          <td>6</td>
          <td>Chris</td>
          <td>教師</td>
          <td>cab79</td>
          <td></td>
          <td>
			  <a href="#" alt="確認"><i class="icon-ok"></i></a>
          </td>
		  <td>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
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


