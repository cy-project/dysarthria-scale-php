<!DOCTYPE html>
<html lang="en">
  <?php
    include "head.php";
  ?> 
  <body> 
  <!--<![endif]-->
    <?
	  include "navbar.php";
	  include "sidebar-nav.php";
	?>
    
    <div class="content">
		<ul class="breadcrumb">
			<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
				<div class="row-fluid">
					<div class="block">
						<p class="block-heading">人員統計</p>
						<div id="page-stats" class="block-body collapse in">

							<div class="stat-widget-container">
								<div class="stat-widget">
									<div class="stat-button">
										<p class="detail">受測者</p>
										<p class="title">2,500(+10)</p>
									</div>
								</div>

								<div class="stat-widget">
									<div class="stat-button">
										<p class="detail">完成率</p>
										<p class="title">80%</p>                        
									</div>
								</div>

								<div class="stat-widget">
									<div class="stat-button">
										<p class="detail">追蹤人數</p>
										<p class="title">1,500(+10)</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row-fluid">
					<div class="block span6">
						<p class="block-heading">權限申請狀況</p>
						<div id="tablewidget" class="block-body collapse in">
							<table class="table">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>姓名</th>
								  <th>申請身分</th>
								  <th>帳號</th>
								  <th>備註</th>
								  <th style="width: 35px;">審核</th>
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
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
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
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
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
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
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
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
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
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
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
									  <a href="#" title="確認"><i class="icon-ok"></i></a>
									  <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
								  </td>
								</tr>
							  </tbody>
							</table>
							<p><a href="users.html">More...</a></p>
						</div>
					</div>
					<div class="block span6">
						<p class="block-heading">最新消息 <a href="<?=base_url("/Dysarthria/news")?>" class="disnon"><span class="label label-important">發布消息</span></a></p>
						<!--a href="index-news.html" class="block-heading" >最新消息 <span class="label label-important">發布消息</span></a-->
						<div id="tablewidget" class="block-body collapse in">
							<table class="table">
							  <thead>
								<tr>
								  <th style="width: 50px;">日期</th>
								  <th>對象</th>
								  <th>標題</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td>2013/09/04</td>
								  <td><span class="label label-warning">全部</span></td>
								  <td>語言治療師研討會</td>
								</tr>
								<tr>
								  <td>2013/09/03</td>
								  <td><span class="label label-info">語言治療師</span></td>
								  <td>會議準備</td>
								</tr>
								<tr>
								  <td>2013/09/02</td>
								  <td><span class="label label-success">教師</span></td>
								  <td>彙整人數</td>
							   </tr>
								 <tr>
								  <td>2013/09/01</td>
								  <td><span class="label label-inverse">大學生</span></td>
								  <td>檔案上傳</td>
								</tr>
								<tr>
								  <td>2013/08/31</td>
								  <td><span class="label label-success">教師</span> <span class="label">其他</span></td>
								  <td>課程報名</td>
								</tr>
								<tr>
								  <td>2013/08/30</td>
								  <td><span class="label label-warning">全部</span></td>
								  <td>資料建檔</td>
								</tr>
							  </tbody>
							</table>
							<p><a href="#">More...</a></p>
						</div>
					</div>
				</div>

				<div class="row-fluid">
						<div class="block span6">
						<p class="block-heading">專案管理</p>
						<div class="block-body">
							<table class="table">
							  <thead>
								<tr>
								  <th style="width: 26px;">#</th>
								  <th>年份</th>
								  <th>學校名稱</th>
								  <th>人數</th>
								  <th>地區</th>
								  <th>專案管理員</th>
								  <th>派遣</th>
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
								  <td><a href="project-dispatch.html">派遣</a></td>
								  <td>
									  <a href="#"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
							  </tbody>
							</table>
						</div>
					</div>
					<div class="block span6">
						<p class="block-heading">追蹤狀況</p>
						<div id="widget2container" class="block-body collapse in">
							<table class="table">
							  <thead>
								<tr>
								  <th>#</th>
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
								  <td>010</td>
								  <td>王小明</td>
								  <td>60%</td>
								  <td>OO幼兒園</td>
								  <td><a href="track.html">追蹤狀況</a></td>
								  <td>
									  <a href="user.html"><i class="icon-pencil"></i></a>
									  <a href="project-data-result.html"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
								<tr>
								  <td>2</td>
								  <td>011</td>
								  <td>Ashley</td>
								  <td>65%</td>
								  <td>OO幼兒園</td>
								  <td><a href="track.html">追蹤狀況</a></td>
								  <td>
									  <a href="user.html"><i class="icon-pencil"></i></a>
									  <a href="#"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
								<tr>
								  <td>3</td>
								  <td>012</td>
								  <td>Audrey</td>
								  <td>55%</td>
								  <td>XX幼兒園</td>
								  <td><a href="track.html">追蹤狀況</a></td>
								  <td>
									  <a href="user.html"><i class="icon-pencil"></i></a>
									  <a href="#"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
								<tr>
								  <td>4</td>
								  <td>015</td>
								  <td>John</td>
								  <td>40%</td>
								  <td>XX幼兒園</td>
								  <td><a href="track.html">追蹤狀況</a></td>
								  <td>
									  <a href="user.html"><i class="icon-pencil"></i></a>
									  <a href="#"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
								<tr>
								  <td>5</td>
								  <td>018</td>
								  <td>Aaron</td>
								  <td>50%</td>
								  <td>OO幼兒園</td>
								  <td><a href="track.html">追蹤狀況</a></td>
								  <td>
									  <a href="user.html"><i class="icon-pencil"></i></a>
									  <a href="#"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
								<tr>
								  <td>6</td>
								  <td>035</td>
								  <td>Chris</td>
								  <td>60%</td>
								  <td>XX幼兒園</td>
								  <td><a href="track.html">追蹤狀況</a></td>
								  <td>
									  <a href="user.html"><i class="icon-pencil"></i></a>
									  <a href="#"><i class="icon-arrow-right"></i></a>
								  </td>
								</tr>
							  </tbody>
							</table>
						</div>
					</div>
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


