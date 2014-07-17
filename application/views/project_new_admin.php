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
			
			<script>
			township = new Array();
			township[0]=["請選擇"];
			/*台北市*/township[1]=["請選擇", "100 中正區", "103 大同區", "104 中山區", "105 松山區", "106 大安區", "108 萬華區", "110 信義區", "111 士林區", "112 北投區", "114 內湖區", "115 南港區", "116 文山區"];
			/*基隆市*/township[2]=["請選擇", "請選擇", "200 仁愛區", "201 信義區", "202 中正區", "203 中山區", "204 安樂區", "205 暖暖區", "206 七堵區"];
			/*新北市*/township[3]=["請選擇", "207 萬里區", "208 金山區", "220 板橋區", "221 汐止區", "222 深坑區", "223 石碇區", "224 瑞芳區", "226 平溪區", "227 雙溪區", "228 貢寮區", "231 新店區", "232 坪林區", "233 烏來區", "234 永和區", "235 中和區", "236 土城區", "237 三峽區", "238 樹林區", "239 鶯歌區", "241 三重區", "242 新莊區", "243 泰山區", "244 林口區", "247 蘆洲區", "248 五股區", "249 八里區", "251 淡水區", "252 三芝區", "253 石門區"];
			/*宜蘭縣*/township[4]=["請選擇", "260 宜蘭市", "261 頭城鎮", "262 礁溪鄉", "263 壯圍鄉", "264 員山鄉", "265 羅東鎮", "266 三星鄉", "267 大同鄉", "268 五結鄉", "269 冬山鄉", "270 蘇澳鎮", "272 南澳鄉"];
			/*新竹市*/township[5]=["請選擇", "300 北區", "300 東區", "300 香山區"];
			/*新竹縣*/township[6]=["請選擇", "302 竹北市", "303 湖口鄉", "304 新豐鄉", "305 新埔鎮", "306 關西鎮", "307 芎林鄉", "308 寶山鄉", "310 竹東鎮", "311 五峰鄉", "312 橫山鄉", "313 尖石鄉", "314 北埔鄉", "315 峨眉鄉"];
			/*桃園縣*/township[7]=["請選擇", "320 中壢市", "324 平鎮市", "325 龍潭鄉", "326 楊梅市", "327 新屋鄉", "328 觀音鄉", "330 桃園市", "333 龜山鄉", "334 八德市", "335 大溪鎮", "336 復興鄉", "337 大園鄉", "338 蘆竹鄉"];
			/*苗栗縣*/township[8]=["請選擇", "350 竹南鎮", "351 頭份鎮", "352 三灣鄉", "353 南庄鄉", "354 獅潭鄉", "356 後龍鎮", "357 通霄鎮", "358 苑裡鎮", "360 苗栗市", "361 造橋鄉", "362 頭屋鄉", "363 公館鄉", "364 大湖鄉", "365 泰安鄉", "366 銅鑼鄉", "367 三義鄉", "368 西湖鄉", "369 卓蘭鎮"];
			/*台中市*/township[9]=["請選擇", "400 中區", "401 東區", "402 南區", "403 西區", "404 北區", "406 北屯區", "407 西屯區", "408 南屯區", "411 太平區", "412 大里區", "413 霧峰區", "414 烏日區", "420 豐原區", "421 后里區", "422 石岡區", "423 東勢區", "424 和平區", "426 新社區", "427 潭子區", "428 大雅區", "429 神岡區", "432 大肚區", "433 沙鹿區", "434 龍井區", "435 梧棲區", "436 清水區", "437 大甲區", "438 外埔區", "439 大安區"];
			/*彰化縣*/township[10]=["請選擇", "500 彰化市", "502 芬園鄉", "503 花壇鄉", "504 秀水鄉", "505 鹿港鎮", "506 福興鄉", "507 線西鄉", "508 和美鎮", "509 伸港鄉", "510 員林鎮", "511 社頭鄉", "512 永靖鄉", "513 埔心鄉", "514 溪湖鎮", "515 大村鄉", "516 埔鹽鄉", "520 田中鎮", "521 北斗鎮", "522 田尾鄉", "523 埤頭鄉", "524 溪州鄉", "525 竹塘鄉", "526 二林鎮", "527 大城鄉", "528 芳苑鄉", "530 二水鄉"];
			/*南投縣*/township[11]=["請選擇", "540 南投市", "541 中寮鄉", "542 草屯鎮", "544 國姓鄉", "545 埔里鎮", "546 仁愛鄉", "551 名間鄉", "552 集集鎮", "553 水里鄉", "555 魚池鄉", "556 信義鄉", "557 竹山鎮", "558 鹿谷鄉"];
			/*嘉義市*/township[12]=["請選擇", "600 西區", "600 東區"];
			/*嘉義縣*/township[13]=["請選擇", "602 番路鄉", "603 梅山鄉", "604 竹崎鄉", "605 阿里山鄉", "606 中埔鄉", "607 大埔鄉", "608 水上鄉", "611 鹿草鄉", "612 太保市", "613 朴子市", "614 東石鄉", "615 六腳鄉", "616 新港鄉", "621 民雄鄉", "622 大林鎮", "623 溪口鄉", "624 義竹鄉", "625 布袋鎮"];
			/*雲林縣*/township[14]=["請選擇", "630 斗南鎮", "631 大埤鄉", "632 虎尾鎮", "633 土庫鎮", "634 褒忠鄉", "635 東勢鄉", "636 台西鄉", "637 崙背鄉", "638 麥寮鄉", "640 斗六市", "643 林內鄉", "646 古坑鄉", "647 莿桐鄉", "648 西螺鎮", "649 二崙鄉", "651 北港鎮", "652 水林鄉", "653 口湖鄉", "654 四湖鄉", "655 元長鄉"];
			/*台南市*/township[15]=["請選擇", "700 中西區", "701 東區", "702 南區", "704 北區", "708 安平區", "709 安南區", "710 永康區", "711 歸仁區", "712 新化區", "713 左鎮區", "714 玉井區", "715 楠西區", "716 南化區", "717 仁德區", "718 關廟區", "719 龍崎區", "720 官田區", "721 麻豆區", "722 佳里區", "723 西港區", "724 七股區", "725 將軍區", "726 學甲區", "727 北門區", "730 新營區", "731 後壁區", "732 白河區", "733 東山區", "734 六甲區", "735 下營區", "736 柳營區", "737 鹽水區", "741 善化區", "742 大內區", "743 山上區", "744 新市區", "745 安定區"];
			/*高雄市*/township[16]=["請選擇", "800 新興區", "801 前金區", "802 苓雅區", "803 鹽埕區", "804 鼓山區", "805 旗津區", "806 前鎮區", "807 三民區", "811 楠梓區", "812 小港區", "813 左營區", "814 仁武區", "815 大社區", "820 岡山區", "821 路竹區", "822 阿蓮區", "823 田寮區", "824 燕巢區", "825 橋頭區", "826 梓官區", "827 彌陀區", "828 永安區", "829 湖內區", "830 鳳山區", "831 大寮區", "832 林園區", "833 鳥松區", "840 大樹區", "842 旗山區", "843 美濃區", "844 六龜區", "845 內門區", "846 杉林區", "847 甲仙區", "848 桃源", "849 那瑪夏區", "851 茂林區", "852 茄萣區"];
			/*澎湖縣*/township[17]=["請選擇", "880 馬公市", "881 西嶼鄉", "882 望安鄉", "883 七美鄉", "884 白沙鄉", "885 湖西鄉"];
			/*屏東縣*/township[18]=["請選擇", "900 屏東市", "901 三地門", "902 霧臺鄉", "903 瑪家鄉", "904 九如鄉", "905 里港鄉", "906 高樹鄉", "907 盬埔鄉", "908 長治鄉", "909 麟洛鄉", "911 竹田鄉", "912 內埔鄉", "913 萬丹鄉", "920 潮州鎮", "921 泰武鄉", "922 來義鄉", "923 萬巒鄉", "924 崁頂鄉", "925 新埤鄉", "926 南州鄉", "927 林邊鄉", "928 東港鎮", "929 琉球鄉", "931 佳冬鄉", "932 新園鄉", "940 枋寮鄉", "941 枋山鄉", "942 春日鄉", "943 獅子鄉", "944 車城鄉", "945 牡丹鄉", "946 恆春鎮", "947 滿州鄉"];
			/*台東縣*/township[19]=["請選擇", "950 台東市", "951 綠島鄉", "952 蘭嶼鄉", "953 延平鄉", "954 卑南鄉", "955 鹿野鄉", "956 關山鎮", "957 海端鄉", "958 池上鄉", "959 東河鄉", "961 成功鎮", "962 長濱鄉", "963 太麻里", "964 金峰鄉", "965 大武鄉", "966 達仁鄉"];
			/*花蓮縣*/township[20]=["請選擇", "970 花蓮市", "971 新城鄉", "972 秀林鄉", "973 吉安鄉", "974 壽豐鄉", "975 鳳林鎮", "976 光復鄉", "977 豐濱鄉", "978 瑞穗鄉", "979 萬榮鄉", "981 玉里鎮", "982 卓溪鄉", "983 富里鄉"];
			/*金門縣*/township[21]=["請選擇", "890 金沙", "891 金湖", "892 金寧", "893 金城", "894 烈嶼", "896 烏坵"];
			/*連江縣*/township[22]=["請選擇", "209 南竿", "210 北竿", "211 莒光", "212 東引"];
			/*其他*/township[23]=["請選擇", "其他"];
			
			
			function county(index){
				for(var i = 0;i < township[index].length;i++)
					document.newprojectdata.Area.options[i] = new Option(township[index][i], township[index][i]);	// 設定新選項
				document.newprojectdata.Area.length = township[index].length;	// 刪除多餘的選項
			}
			</script>
			
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="container-fluid">
						<div class="row-fluid">
							<form name="newprojectdata" action="<?=base_url("/projectadmin/creating_project")?>" method="post">
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
											<label>學校</label>
											<select name="SchoolName" id="subjects_school" class="input-xlarge">
												
											</select>
											<a class="icon-plus btn btn-primary" onclick="newschlname()">新增學校</a>
											<div id="school_name" style="display: none">
												<label>學校名稱</label>
												<input type='text' name='NewSchoolName' placeholder="機構" class='input-xlarge'>
											</div>
											<label>所在縣市</label>
											<select name="Counties" id="Counties" class="input-xlarge" onChange="county(this.selectedIndex);">
												<option value="0" selected="selected">請選擇</option>
												<option value="台北市"> 台北市 </option>
												<option value="基隆市"> 基隆市 </option>
												<option value="新北市"> 新北市 </option>
												<option value="宜蘭縣"> 宜蘭縣 </option>
												<option value="新竹市"> 新竹市 </option>
												<option value="新竹縣"> 新竹縣 </option>
												<option value="桃園縣"> 桃園縣 </option>
												<option value="苗栗縣"> 苗栗縣 </option>
												<option value="台中市"> 台中市 </option>
												<option value="彰化縣"> 彰化縣 </option>
												<option value="南投縣"> 南投縣 </option>
												<option value="嘉義市"> 嘉義市 </option>
												<option value="嘉義縣"> 嘉義縣 </option>
												<option value="雲林縣"> 雲林縣 </option>
												<option value="台南市"> 台南市 </option>
												<option value="高雄市"> 高雄市 </option>
												<option value="澎湖縣"> 澎湖縣 </option>
												<option value="屏東縣"> 屏東縣 </option>
												<option value="台東縣"> 台東縣 </option>
												<option value="花蓮縣"> 花蓮縣 </option>
												<option value="金門縣"> 金門縣 </option>
												<option value="連江縣"> 連江縣 </option>
												<option value="其他"> 其他 </option>
											</select>
											<label>所在(鄉/鎮/區)</label>
											<select name="Area" id="Counties" class="input-xlarge">
												<option selected="selected">請選擇</option>
											</select>
											<?php  if (isset($errorMessage)){?>
											<div class="alert alert-error">
												<?=$errorMessage?>
											</div>
											<?php }?>
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
			$().ready(function() {
				Select_School();
			});
			
			function Select_School(){
				var URL = "<?=base_url("/projectadmin/select_school_name")?>";
				$.ajax({
					url: URL,
					type: 'POST',
					dataType:'text', 
					error: function(xhr, ajaxOptions, thrownError) {
						alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
					},
					success: function(response) {
						$('#subjects_school').html(response);
					}
				});
			}
			
			function newschlname(){
				if(document.getElementById('school_name').style.display == 'none'){
					document.getElementById('school_name').style.display='';
					return false;
				}
				else{
					document.getElementById('school_name').style.display='none';
					return false;
				}
				
			}
		</script>
	</body>
</html>


