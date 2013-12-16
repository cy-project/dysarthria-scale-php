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
					<button class="btn btn-primary"><i class="icon-plus"></i> 匯出</button>
					<button class="btn">搜尋</button>
				  <div class="btn-group">
				  </div>
				</div>
				<div class="well">
					<table class="table">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>選擇</th>
						  <th>案例編號</th>
						  <th>學生姓名</th>
						  <th>評分狀況</th>
						  <th>學校</th>
						  <th>追蹤</th>
						  <th style="width: 45px;"></th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>1</td>
						  <td><input type="checkbox"></input></td>
						  <td>010</td>
						  <td>王小明</td>
						  <td>60%</td>
						  <td>OO幼兒園</td>
						  <td><a href="#">追蹤狀況</a></td>
						  <td>
							  <a href="#"><i class="icon-pencil"></i></a>
							  <a href="#"><i class="icon-arrow-right"></i></a>
						  </td>
						</tr>
						<tr>
						  <td>2</td>
						  <td><input type="checkbox"></td>
						  <td>011</td>
						  <td>Ashley</td>
						  <td>65%</td>
						  <td>OO幼兒園</td>
						  <td><a href="#">追蹤狀況</a></td>
						  <td>
							  <a href="#"><i class="icon-pencil"></i></a>
							  <a href="#"><i class="icon-arrow-right"></i></a>
						  </td>
						</tr>
						<tr>
						  <td>3</td>
						  <td><input type="checkbox"></td>
						  <td>012</td>
						  <td>Audrey</td>
						  <td>55%</td>
						  <td>XX幼兒園</td>
						  <td><a href="#">追蹤狀況</a></td>
						  <td>
							  <a href="#"><i class="icon-pencil"></i></a>
							  <a href="#"><i class="icon-arrow-right"></i></a>
						  </td>
						</tr>
						<tr>
						  <td>4</td>
						  <td><input type="checkbox"></td>
						  <td>015</td>
						  <td>John</td>
						  <td>40%</td>
						  <td>XX幼兒園</td>
						  <td><a href="#">追蹤狀況</a></td>
						  <td>
							  <a href="#"><i class="icon-pencil"></i></a>
							  <a href="#"><i class="icon-arrow-right"></i></a>
						  </td>
						</tr>
						<tr>
						  <td>5</td>
						  <td><input type="checkbox"></td>
						  <td>018</td>
						  <td>Aaron</td>
						  <td>50%</td>
						  <td>OO幼兒園</td>
						  <td><a href="#">追蹤狀況</a></td>
						  <td>
							  <a href="#"><i class="icon-pencil"></i></a>
							  <a href="#"><i class="icon-arrow-right"></i></a>
						  </td>
						</tr>
						<tr>
						  <td>6</td>
						  <td><input type="checkbox"></td>
						  <td>035</td>
						  <td>Chris</td>
						  <td>60%</td>
						  <td>XX幼兒園</td>
						  <td><a href="#">追蹤狀況</a></td>
						  <td>
							  <a href="#"><i class="icon-pencil"></i></a>
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


