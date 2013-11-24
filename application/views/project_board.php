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
		<!-------------------------------------------------------------------------------路徑------------------------------------------------------------------------->
			<div class="header">
				<h1 class="page-title">專案管理</h1>
			</div>
			<ul class="breadcrumb">
				<li><a href="<?=base_url("/Dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
				<li><a href="<?=site_url("/projectadmin/project_home")?>">專案管理</a> <span class="divider">/</span></li>
				<li class="active">幼音評測</li>
			</ul>
			<!-------------------------------------------------------------------------------底線------------------------------------------------------------------------->
			<div class="container-fluid">
			<!-------------------------------------------------------------------------------內容------------------------------------------------------------------------->
				<div class="row-fluid">
					<div class="btn-toolbar">
						<span>
							<a href="<?=base_url("/projectview_admin")?>"><button class="btn btn-primary" id="new_people" onclick="ButtonClick(1)"><i class="icon-plus"></i>新增</button></a>
						</span>
						<span>
							<button class="btn btn-primary" id="dispatch" onclick="ButtonClick(2)'">派遣</button>
						</span>
					</div>
					
					<div class="well" >
						<ul class="nav nav-tabs" style="margin-bottom: 0px;">
							<li class="active" name="board"><a id="practitioner" href="#university_student" data-toggle="tab" onclick="OneClick(1)">施測者</a></li>
							<li name="board" ><a id="subjects" href="#chit" data-toggle="tab" onclick="OneClick(2)">受測者</a></li>
							<li name="board"><a id="evaluators" href="#medical" data-toggle="tab" onclick="OneClick(3)">評測者</a></li>
							<li name="board"><a id="project" href="#project_manager" data-toggle="tab" onclick="OneClick(4)">專案管理員</a></li>
							<li name="board"><a id="project_people" href="#project_members" data-toggle="tab" onclick="OneClick(5)">專案成員</a></li>
							<li name="board"><a id="applicants" href="#application" data-toggle="tab">申請者</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
								<div class="tab-pane active in" id="chit">
									<div class="well" style="border: 0px;">
										<table class="sortable table"><!--受測者-->
											<thead>
												<tr>
													<th><a href="#">#</a></th>
													<th><a href="#">學生姓名</a></th>
													<th><a href="#">年齡</a></th>
													<th><a href="#">班級</a></th>
													<th><a href="#">評分狀況</a></th>
													<th><a href="#">施測者</a></th>
													<th><a href="#">評測者</a></th>
													<th class="sorttable_nosort">編輯</th>
													<th class="sorttable_nosort">檢視</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td id="number_sybjects_1">1</td>
													<td id="name_sybjects_1">王小明</td>
													<td id="age_sybjects_1">7</td>
													<td id="class_sybjects_1">大班</td>
													<td id="fraction_dybjects_1">75%</td>
													<td id="rater_dybjects_1">Mark</td>
													<td id="evaluators_dybjects_1">評測者A</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_2">2</td>
													<td id="name_sybjects_2">李小刀</td>
													<td id="age_sybjects_2">6</td>
													<td id="class_sybjects_2">中班</td>
													<td id="fraction_sybjects_2">65%</td>
													<td id="rater_dybjects_2">Ashley</td>
													<td id="evaluators_sybjects_2">評測者C</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
													<tr>
													<td id="number_sybjects_3">3</td>
													<td id="name_sybjects_3">馬小九</td>
													<td id="age_sybjects_3">6</td>
													<td id="class_sybjects_3">中班</td>
													<td id="fraction_sybjects_3">85%</td>
													<td id="rater_dybjects_3">Mark</td>
													<td id="evaluators_sybjects_3">評測者B</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_4">4</td>
													<td id="name_sybjects_4">周小倫</td>
													<td id="age_sybjects_4">7</td>
													<td id="class_sybjects_4">大班</td>
													<td id="fraction_sybjects_4">90%</td>
													<td id="rater_dybjects_4">Ashley</td>
													<td id="evaluators_sybjects_4">評測者A</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_5">5</td>
													<td id="name_sybjects_5">張大三</td>
													<td id="age_sybjects_5">5</td>
													<td id="class_sybjects_5">小班</td>
													<td id="fraction_sybjects_5">65%</td>
													<td id="rater_dybjects_5">John</td>
													<td id="evaluators_sybjects_5">評測者B</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_6">6</td>
													<td id="name_sybjects_6">李大仁</td>
													<td id="age_sybjects_6">8</td>
													<td id="class_sybjects_6">大班</td>
													<td id="fraction_sybjects_6">95%</td>
													<td id="rater_dybjects_6">John</td>
													<td id="evaluators_sybjects_6">評測者C</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_7">7</td>
													<td id="name_sybjects_7">王小明</td>
													<td id="age_sybjects_7">7</td>
													<td id="class_sybjects_7">大班</td>
													<td id="fraction_dybjects_7">75%</td>
													<td id="rater_dybjects_7">Mark</td>
													<td id="evaluators_dybjects_7">評測者A</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
															<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_8">8</td>
													<td id="name_sybjects_8">李小刀</td>
													<td id="age_sybjects_8">6</td>
													<td id="class_sybjects_8">中班</td>
													<td id="fraction_sybjects_8">65%</td>
													<td id="rater_dybjects_8">Ashley</td>
													<td id="evaluators_sybjects_8">評測者C</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_9">9</td>
													<td id="name_sybjects_9">馬小九</td>
													<td id="age_sybjects_9">6</td>
													<td id="class_sybjects_9">中班</td>
													<td id="fraction_sybjects_9">85%</td>
													<td id="rater_dybjects_9">Mark</td>
													<td id="evaluators_sybjects_9">評測者B</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
												<tr>
													<td id="number_sybjects_10">10</td>
													<td id="name_sybjects_10">周小倫</td>
													<td id="age_sybjects_10">7</td>
													<td id="class_sybjects_10">大班</td>
													<td id="fraction_sybjects_10">90%</td>
													<td id="rater_dybjects_10">Ashley</td>
													<td id="evaluators_sybjects_10">評測者A</td>
													<td>
														<a href="subjects_editor.php"><i class="icon-pencil"></i></a>
													</td>
													<td>
														<a href="subjects_view"><i class="icon-eye-open"></i></a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							<div class="tab-pane fade" id="university_student"><!--施測者-->
								<div class="well" style="border: 0px;">
									<table class="sortable table">
										<thead>
												<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">姓名</a></th>
												<th><a href="#">專案權限</a></th>
												<th><a href="#">施測期限</a></th>
												<th class="sorttable_nosort" onclick="checkall()"><a href="#">派遣(全選)</a></th>
												<th class="sorttable_nosort">編輯</th>
											</tr>
											</thead>
										<tbody>
											<tr>
												<td id="number_surveying_1">1</td>
												<td id="name_surveying_1">Mark</td>
												<td id="competence_surveying_1">大學生</td>
												<td id="time_surveying_1">2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="1">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Ashley</td>
												<td>教師</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="2">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Audrey</td>
												<td>大學生</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="3">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>John</td>
												<td>大學生</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="4">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>Aaron</td>
												<td>語言治療師</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="5">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
												</tr>
											<tr>
												<td>6</td>
												<td>Chris</td>
												<td>教師</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="6">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>Mark</td>
												<td>大學生</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="7">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>Ashley</td>
												<td>教師</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="8">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>Audrey</td>
												<td>大學生</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="9">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>John</td>
												<td>大學生</td>
												<td>2013-11-11</td>
												<td>
													<input type="checkbox" name="selected" value="10">
												</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="medical">
								<div class="well" style="border: 0px;">
									<table class="sortable table"><!--評測者-->
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">帳號</a></th>
												<th><a href="#">姓名</a></th>
												<th><a href="#">身份</a></th>
												<th class="sorttable_nosort">備註</th>
												<th class="sorttable_nosort">編輯</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Manrye</td>
												<td>Aebj123</td>
												<td>語言治療師</td>
												<td>xx診所醫生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
												<tr>
												<td>2</td>
												<td>Mandle</td>
												<td>Ae78983</td>
												<td>實習生</td>
												<td>STU學生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Tommy</td>
												<td>Aeb4563</td>
												<td>語言治療師</td>
												<td>oo診所醫生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>Jacke</td>
												<td>Aebj563</td>
												<td>實習生</td>
												<td>STU學生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>Jacky</td>
												<td>Aebj463</td>
												<td>語言治療師</td>
												<td>yy診所醫生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>Tom</td>
												<td>Aebj178</td>
												<td>實習生</td>
												<td>STU學生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>Manrye</td>
												<td>Aebj123</td>
												<td>語言治療師</td>
												<td>xx診所醫生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>Mandle</td>
												<td>Ae78983</td>
												<td>實習生</td>
												<td>STU學生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>Tommy</td>
												<td>Aeb4563</td>
												<td>語言治療師</td>
												<td>oo診所醫生</td>
												<td>
														<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>Jacke</td>
												<td>Aebj563</td>
												<td>實習生</td>
												<td>STU學生</td>
												<td>
													<a href="project_see.php"><i class="icon-pencil"></i></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="project_manager">
								<div class="well" style="border: 0px;">
									<table class="sortable table"><!--專案管理員-->
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">姓名</a></th>
												<th><a href="#">帳號</a></th>
												<th><a href="#">身份</a></th>
												<th class="sorttable_nosort">備註</th>
											</tr>
										</thead>
										<tbody>
											<tr>
											<td>1</td>
											<td>Mark</td>
											<td>the_mark7</td>
											<td>助教</td>
											<td>STU學生</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="project_members">
								<div class="well" style="border: 0px;">
									<table class="sortable table"><!--專案成員-->
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">姓名</a></th>
												<th><a href="#">身份</a></th>
												<th><a href="#">帳號</a></th>
												<th class="sorttable_nosort">備註</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Mark</td>
												<td>大學生</td>
												<td>the_mark7</td>
												<td>STU學生</td>
												</tr>
											<tr>
												<td>2</td>
												<td>Ashley</td>
												<td>教師</td>
												<td>ash11927</td>
												<td>桃園OO幼兒園教師</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Audrey</td>
												<td>大學生</td>
												<td>audann84</td>
												<td></td>
											</tr>
											<tr>
												<td>4</td>
												<td>John</td>
												<td>大學生</td>
												<td>jr5527</td>
												<td></td>
											</tr>
											<tr>
												<td>5</td>
												<td>Aaron</td>
												<td>語言治療師</td>
												<td>aaron_butler</td>
												<td></td>
											</tr>
												<tr>
												<td>6</td>
												<td>Chris</td>
												<td>教師</td>
												<td>cab79</td>
												<td></td>
											</tr>
											<tr>
												<td>7</td>
												<td>Mark</td>
												<td>大學生</td>
												<td>the_mark7</td>
												<td>STU學生</td>
												<td>
												</tr>
											<tr>
												<td>8</td>
												<td>Ashley</td>
												<td>教師</td>
												<td>ash11927</td>
												<td>桃園OO幼兒園教師</td>
												<td>
											</tr>
											<tr>
												<td>9</td>
												<td>Audrey</td>
												<td>大學生</td>
												<td>audann84</td>
												<td></td>
											</tr>
											<tr>
												<td>10</td>
												<td>John</td>
												<td>大學生</td>
												<td>jr5527</td>
												<td></td>
											</tr>
										</tbody>
										</table>
								</div>
							</div>
							<div class="tab-pane fade" id="application">
								<div class="well" style="border: 0px;">
									<table class="sortable table"><!--申請者-->
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">姓名</a></th>
												<th><a href="#">申請身分</a></th>
												<th><a href="#">帳號</a></th>
												<th class="sorttable_nosort">備註</th>
												<th class="sorttable_nosort">確認</th>
												<th class="sorttable_nosort">取消</th>
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
												<tr>
												<td>7</td>
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
												<td>8</td>
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
												<td>9</td>
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
												<td>10</td>
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
										</tbody>
									</table>
								</div>
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
					</div>
					<!-------------------------------------------------------------------------------底線------------------------------------------------------------------------->
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
			var count=1;
			function ButtonClick(i){
				var count_botton=i;
				if(count_botton==1){
					$.cookie("name_button", count_botton);
					$closest('form').submit();
				}else if(count_botton==2){
					$.cookie("name_button", count_botton);
					$closest('form').submit();
				}
			}
			function OneClick(i) {
				var name=i;
				$.cookie("name", name);
			}
			function checkall() {
				checkboxes = document.getElementsByName('selected');
				for(var i=0, n=checkboxes.length;i<=n;i++) 
				{
					if(i==n){
						count=count+1;
					}
					if((count%2)==0)
					{
						checkboxes[i].checked = false;
					}
					else
					{
						checkboxes[i].checked = true;
					}
					
				}
			}
		</script>
		<script>
				$( "#subjects" ).click(function() {
					$( "#dispatch:last-child" ).hide();
					$( "#new_people" ).show();
				});
				$( "#practitioner" ).click(function() {
					$( "#new_people" ).show();
					$( "#dispatch" ).show();
				});
				$( "#evaluators" ).click(function() {
					$( "#dispatch:last-child" ).hide();
					$( "#new_people" ).show();
				});
				$( "#project" ).click(function() {
					$( "#dispatch:last-child" ).hide();
					$( "#new_people" ).show();
				});
				$( "#project_people" ).click(function() {
					$( "#dispatch:last-child" ).hide();
					$( "#new_people" ).show();
				});
				$( "#applicants" ).click(function() {
					$( "#dispatch:last-child" ).hide();
					$( "#new_people:last-child" ).hide();
				});
		</script>
		<script src="lib/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
	</body>
</html>


