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
					
					<h1 class="page-title">�M�׺޲z</h1>
				</div>
				
					<ul class="breadcrumb">
						<li><a href="<?=base_url("/Dysarthria/index")?>">����</a> <span class="divider">/</span></li>
						<li class="active">�M�׺޲z</li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
					
						<div class="container-fluid">
							<div class="row-fluid">
								<form action="<?=base_url("projectview_student/project_board")?>" method="post">
									<div class="well">
										<table class="table sortable">
											<thead>
												<tr>
													<th><a href="#">#</a></th>
													<th><a href="#">�M�צW��</a></th>
													<th><a href="#">�H��</a></th>
													<th><a href="#">�a��</a></th>
													<th><a href="#">�M�׺޲z��</a></th>
													<th><a href="#">�M�װ_�l���</a></th>
													<th class="sorttable_nosort">�˵�</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>��������</td>
													<td>25</td>
													<td>��������</td>
													<td>Mark</td>
													<td>2013/10/19</td>
													<td>
														<a href="#" onclick="$(this).closest('form').submit()"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>�c���լd</td>
													<td>40</td>
													<td>�̪F</td>
													<td>Jacky</td>
													<td>2013/10/20</td>
													<td>
														<a href="#" onclick="$(this).closest('form').submit()"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</form>
								
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
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">��</button>
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
				$("[rel=tooltip]").tooltip();
				$(function() {
					$('.demo-cancel-click').click(function(){return false;});
				});
			</script>
		</body>
	</html>


