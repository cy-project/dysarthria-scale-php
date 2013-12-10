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
					
					<h1 class="page-title">專案新增</h1>
				</div>
				
					<ul class="breadcrumb">
						<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
						<li><a href="<?=site_url("/projectadmin/project_home")?>">專案管理</a> <span class="divider">/</span></li>
						<li class="active">專案新增</li>
					</ul>

				<div class="container-fluid">
					<div class="row-fluid">
						<div class="container-fluid">
							<div class="row-fluid">
								<form action="<?=base_url("/projectview_admin/new_project_board")?>" method="post">
									<div class="btn-toolbar">
										<button class="btn btn-primary" id="new_people" onclick="$(this).closest('form').submit()"><i class="icon-plus"></i>建立</button>
									</div>
									<div class="well">
										<ul class="nav nav-tabs" style="margin-bottom: 0px;">
											<li class="active"><a data-toggle="tab">專案資料</a></li>
										</ul>
										<div class="tab-pane active in" id="chit">
											<div class="well" style="border: 0px;">
												<label>權限</label>
												<select name="purview" id="purview" class="input-xlarge">
													<option selected="selected" value="1">公開(預設)</option>
													<option value="2">私人</option>
												</select>
												<label>專案名稱</label>
												<input type="text" name="ProjectName" class="input-xlarge">
												<label>所在縣市</label>
												<select name="Counties" id="Counties" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option value="100 台北市 中正區">100 台北市 中正區</option>
													<option value="103 台北市 大同區">103 台北市 大同區</option>
													<option value="104 台北市 中山區">104 台北市 中山區</option>
													<option value="105 台北市 松山區">105 台北市 松山區</option>
													<option value="106 台北市 大安區">106 台北市 大安區</option>
													<option value="108 台北市 萬華區">108 台北市 萬華區</option>
													<option value="110 台北市 信義區">110 台北市 信義區</option>
													<option value="111 台北市 士林區">111 台北市 士林區</option>
													<option value="112 台北市 北投區">112 台北市 北投區</option>
													<option value="114 台北市 內湖區">114 台北市 內湖區</option>
													<option value="115 台北市 南港區">115 台北市 南港區</option>
													<option value="116 台北市 文山區">116 台北市 文山區</option>
													<option value="200 基隆市 仁愛區">200 基隆市 仁愛區</option>
													<option value="201 基隆市 信義區">201 基隆市 信義區</option>
													<option value="202 基隆市 中正區">202 基隆市 中正區</option>
													<option value="203 基隆市 中山區">203 基隆市 中山區</option>
													<option value="204 基隆市 安樂區">204 基隆市 安樂區</option>
													<option value="205 基隆市 暖暖區">205 基隆市 暖暖區</option>
													<option value="206 基隆市 七堵區">206 基隆市 七堵區</option>
													<option value="207 新北市 萬里區">207 新北市 萬里區</option>
													<option value="208 新北市 金山區">208 新北市 金山區</option>
													<option value="220 新北市 板橋區">220 新北市 板橋區</option>
													<option value="221 新北市 汐止區">221 新北市 汐止區</option>
													<option value="222 新北市 深坑區">222 新北市 深坑區</option>
													<option value="223 新北市 石碇區">223 新北市 石碇區</option>
													<option value="224 新北市 瑞芳區">224 新北市 瑞芳區</option>
													<option value="226 新北市 平溪區">226 新北市 平溪區</option>
													<option value="227 新北市 雙溪區">227 新北市 雙溪區</option>
													<option value="228 新北市 貢寮區">228 新北市 貢寮區</option>
													<option value="231 新北市 新店區">231 新北市 新店區</option>
													<option value="232 新北市 坪林區">232 新北市 坪林區</option>
													<option value="233 新北市 烏來區">233 新北市 烏來區</option>
													<option value="234 新北市 永和區">234 新北市 永和區</option>
													<option value="235 新北市 中和區">235 新北市 中和區</option>
													<option value="236 新北市 土城區">236 新北市 土城區</option>
													<option value="237 新北市 三峽區">237 新北市 三峽區</option>
													<option value="238 新北市 樹林區">238 新北市 樹林區</option>
													<option value="239 新北市 鶯歌區">239 新北市 鶯歌區</option>
													<option value="241 新北市 三重區">241 新北市 三重區</option>
													<option value="242 新北市 新莊區">242 新北市 新莊區</option>
													<option value="243 新北市 泰山區">243 新北市 泰山區</option>
													<option value="244 新北市 林口區">244 新北市 林口區</option>
													<option value="247 新北市 蘆洲區">247 新北市 蘆洲區</option>
													<option value="248 新北市 五股區">248 新北市 五股區</option>
													<option value="249 新北市 八里區">249 新北市 八里區</option>
													<option value="251 新北市 淡水區">251 新北市 淡水區</option>
													<option value="252 新北市 三芝區">252 新北市 三芝區</option>
													<option value="253 新北市 石門區">253 新北市 石門區</option>
													<option value="260 宜蘭縣 宜蘭市">260 宜蘭縣 宜蘭市</option>
													<option value="261 宜蘭縣 頭城鎮">261 宜蘭縣 頭城鎮</option>
													<option value="262 宜蘭縣 礁溪鄉">262 宜蘭縣 礁溪鄉</option>
													<option value="263 宜蘭縣 壯圍鄉">263 宜蘭縣 壯圍鄉</option>
													<option value="264 宜蘭縣 員山鄉">264 宜蘭縣 員山鄉</option>
													<option value="265 宜蘭縣 羅東鎮">265 宜蘭縣 羅東鎮</option>
													<option value="266 宜蘭縣 三星鄉">266 宜蘭縣 三星鄉</option>
													<option value="267 宜蘭縣 大同鄉">267 宜蘭縣 大同鄉</option>
													<option value="268 宜蘭縣 五結鄉">268 宜蘭縣 五結鄉</option>
													<option value="269 宜蘭縣 冬山鄉">269 宜蘭縣 冬山鄉</option>
													<option value="270 宜蘭縣 蘇澳鎮">270 宜蘭縣 蘇澳鎮</option>
													<option value="272 宜蘭縣 南澳鄉">272 宜蘭縣 南澳鄉</option>
													<option value="300 新竹市 北區">300 新竹市 北區</option>
													<option value="300 新竹市 東區">300 新竹市 東區</option>
													<option value="300 新竹市 香山區">300 新竹市 香山區</option>
													<option value="300 新竹市 ">300 新竹市 </option>
													<option value="302 新竹縣 竹北市">302 新竹縣 竹北市</option>
													<option value="303 新竹縣 湖口鄉">303 新竹縣 湖口鄉</option>
													<option value="304 新竹縣 新豐鄉">304 新竹縣 新豐鄉</option>
													<option value="305 新竹縣 新埔鎮">305 新竹縣 新埔鎮</option>
													<option value="306 新竹縣 關西鎮">306 新竹縣 關西鎮</option>
													<option value="307 新竹縣 芎林鄉">307 新竹縣 芎林鄉</option>
													<option value="308 新竹縣 寶山鄉">308 新竹縣 寶山鄉</option>
													<option value="310 新竹縣 竹東鎮">310 新竹縣 竹東鎮</option>
													<option value="311 新竹縣 五峰鄉">311 新竹縣 五峰鄉</option>
													<option value="312 新竹縣 橫山鄉">312 新竹縣 橫山鄉</option>
													<option value="313 新竹縣 尖石鄉">313 新竹縣 尖石鄉</option>
													<option value="314 新竹縣 北埔鄉">314 新竹縣 北埔鄉</option>
													<option value="315 新竹縣 峨眉鄉">315 新竹縣 峨眉鄉</option>
													<option value="320 桃園縣 中壢市">320 桃園縣 中壢市</option>
													<option value="324 桃園縣 平鎮市">324 桃園縣 平鎮市</option>
													<option value="325 桃園縣 龍潭鄉">325 桃園縣 龍潭鄉</option>
													<option value="326 桃園縣 楊梅市">326 桃園縣 楊梅市</option>
													<option value="327 桃園縣 新屋鄉">327 桃園縣 新屋鄉</option>
													<option value="328 桃園縣 觀音鄉">328 桃園縣 觀音鄉</option>
													<option value="330 桃園縣 桃園市">330 桃園縣 桃園市</option>
													<option value="333 桃園縣 龜山鄉">333 桃園縣 龜山鄉</option>
													<option value="334 桃園縣 八德市">334 桃園縣 八德市</option>
													<option value="335 桃園縣 大溪鎮">335 桃園縣 大溪鎮</option>
													<option value="336 桃園縣 復興鄉">336 桃園縣 復興鄉</option>
													<option value="337 桃園縣 大園鄉">337 桃園縣 大園鄉</option>
													<option value="338 桃園縣 蘆竹鄉">338 桃園縣 蘆竹鄉</option>
													<option value="350 苗栗縣 竹南鎮">350 苗栗縣 竹南鎮</option>
													<option value="351 苗栗縣 頭份鎮">351 苗栗縣 頭份鎮</option>
													<option value="352 苗栗縣 三灣鄉">352 苗栗縣 三灣鄉</option>
													<option value="353 苗栗縣 南庄鄉">353 苗栗縣 南庄鄉</option>
													<option value="354 苗栗縣 獅潭鄉">354 苗栗縣 獅潭鄉</option>
													<option value="356 苗栗縣 後龍鎮">356 苗栗縣 後龍鎮</option>
													<option value="357 苗栗縣 通霄鎮">357 苗栗縣 通霄鎮</option>
													<option value="358 苗栗縣 苑裡鎮">358 苗栗縣 苑裡鎮</option>
													<option value="360 苗栗縣 苗栗市">360 苗栗縣 苗栗市</option>
													<option value="361 苗栗縣 造橋鄉">361 苗栗縣 造橋鄉</option>
													<option value="362 苗栗縣 頭屋鄉">362 苗栗縣 頭屋鄉</option>
													<option value="363 苗栗縣 公館鄉">363 苗栗縣 公館鄉</option>
													<option value="364 苗栗縣 大湖鄉">364 苗栗縣 大湖鄉</option>
													<option value="365 苗栗縣 泰安鄉">365 苗栗縣 泰安鄉</option>
													<option value="366 苗栗縣 銅鑼鄉">366 苗栗縣 銅鑼鄉</option>
													<option value="367 苗栗縣 三義鄉">367 苗栗縣 三義鄉</option>
													<option value="368 苗栗縣 西湖鄉">368 苗栗縣 西湖鄉</option>
													<option value="369 苗栗縣 卓蘭鎮">369 苗栗縣 卓蘭鎮</option>
													<option value="400 台中市 中區">400 台中市 中區</option>
													<option value="401 台中市 東區">401 台中市 東區</option>
													<option value="402 台中市 南區">402 台中市 南區</option>
													<option value="403 台中市 西區">403 台中市 西區</option>
													<option value="404 台中市 北區">404 台中市 北區</option>
													<option value="406 台中市 北屯區">406 台中市 北屯區</option>
													<option value="407 台中市 西屯區">407 台中市 西屯區</option>
													<option value="408 台中市 南屯區">408 台中市 南屯區</option>
													<option value="411 台中市 太平區">411 台中市 太平區</option>
													<option value="412 台中市 大里區">412 台中市 大里區</option>
													<option value="413 台中市 霧峰區">413 台中市 霧峰區</option>
													<option value="414 台中市 烏日區">414 台中市 烏日區</option>
													<option value="420 台中市 豐原區">420 台中市 豐原區</option>
													<option value="421 台中市 后里區">421 台中市 后里區</option>
													<option value="422 台中市 石岡區">422 台中市 石岡區</option>
													<option value="423 台中市 東勢區">423 台中市 東勢區</option>
													<option value="424 台中市 和平區">424 台中市 和平區</option>
													<option value="426 台中市 新社區">426 台中市 新社區</option>
													<option value="427 台中市 潭子區">427 台中市 潭子區</option>
													<option value="428 台中市 大雅區">428 台中市 大雅區</option>
													<option value="429 台中市 神岡區">429 台中市 神岡區</option>
													<option value="432 台中市 大肚區">432 台中市 大肚區</option>
													<option value="433 台中市 沙鹿區">433 台中市 沙鹿區</option>
													<option value="434 台中市 龍井區">434 台中市 龍井區</option>
													<option value="435 台中市 梧棲區">435 台中市 梧棲區</option>
													<option value="436 台中市 清水區">436 台中市 清水區</option>
													<option value="437 台中市 大甲區">437 台中市 大甲區</option>
													<option value="438 台中市 外埔區">438 台中市 外埔區</option>
													<option value="439 台中市 大安區">439 台中市 大安區</option>
													<option value="500 彰化縣 彰化市">500 彰化縣 彰化市</option>
													<option value="502 彰化縣 芬園鄉">502 彰化縣 芬園鄉</option>
													<option value="503 彰化縣 花壇鄉">503 彰化縣 花壇鄉</option>
													<option value="504 彰化縣 秀水鄉">504 彰化縣 秀水鄉</option>
													<option value="505 彰化縣 鹿港鎮">505 彰化縣 鹿港鎮</option>
													<option value="506 彰化縣 福興鄉">506 彰化縣 福興鄉</option>
													<option value="507 彰化縣 線西鄉">507 彰化縣 線西鄉</option>
													<option value="508 彰化縣 和美鎮">508 彰化縣 和美鎮</option>
													<option value="509 彰化縣 伸港鄉">509 彰化縣 伸港鄉</option>
													<option value="510 彰化縣 員林鎮">510 彰化縣 員林鎮</option>
													<option value="511 彰化縣 社頭鄉">511 彰化縣 社頭鄉</option>
													<option value="512 彰化縣 永靖鄉">512 彰化縣 永靖鄉</option>
													<option value="513 彰化縣 埔心鄉">513 彰化縣 埔心鄉</option>
													<option value="514 彰化縣 溪湖鎮">514 彰化縣 溪湖鎮</option>
													<option value="515 彰化縣 大村鄉">515 彰化縣 大村鄉</option>
													<option value="516 彰化縣 埔鹽鄉">516 彰化縣 埔鹽鄉</option>
													<option value="520 彰化縣 田中鎮">520 彰化縣 田中鎮</option>
													<option value="521 彰化縣 北斗鎮">521 彰化縣 北斗鎮</option>
													<option value="522 彰化縣 田尾鄉">522 彰化縣 田尾鄉</option>
													<option value="523 彰化縣 埤頭鄉">523 彰化縣 埤頭鄉</option>
													<option value="524 彰化縣 溪州鄉">524 彰化縣 溪州鄉</option>
													<option value="525 彰化縣 竹塘鄉">525 彰化縣 竹塘鄉</option>
													<option value="526 彰化縣 二林鎮">526 彰化縣 二林鎮</option>
													<option value="527 彰化縣 大城鄉">527 彰化縣 大城鄉</option>
													<option value="528 彰化縣 芳苑鄉">528 彰化縣 芳苑鄉</option>
													<option value="530 彰化縣 二水鄉">530 彰化縣 二水鄉</option>
													<option value="540 南投縣 南投市">540 南投縣 南投市</option>
													<option value="541 南投縣 中寮鄉">541 南投縣 中寮鄉</option>
													<option value="542 南投縣 草屯鎮">542 南投縣 草屯鎮</option>
													<option value="544 南投縣 國姓鄉">544 南投縣 國姓鄉</option>
													<option value="545 南投縣 埔里鎮">545 南投縣 埔里鎮</option>
													<option value="546 南投縣 仁愛鄉">546 南投縣 仁愛鄉</option>
													<option value="551 南投縣 名間鄉">551 南投縣 名間鄉</option>
													<option value="552 南投縣 集集鎮">552 南投縣 集集鎮</option>
													<option value="553 南投縣 水里鄉">553 南投縣 水里鄉</option>
													<option value="555 南投縣 魚池鄉">555 南投縣 魚池鄉</option>
													<option value="556 南投縣 信義鄉">556 南投縣 信義鄉</option>
													<option value="557 南投縣 竹山鎮">557 南投縣 竹山鎮</option>
													<option value="558 南投縣 鹿谷鄉">558 南投縣 鹿谷鄉</option>
													<option value="600 嘉義市 西區">600 嘉義市 西區</option>
													<option value="600 嘉義市 東區">600 嘉義市 東區</option>
													<option value="602 嘉義縣 番路鄉">602 嘉義縣 番路鄉</option>
													<option value="603 嘉義縣 梅山鄉">603 嘉義縣 梅山鄉</option>
													<option value="604 嘉義縣 竹崎鄉">604 嘉義縣 竹崎鄉</option>
													<option value="605 嘉義縣 阿里山鄉">605 嘉義縣 阿里山鄉</option>
													<option value="606 嘉義縣 中埔鄉">606 嘉義縣 中埔鄉</option>
													<option value="607 嘉義縣 大埔鄉">607 嘉義縣 大埔鄉</option>
													<option value="608 嘉義縣 水上鄉">608 嘉義縣 水上鄉</option>
													<option value="611 嘉義縣 鹿草鄉">611 嘉義縣 鹿草鄉</option>
													<option value="612 嘉義縣 太保市">612 嘉義縣 太保市</option>
													<option value="613 嘉義縣 朴子市">613 嘉義縣 朴子市</option>
													<option value="614 嘉義縣 東石鄉">614 嘉義縣 東石鄉</option>
													<option value="615 嘉義縣 六腳鄉">615 嘉義縣 六腳鄉</option>
													<option value="616 嘉義縣 新港鄉">616 嘉義縣 新港鄉</option>
													<option value="621 嘉義縣 民雄鄉">621 嘉義縣 民雄鄉</option>
													<option value="622 嘉義縣 大林鎮">622 嘉義縣 大林鎮</option>
													<option value="623 嘉義縣 溪口鄉">623 嘉義縣 溪口鄉</option>
													<option value="624 嘉義縣 義竹鄉">624 嘉義縣 義竹鄉</option>
													<option value="625 嘉義縣 布袋鎮">625 嘉義縣 布袋鎮</option>
													<option value="630 雲林縣 斗南鎮">630 雲林縣 斗南鎮</option>
													<option value="631 雲林縣 大埤鄉">631 雲林縣 大埤鄉</option>
													<option value="632 雲林縣 虎尾鎮">632 雲林縣 虎尾鎮</option>
													<option value="633 雲林縣 土庫鎮">633 雲林縣 土庫鎮</option>
													<option value="634 雲林縣 褒忠鄉">634 雲林縣 褒忠鄉</option>
													<option value="635 雲林縣 東勢鄉">635 雲林縣 東勢鄉</option>
													<option value="636 雲林縣 台西鄉">636 雲林縣 台西鄉</option>
													<option value="637 雲林縣 崙背鄉">637 雲林縣 崙背鄉</option>
													<option value="638 雲林縣 麥寮鄉">638 雲林縣 麥寮鄉</option>
													<option value="640 雲林縣 斗六市">640 雲林縣 斗六市</option>
													<option value="643 雲林縣 林內鄉">643 雲林縣 林內鄉</option>
													<option value="646 雲林縣 古坑鄉">646 雲林縣 古坑鄉</option>
													<option value="647 雲林縣 莿桐鄉">647 雲林縣 莿桐鄉</option>
													<option value="648 雲林縣 西螺鎮">648 雲林縣 西螺鎮</option>
													<option value="649 雲林縣 二崙鄉">649 雲林縣 二崙鄉</option>
													<option value="651 雲林縣 北港鎮">651 雲林縣 北港鎮</option>
													<option value="652 雲林縣 水林鄉">652 雲林縣 水林鄉</option>
													<option value="653 雲林縣 口湖鄉">653 雲林縣 口湖鄉</option>
													<option value="654 雲林縣 四湖鄉">654 雲林縣 四湖鄉</option>
													<option value="655 雲林縣 元長鄉">655 雲林縣 元長鄉</option>
													<option value="700 台南市 中西區">700 台南市 中西區</option>
													<option value="701 台南市 東區">701 台南市 東區</option>
													<option value="702 台南市 南區">702 台南市 南區</option>
													<option value="704 台南市 北區">704 台南市 北區</option>
													<option value="708 台南市 安平區">708 台南市 安平區</option>
													<option value="709 台南市 安南區">709 台南市 安南區</option>
													<option value="710 台南市 永康區">710 台南市 永康區</option>
													<option value="711 台南市 歸仁區">711 台南市 歸仁區</option>
													<option value="712 台南市 新化區">712 台南市 新化區</option>
													<option value="713 台南市 左鎮區">713 台南市 左鎮區</option>
													<option value="714 台南市 玉井區">714 台南市 玉井區</option>
													<option value="715 台南市 楠西區">715 台南市 楠西區</option>
													<option value="716 台南市 南化區">716 台南市 南化區</option>
													<option value="717 台南市 仁德區">717 台南市 仁德區</option>
													<option value="718 台南市 關廟區">718 台南市 關廟區</option>
													<option value="719 台南市 龍崎區">719 台南市 龍崎區</option>
													<option value="720 台南市 官田區">720 台南市 官田區</option>
													<option value="721 台南市 麻豆區">721 台南市 麻豆區</option>
													<option value="722 台南市 佳里區">722 台南市 佳里區</option>
													<option value="723 台南市 西港區">723 台南市 西港區</option>
													<option value="724 台南市 七股區">724 台南市 七股區</option>
													<option value="725 台南市 將軍區">725 台南市 將軍區</option>
													<option value="726 台南市 學甲區">726 台南市 學甲區</option>
													<option value="727 台南市 北門區">727 台南市 北門區</option>
													<option value="730 台南市 新營區">730 台南市 新營區</option>
													<option value="731 台南市 後壁區">731 台南市 後壁區</option>
													<option value="732 台南市 白河區">732 台南市 白河區</option>
													<option value="733 台南市 東山區">733 台南市 東山區</option>
													<option value="734 台南市 六甲區">734 台南市 六甲區</option>
													<option value="735 台南市 下營區">735 台南市 下營區</option>
													<option value="736 台南市 柳營區">736 台南市 柳營區</option>
													<option value="737 台南市 鹽水區">737 台南市 鹽水區</option>
													<option value="741 台南市 善化區">741 台南市 善化區</option>
													<option value="742 台南市 大內區">742 台南市 大內區</option>
													<option value="743 台南市 山上區">743 台南市 山上區</option>
													<option value="744 台南市 新市區">744 台南市 新市區</option>
													<option value="745 台南市 安定區">745 台南市 安定區</option>
													<option value="800 高雄市 新興區">800 高雄市 新興區</option>
													<option value="801 高雄市 前金區">801 高雄市 前金區</option>
													<option value="802 高雄市 苓雅區">802 高雄市 苓雅區</option>
													<option value="803 高雄市 鹽埕區">803 高雄市 鹽埕區</option>
													<option value="804 高雄市 鼓山區">804 高雄市 鼓山區</option>
													<option value="805 高雄市 旗津區">805 高雄市 旗津區</option>
													<option value="806 高雄市 前鎮區">806 高雄市 前鎮區</option>
													<option value="807 高雄市 三民區">807 高雄市 三民區</option>
													<option value="811 高雄市 楠梓區">811 高雄市 楠梓區</option>
													<option value="812 高雄市 小港區">812 高雄市 小港區</option>
													<option value="813 高雄市 左營區">813 高雄市 左營區</option>
													<option value="814 高雄市 仁武區">814 高雄市 仁武區</option>
													<option value="815 高雄市 大社區">815 高雄市 大社區</option>
													<option value="820 高雄市 岡山區">820 高雄市 岡山區</option>
													<option value="821 高雄市 路竹區">821 高雄市 路竹區</option>
													<option value="822 高雄市 阿蓮區">822 高雄市 阿蓮區</option>
													<option value="823 高雄市 田寮區">823 高雄市 田寮區</option>
													<option value="824 高雄市 燕巢區">824 高雄市 燕巢區</option>
													<option value="825 高雄市 橋頭區">825 高雄市 橋頭區</option>
													<option value="826 高雄市 梓官區">826 高雄市 梓官區</option>
													<option value="827 高雄市 彌陀區">827 高雄市 彌陀區</option>
													<option value="828 高雄市 永安區">828 高雄市 永安區</option>
													<option value="829 高雄市 湖內區">829 高雄市 湖內區</option>
													<option value="830 高雄市 鳳山區">830 高雄市 鳳山區</option>
													<option value="831 高雄市 大寮區">831 高雄市 大寮區</option>
													<option value="832 高雄市 林園區">832 高雄市 林園區</option>
													<option value="833 高雄市 鳥松區">833 高雄市 鳥松區</option>
													<option value="840 高雄市 大樹區">840 高雄市 大樹區</option>
													<option value="842 高雄市 旗山區">842 高雄市 旗山區</option>
													<option value="843 高雄市 美濃區">843 高雄市 美濃區</option>
													<option value="844 高雄市 六龜區">844 高雄市 六龜區</option>
													<option value="845 高雄市 內門區">845 高雄市 內門區</option>
													<option value="846 高雄市 杉林區">846 高雄市 杉林區</option>
													<option value="847 高雄市 甲仙區">847 高雄市 甲仙區</option>
													<option value="848 高雄市 桃源">848 高雄市 桃源</option>
													<option value="849 高雄市 那瑪夏區">849 高雄市 那瑪夏區</option>
													<option value="851 高雄市 茂林區">851 高雄市 茂林區</option>
													<option value="852 高雄市 茄萣區">852 高雄市 茄萣區</option>
													<option value="880 澎湖縣 馬公市">880 澎湖縣 馬公市</option>
													<option value="881 澎湖縣 西嶼鄉">881 澎湖縣 西嶼鄉</option>
													<option value="882 澎湖縣 望安鄉">882 澎湖縣 望安鄉</option>
													<option value="883 澎湖縣 七美鄉">883 澎湖縣 七美鄉</option>
													<option value="884 澎湖縣 白沙鄉">884 澎湖縣 白沙鄉</option>
													<option value="885 澎湖縣 湖西鄉">885 澎湖縣 湖西鄉</option>
													<option value="900 屏東縣 屏東市">900 屏東縣 屏東市</option>
													<option value="901 屏東縣 三地門">901 屏東縣 三地門</option>
													<option value="902 屏東縣 霧臺鄉">902 屏東縣 霧臺鄉</option>
													<option value="903 屏東縣 瑪家鄉">903 屏東縣 瑪家鄉</option>
													<option value="904 屏東縣 九如鄉">904 屏東縣 九如鄉</option>
													<option value="905 屏東縣 里港鄉">905 屏東縣 里港鄉</option>
													<option value="906 屏東縣 高樹鄉">906 屏東縣 高樹鄉</option>
													<option value="907 屏東縣 盬埔鄉">907 屏東縣 盬埔鄉</option>
													<option value="908 屏東縣 長治鄉">908 屏東縣 長治鄉</option>
													<option value="909 屏東縣 麟洛鄉">909 屏東縣 麟洛鄉</option>
													<option value="911 屏東縣 竹田鄉">911 屏東縣 竹田鄉</option>
													<option value="912 屏東縣 內埔鄉">912 屏東縣 內埔鄉</option>
													<option value="913 屏東縣 萬丹鄉">913 屏東縣 萬丹鄉</option>
													<option value="920 屏東縣 潮州鎮">920 屏東縣 潮州鎮</option>
													<option value="921 屏東縣 泰武鄉">921 屏東縣 泰武鄉</option>
													<option value="922 屏東縣 來義鄉">922 屏東縣 來義鄉</option>
													<option value="923 屏東縣 萬巒鄉">923 屏東縣 萬巒鄉</option>
													<option value="924 屏東縣 崁頂鄉">924 屏東縣 崁頂鄉</option>
													<option value="925 屏東縣 新埤鄉">925 屏東縣 新埤鄉</option>
													<option value="926 屏東縣 南州鄉">926 屏東縣 南州鄉</option>
													<option value="927 屏東縣 林邊鄉">927 屏東縣 林邊鄉</option>
													<option value="928 屏東縣 東港鎮">928 屏東縣 東港鎮</option>
													<option value="929 屏東縣 琉球鄉">929 屏東縣 琉球鄉</option>
													<option value="931 屏東縣 佳冬鄉">931 屏東縣 佳冬鄉</option>
													<option value="932 屏東縣 新園鄉">932 屏東縣 新園鄉</option>
													<option value="940 屏東縣 枋寮鄉">940 屏東縣 枋寮鄉</option>
													<option value="941 屏東縣 枋山鄉">941 屏東縣 枋山鄉</option>
													<option value="942 屏東縣 春日鄉">942 屏東縣 春日鄉</option>
													<option value="943 屏東縣 獅子鄉">943 屏東縣 獅子鄉</option>
													<option value="944 屏東縣 車城鄉">944 屏東縣 車城鄉</option>
													<option value="945 屏東縣 牡丹鄉">945 屏東縣 牡丹鄉</option>
													<option value="946 屏東縣 恆春鎮">946 屏東縣 恆春鎮</option>
													<option value="947 屏東縣 滿州鄉">947 屏東縣 滿州鄉</option>
													<option value="950 台東縣 台東市">950 台東縣 台東市</option>
													<option value="951 台東縣 綠島鄉">951 台東縣 綠島鄉</option>
													<option value="952 台東縣 蘭嶼鄉">952 台東縣 蘭嶼鄉</option>
													<option value="953 台東縣 延平鄉">953 台東縣 延平鄉</option>
													<option value="954 台東縣 卑南鄉">954 台東縣 卑南鄉</option>
													<option value="955 台東縣 鹿野鄉">955 台東縣 鹿野鄉</option>
													<option value="956 台東縣 關山鎮">956 台東縣 關山鎮</option>
													<option value="957 台東縣 海端鄉">957 台東縣 海端鄉</option>
													<option value="958 台東縣 池上鄉">958 台東縣 池上鄉</option>
													<option value="959 台東縣 東河鄉">959 台東縣 東河鄉</option>
													<option value="961 台東縣 成功鎮">961 台東縣 成功鎮</option>
													<option value="962 台東縣 長濱鄉">962 台東縣 長濱鄉</option>
													<option value="963 台東縣 太麻里">963 台東縣 太麻里</option>
													<option value="964 台東縣 金峰鄉">964 台東縣 金峰鄉</option>
													<option value="965 台東縣 大武鄉">965 台東縣 大武鄉</option>
													<option value="966 台東縣 達仁鄉">966 台東縣 達仁鄉</option>
													<option value="970 花蓮縣 花蓮市">970 花蓮縣 花蓮市</option>
													<option value="971 花蓮縣 新城鄉">971 花蓮縣 新城鄉</option>
													<option value="972 花蓮縣 秀林鄉">972 花蓮縣 秀林鄉</option>
													<option value="973 花蓮縣 吉安鄉">973 花蓮縣 吉安鄉</option>
													<option value="974 花蓮縣 壽豐鄉">974 花蓮縣 壽豐鄉</option>
													<option value="975 花蓮縣 鳳林鎮">975 花蓮縣 鳳林鎮</option>
													<option value="976 花蓮縣 光復鄉">976 花蓮縣 光復鄉</option>
													<option value="977 花蓮縣 豐濱鄉">977 花蓮縣 豐濱鄉</option>
													<option value="978 花蓮縣 瑞穗鄉">978 花蓮縣 瑞穗鄉</option>
													<option value="979 花蓮縣 萬榮鄉">979 花蓮縣 萬榮鄉</option>
													<option value="981 花蓮縣 玉里鎮">981 花蓮縣 玉里鎮</option>
													<option value="982 花蓮縣 卓溪鄉">982 花蓮縣 卓溪鄉</option>
													<option value="983 花蓮縣 富里鄉">983 花蓮縣 富里鄉</option>
													<option value="890 金門縣 金沙">890 金門縣 金沙</option>
													<option value="891 金門縣 金湖">891 金門縣 金湖</option>
													<option value="892 金門縣 金寧">892 金門縣 金寧</option>
													<option value="893 金門縣 金城">893 金門縣 金城</option>
													<option value="894 金門縣 烈嶼">894 金門縣 烈嶼</option>
													<option value="896 金門縣 烏坵">896 金門縣 烏坵</option>
													<option value="209 連江縣 南竿">209 連江縣 南竿</option>
													<option value="210 連江縣 北竿">210 連江縣 北竿</option>
													<option value="211 連江縣 莒光">211 連江縣 莒光</option>
													<option value="212 連江縣 東引">212 連江縣 東引</option>
												</select>
											</div>
										</div>
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


