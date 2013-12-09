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
						<li class="active">專案管理</li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
						<div class="btn-toolbar">
							<a><button class="btn btn-primary" id="transfer_files"><i class="icon-plus"></i>確認</button></a>
						</div>
						<div class="container-fluid">
							<div class="row-fluid">
									<div class="well">
										<table class="table sortable">
											<thead>
												<tr>
													<th><a href="#">#</a></th>
													<th><a href="#">幼稚園</a></th>
													<th><a href="#">班級</a></th>
													<th><a href="#">年級</a></th>
													<th><a href="#">姓名</a></th>
													<th><a href="#">姓別</a></th>
													<th><a href="#">主要語言</a></th>
													<th><a href="#">施測者</a></th>
													<th class="sorttable_nosort">更換</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>鳳山幼稚園</td>
													<td>太陽班</td>
													<td>中班</td>
													<td>王小明</td>
													<td>男</td>
													<td>中文</td>
													<td>Marke</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>鳳山幼稚園</td>
													<td>太陽班</td>
													<td>大班</td>
													<td>王中興</td>
													<td>男</td>
													<td>中文</td>
													<td>Markey</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td>鳳山幼稚園</td>
													<td>向日葵班</td>
													<td>中班</td>
													<td>麥鍾坤</td>
													<td>男</td>
													<td>中文</td>
													<td>Morke</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
													</td>
												</tr>
												<tr>
													<td>4</td>
													<td>鳳山幼稚園</td>
													<td>太陽班</td>
													<td>中班</td>
													<td>楊小儀</td>
													<td>女</td>
													<td>中文</td>
													<td>----</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
													</td>
												</tr>
												<tr>
													<td>5</td>
													<td>鳳山幼稚園</td>
													<td>太陽班</td>
													<td>中班</td>
													<td>蕭天天</td>
													<td>女</td>
													<td>中文</td>
													<td>Tom</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
													</td>
												</tr>
												<tr>
													<td>6</td>
													<td>鳳山幼稚園</td>
													<td>太陽班</td>
													<td>大班</td>
													<td>王曉明</td>
													<td>男</td>
													<td>中文</td>
													<td>Markice</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
													</td>
												</tr>
												<tr>
													<td>7</td>
													<td>鳳山幼稚園</td>
													<td>太陽班</td>
													<td>中班</td>
													<td>田一明</td>
													<td>男</td>
													<td>中文</td>
													<td>Jacke</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
													</td>
												</tr>
												<tr>
													<td>8</td>
													<td>鳳山幼稚園</td>
													<td>太陽班</td>
													<td>中班</td>
													<td>蔡曉明</td>
													<td>男</td>
													<td>中文</td>
													<td>Marke</td>
													<td>
														<a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a>
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
									<div class="well">
										<table class="table sortable">
											<thead>
												<tr>
													<th><a href="#">選擇</a></th>
													<th><a href="#">施測者</a></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
												<tr>
													<td><input type="checkbox"></td>
													<td>Marck</td>
												</tr>
											</tbody>
										</table>
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
				$("[rel=tooltip]").tooltip();
				$(function() {
					$('.demo-cancel-click').click(function(){return false;});
				});
			</script>
		</body>
	</html>


