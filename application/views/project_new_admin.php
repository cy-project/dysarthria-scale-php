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
													<option value="台北市">台北市</option>
													<option value=" 基隆市 "> 基隆市 </option>
													<option value=" 新北市 "> 新北市 </option>
													<option value=" 宜蘭縣 "> 宜蘭縣 </option>
													<option value=" 新竹市" > 新竹市 </option>
													<option value=" 新竹縣 "> 新竹縣 </option>
													<option value=" 桃園縣 "> 桃園縣 </option>
													<option value=" 苗栗縣 "> 苗栗縣 </option>
													<option value=" 台中市 "> 台中市 </option>
													<option value=" 彰化縣 "> 彰化縣 </option>
													<option value=" 南投縣 "> 南投縣 </option>
													<option value=" 嘉義市 "> 嘉義市 </option>
													<option value=" 嘉義縣 "> 嘉義縣 </option>
													<option value=" 雲林縣 "> 雲林縣 </option>
													<option value=" 台南市 "> 台南市 </option>
													<option value=" 高雄市 "> 高雄市 </option>
													<option value=" 澎湖縣 "> 澎湖縣 </option>
													<option value=" 屏東縣 "> 屏東縣 </option>
													<option value=" 台東縣 "> 台東縣 </option>
													<option value=" 花蓮縣 "> 花蓮縣 </option>
													<option value=" 金門縣 "> 金門縣 </option>
													<option value=" 連江縣 "> 連江縣 </option>
												</select>
												<label>所在(鄉/鎮/區)</label>
												<select name="Area" id="Counties" class="input-xlarge">
													<option selected="selected">請選擇</option>
													<option value="100  中正區">100  中正區</option>
													<option value="103  大同區">103  大同區</option>
													<option value="104  中山區">104  中山區</option>
													<option value="105  松山區">105  松山區</option>
													<option value="106  大安區">106  大安區</option>
													<option value="108  萬華區">108  萬華區</option>
													<option value="110  信義區">110  信義區</option>
													<option value="111  士林區">111  士林區</option>
													<option value="112  北投區">112  北投區</option>
													<option value="114  內湖區">114  內湖區</option>
													<option value="115  南港區">115  南港區</option>
													<option value="116  文山區">116  文山區</option>
													<option value="200  仁愛區">200  仁愛區</option>
													<option value="201  信義區">201  信義區</option>
													<option value="202  中正區">202  中正區</option>
													<option value="203  中山區">203  中山區</option>
													<option value="204  安樂區">204  安樂區</option>
													<option value="205  暖暖區">205  暖暖區</option>
													<option value="206  七堵區">206  七堵區</option>
													<option value="207  萬里區">207  萬里區</option>
													<option value="208  金山區">208  金山區</option>
													<option value="220  板橋區">220  板橋區</option>
													<option value="221  汐止區">221  汐止區</option>
													<option value="222  深坑區">222  深坑區</option>
													<option value="223  石碇區">223  石碇區</option>
													<option value="224  瑞芳區">224  瑞芳區</option>
													<option value="226  平溪區">226  平溪區</option>
													<option value="227  雙溪區">227  雙溪區</option>
													<option value="228  貢寮區">228  貢寮區</option>
													<option value="231  新店區">231  新店區</option>
													<option value="232  坪林區">232  坪林區</option>
													<option value="233  烏來區">233  烏來區</option>
													<option value="234  永和區">234  永和區</option>
													<option value="235  中和區">235  中和區</option>
													<option value="236  土城區">236  土城區</option>
													<option value="237  三峽區">237  三峽區</option>
													<option value="238  樹林區">238  樹林區</option>
													<option value="239  鶯歌區">239  鶯歌區</option>
													<option value="241  三重區">241  三重區</option>
													<option value="242  新莊區">242  新莊區</option>
													<option value="243  泰山區">243  泰山區</option>
													<option value="244  林口區">244  林口區</option>
													<option value="247  蘆洲區">247  蘆洲區</option>
													<option value="248  五股區">248  五股區</option>
													<option value="249  八里區">249  八里區</option>
													<option value="251  淡水區">251  淡水區</option>
													<option value="252  三芝區">252  三芝區</option>
													<option value="253  石門區">253  石門區</option>
													<option value="260  宜蘭市">260  宜蘭市</option>
													<option value="261  頭城鎮">261  頭城鎮</option>
													<option value="262  礁溪鄉">262  礁溪鄉</option>
													<option value="263  壯圍鄉">263  壯圍鄉</option>
													<option value="264  員山鄉">264  員山鄉</option>
													<option value="265  羅東鎮">265  羅東鎮</option>
													<option value="266  三星鄉">266  三星鄉</option>
													<option value="267  大同鄉">267  大同鄉</option>
													<option value="268  五結鄉">268  五結鄉</option>
													<option value="269  冬山鄉">269  冬山鄉</option>
													<option value="270  蘇澳鎮">270  蘇澳鎮</option>
													<option value="272  南澳鄉">272  南澳鄉</option>
													<option value="300  北區">300  北區</option>
													<option value="300  東區">300  東區</option>
													<option value="300  香山區">300  香山區</option>
													<option value="302  竹北市">302  竹北市</option>
													<option value="303  湖口鄉">303  湖口鄉</option>
													<option value="304  新豐鄉">304  新豐鄉</option>
													<option value="305  新埔鎮">305  新埔鎮</option>
													<option value="306  關西鎮">306  關西鎮</option>
													<option value="307  芎林鄉">307  芎林鄉</option>
													<option value="308  寶山鄉">308  寶山鄉</option>
													<option value="310  竹東鎮">310  竹東鎮</option>
													<option value="311  五峰鄉">311  五峰鄉</option>
													<option value="312  橫山鄉">312  橫山鄉</option>
													<option value="313  尖石鄉">313  尖石鄉</option>
													<option value="314  北埔鄉">314  北埔鄉</option>
													<option value="315  峨眉鄉">315  峨眉鄉</option>
													<option value="320  中壢市">320  中壢市</option>
													<option value="324  平鎮市">324  平鎮市</option>
													<option value="325  龍潭鄉">325  龍潭鄉</option>
													<option value="326  楊梅市">326  楊梅市</option>
													<option value="327  新屋鄉">327  新屋鄉</option>
													<option value="328  觀音鄉">328  觀音鄉</option>
													<option value="330  桃園市">330  桃園市</option>
													<option value="333  龜山鄉">333  龜山鄉</option>
													<option value="334  八德市">334  八德市</option>
													<option value="335  大溪鎮">335  大溪鎮</option>
													<option value="336  復興鄉">336  復興鄉</option>
													<option value="337  大園鄉">337  大園鄉</option>
													<option value="338  蘆竹鄉">338  蘆竹鄉</option>
													<option value="350  竹南鎮">350  竹南鎮</option>
													<option value="351  頭份鎮">351  頭份鎮</option>
													<option value="352  三灣鄉">352  三灣鄉</option>
													<option value="353  南庄鄉">353  南庄鄉</option>
													<option value="354  獅潭鄉">354  獅潭鄉</option>
													<option value="356  後龍鎮">356  後龍鎮</option>
													<option value="357  通霄鎮">357  通霄鎮</option>
													<option value="358  苑裡鎮">358  苑裡鎮</option>
													<option value="360  苗栗市">360  苗栗市</option>
													<option value="361  造橋鄉">361  造橋鄉</option>
													<option value="362  頭屋鄉">362  頭屋鄉</option>
													<option value="363  公館鄉">363  公館鄉</option>
													<option value="364  大湖鄉">364  大湖鄉</option>
													<option value="365  泰安鄉">365  泰安鄉</option>
													<option value="366  銅鑼鄉">366  銅鑼鄉</option>
													<option value="367  三義鄉">367  三義鄉</option>
													<option value="368  西湖鄉">368  西湖鄉</option>
													<option value="369  卓蘭鎮">369  卓蘭鎮</option>
													<option value="400  中區">400  中區</option>
													<option value="401  東區">401  東區</option>
													<option value="402  南區">402  南區</option>
													<option value="403  西區">403  西區</option>
													<option value="404  北區">404  北區</option>
													<option value="406  北屯區">406  北屯區</option>
													<option value="407  西屯區">407  西屯區</option>
													<option value="408  南屯區">408  南屯區</option>
													<option value="411  太平區">411  太平區</option>
													<option value="412  大里區">412  大里區</option>
													<option value="413  霧峰區">413  霧峰區</option>
													<option value="414  烏日區">414  烏日區</option>
													<option value="420  豐原區">420  豐原區</option>
													<option value="421  后里區">421  后里區</option>
													<option value="422  石岡區">422  石岡區</option>
													<option value="423  東勢區">423  東勢區</option>
													<option value="424  和平區">424  和平區</option>
													<option value="426  新社區">426  新社區</option>
													<option value="427  潭子區">427  潭子區</option>
													<option value="428  大雅區">428  大雅區</option>
													<option value="429  神岡區">429  神岡區</option>
													<option value="432  大肚區">432  大肚區</option>
													<option value="433  沙鹿區">433  沙鹿區</option>
													<option value="434  龍井區">434  龍井區</option>
													<option value="435  梧棲區">435  梧棲區</option>
													<option value="436  清水區">436  清水區</option>
													<option value="437  大甲區">437  大甲區</option>
													<option value="438  外埔區">438  外埔區</option>
													<option value="439  大安區">439  大安區</option>
													<option value="500  彰化市">500  彰化市</option>
													<option value="502  芬園鄉">502  芬園鄉</option>
													<option value="503  花壇鄉">503  花壇鄉</option>
													<option value="504  秀水鄉">504  秀水鄉</option>
													<option value="505  鹿港鎮">505  鹿港鎮</option>
													<option value="506  福興鄉">506  福興鄉</option>
													<option value="507  線西鄉">507  線西鄉</option>
													<option value="508  和美鎮">508  和美鎮</option>
													<option value="509  伸港鄉">509  伸港鄉</option>
													<option value="510  員林鎮">510  員林鎮</option>
													<option value="511  社頭鄉">511  社頭鄉</option>
													<option value="512  永靖鄉">512  永靖鄉</option>
													<option value="513  埔心鄉">513  埔心鄉</option>
													<option value="514  溪湖鎮">514  溪湖鎮</option>
													<option value="515  大村鄉">515  大村鄉</option>
													<option value="516  埔鹽鄉">516  埔鹽鄉</option>
													<option value="520  田中鎮">520  田中鎮</option>
													<option value="521  北斗鎮">521  北斗鎮</option>
													<option value="522  田尾鄉">522  田尾鄉</option>
													<option value="523  埤頭鄉">523  埤頭鄉</option>
													<option value="524  溪州鄉">524  溪州鄉</option>
													<option value="525  竹塘鄉">525  竹塘鄉</option>
													<option value="526  二林鎮">526  二林鎮</option>
													<option value="527  大城鄉">527  大城鄉</option>
													<option value="528  芳苑鄉">528  芳苑鄉</option>
													<option value="530  二水鄉">530  二水鄉</option>
													<option value="540  南投市">540  南投市</option>
													<option value="541  中寮鄉">541  中寮鄉</option>
													<option value="542  草屯鎮">542  草屯鎮</option>
													<option value="544  國姓鄉">544  國姓鄉</option>
													<option value="545  埔里鎮">545  埔里鎮</option>
													<option value="546  仁愛鄉">546  仁愛鄉</option>
													<option value="551  名間鄉">551  名間鄉</option>
													<option value="552  集集鎮">552  集集鎮</option>
													<option value="553  水里鄉">553  水里鄉</option>
													<option value="555  魚池鄉">555  魚池鄉</option>
													<option value="556  信義鄉">556  信義鄉</option>
													<option value="557  竹山鎮">557  竹山鎮</option>
													<option value="558  鹿谷鄉">558  鹿谷鄉</option>
													<option value="600  西區">600  西區</option>
													<option value="600  東區">600  東區</option>
													<option value="602  番路鄉">602  番路鄉</option>
													<option value="603  梅山鄉">603  梅山鄉</option>
													<option value="604  竹崎鄉">604  竹崎鄉</option>
													<option value="605  阿里山鄉">605  阿里山鄉</option>
													<option value="606  中埔鄉">606  中埔鄉</option>
													<option value="607  大埔鄉">607  大埔鄉</option>
													<option value="608  水上鄉">608  水上鄉</option>
													<option value="611  鹿草鄉">611  鹿草鄉</option>
													<option value="612  太保市">612  太保市</option>
													<option value="613  朴子市">613  朴子市</option>
													<option value="614  東石鄉">614  東石鄉</option>
													<option value="615  六腳鄉">615  六腳鄉</option>
													<option value="616  新港鄉">616  新港鄉</option>
													<option value="621  民雄鄉">621  民雄鄉</option>
													<option value="622  大林鎮">622  大林鎮</option>
													<option value="623  溪口鄉">623  溪口鄉</option>
													<option value="624  義竹鄉">624  義竹鄉</option>
													<option value="625  布袋鎮">625  布袋鎮</option>
													<option value="630  斗南鎮">630  斗南鎮</option>
													<option value="631  大埤鄉">631  大埤鄉</option>
													<option value="632  虎尾鎮">632  虎尾鎮</option>
													<option value="633  土庫鎮">633  土庫鎮</option>
													<option value="634  褒忠鄉">634  褒忠鄉</option>
													<option value="635  東勢鄉">635  東勢鄉</option>
													<option value="636  台西鄉">636  台西鄉</option>
													<option value="637  崙背鄉">637  崙背鄉</option>
													<option value="638  麥寮鄉">638  麥寮鄉</option>
													<option value="640  斗六市">640  斗六市</option>
													<option value="643  林內鄉">643  林內鄉</option>
													<option value="646  古坑鄉">646  古坑鄉</option>
													<option value="647  莿桐鄉">647  莿桐鄉</option>
													<option value="648  西螺鎮">648  西螺鎮</option>
													<option value="649  二崙鄉">649  二崙鄉</option>
													<option value="651  北港鎮">651  北港鎮</option>
													<option value="652  水林鄉">652  水林鄉</option>
													<option value="653  口湖鄉">653  口湖鄉</option>
													<option value="654  四湖鄉">654  四湖鄉</option>
													<option value="655  元長鄉">655  元長鄉</option>
													<option value="700  中西區">700  中西區</option>
													<option value="701  東區">701  東區</option>
													<option value="702  南區">702  南區</option>
													<option value="704  北區">704  北區</option>
													<option value="708  安平區">708  安平區</option>
													<option value="709  安南區">709  安南區</option>
													<option value="710  永康區">710  永康區</option>
													<option value="711  歸仁區">711  歸仁區</option>
													<option value="712  新化區">712  新化區</option>
													<option value="713  左鎮區">713  左鎮區</option>
													<option value="714  玉井區">714  玉井區</option>
													<option value="715  楠西區">715  楠西區</option>
													<option value="716  南化區">716  南化區</option>
													<option value="717  仁德區">717  仁德區</option>
													<option value="718  關廟區">718  關廟區</option>
													<option value="719  龍崎區">719  龍崎區</option>
													<option value="720  官田區">720  官田區</option>
													<option value="721  麻豆區">721  麻豆區</option>
													<option value="722  佳里區">722  佳里區</option>
													<option value="723  西港區">723  西港區</option>
													<option value="724  七股區">724  七股區</option>
													<option value="725  將軍區">725  將軍區</option>
													<option value="726  學甲區">726  學甲區</option>
													<option value="727  北門區">727  北門區</option>
													<option value="730  新營區">730  新營區</option>
													<option value="731  後壁區">731  後壁區</option>
													<option value="732  白河區">732  白河區</option>
													<option value="733  東山區">733  東山區</option>
													<option value="734  六甲區">734  六甲區</option>
													<option value="735  下營區">735  下營區</option>
													<option value="736  柳營區">736  柳營區</option>
													<option value="737  鹽水區">737  鹽水區</option>
													<option value="741  善化區">741  善化區</option>
													<option value="742  大內區">742  大內區</option>
													<option value="743  山上區">743  山上區</option>
													<option value="744  新市區">744  新市區</option>
													<option value="745  安定區">745  安定區</option>
													<option value="800  新興區">800  新興區</option>
													<option value="801  前金區">801  前金區</option>
													<option value="802  苓雅區">802  苓雅區</option>
													<option value="803  鹽埕區">803  鹽埕區</option>
													<option value="804  鼓山區">804  鼓山區</option>
													<option value="805  旗津區">805  旗津區</option>
													<option value="806  前鎮區">806  前鎮區</option>
													<option value="807  三民區">807  三民區</option>
													<option value="811  楠梓區">811  楠梓區</option>
													<option value="812  小港區">812  小港區</option>
													<option value="813  左營區">813  左營區</option>
													<option value="814  仁武區">814  仁武區</option>
													<option value="815  大社區">815  大社區</option>
													<option value="820  岡山區">820  岡山區</option>
													<option value="821  路竹區">821  路竹區</option>
													<option value="822  阿蓮區">822  阿蓮區</option>
													<option value="823  田寮區">823  田寮區</option>
													<option value="824  燕巢區">824  燕巢區</option>
													<option value="825  橋頭區">825  橋頭區</option>
													<option value="826  梓官區">826  梓官區</option>
													<option value="827  彌陀區">827  彌陀區</option>
													<option value="828  永安區">828  永安區</option>
													<option value="829  湖內區">829  湖內區</option>
													<option value="830  鳳山區">830  鳳山區</option>
													<option value="831  大寮區">831  大寮區</option>
													<option value="832  林園區">832  林園區</option>
													<option value="833  鳥松區">833  鳥松區</option>
													<option value="840  大樹區">840  大樹區</option>
													<option value="842  旗山區">842  旗山區</option>
													<option value="843  美濃區">843  美濃區</option>
													<option value="844  六龜區">844  六龜區</option>
													<option value="845  內門區">845  內門區</option>
													<option value="846  杉林區">846  杉林區</option>
													<option value="847  甲仙區">847  甲仙區</option>
													<option value="848  桃源">848  桃源</option>
													<option value="849  那瑪夏區">849  那瑪夏區</option>
													<option value="851  茂林區">851  茂林區</option>
													<option value="852  茄萣區">852  茄萣區</option>
													<option value="880  馬公市">880  馬公市</option>
													<option value="881  西嶼鄉">881  西嶼鄉</option>
													<option value="882  望安鄉">882  望安鄉</option>
													<option value="883  七美鄉">883  七美鄉</option>
													<option value="884  白沙鄉">884  白沙鄉</option>
													<option value="885  湖西鄉">885  湖西鄉</option>
													<option value="900  屏東市">900  屏東市</option>
													<option value="901  三地門">901  三地門</option>
													<option value="902  霧臺鄉">902  霧臺鄉</option>
													<option value="903  瑪家鄉">903  瑪家鄉</option>
													<option value="904  九如鄉">904  九如鄉</option>
													<option value="905  里港鄉">905  里港鄉</option>
													<option value="906  高樹鄉">906  高樹鄉</option>
													<option value="907  盬埔鄉">907  盬埔鄉</option>
													<option value="908  長治鄉">908  長治鄉</option>
													<option value="909  麟洛鄉">909  麟洛鄉</option>
													<option value="911  竹田鄉">911  竹田鄉</option>
													<option value="912  內埔鄉">912  內埔鄉</option>
													<option value="913  萬丹鄉">913  萬丹鄉</option>
													<option value="920  潮州鎮">920  潮州鎮</option>
													<option value="921  泰武鄉">921  泰武鄉</option>
													<option value="922  來義鄉">922  來義鄉</option>
													<option value="923  萬巒鄉">923  萬巒鄉</option>
													<option value="924  崁頂鄉">924  崁頂鄉</option>
													<option value="925  新埤鄉">925  新埤鄉</option>
													<option value="926  南州鄉">926  南州鄉</option>
													<option value="927  林邊鄉">927  林邊鄉</option>
													<option value="928  東港鎮">928  東港鎮</option>
													<option value="929  琉球鄉">929  琉球鄉</option>
													<option value="931  佳冬鄉">931  佳冬鄉</option>
													<option value="932  新園鄉">932  新園鄉</option>
													<option value="940  枋寮鄉">940  枋寮鄉</option>
													<option value="941  枋山鄉">941  枋山鄉</option>
													<option value="942  春日鄉">942  春日鄉</option>
													<option value="943  獅子鄉">943  獅子鄉</option>
													<option value="944  車城鄉">944  車城鄉</option>
													<option value="945  牡丹鄉">945  牡丹鄉</option>
													<option value="946  恆春鎮">946  恆春鎮</option>
													<option value="947  滿州鄉">947  滿州鄉</option>
													<option value="950  台東市">950  台東市</option>
													<option value="951  綠島鄉">951  綠島鄉</option>
													<option value="952  蘭嶼鄉">952  蘭嶼鄉</option>
													<option value="953  延平鄉">953  延平鄉</option>
													<option value="954  卑南鄉">954  卑南鄉</option>
													<option value="955  鹿野鄉">955  鹿野鄉</option>
													<option value="956  關山鎮">956  關山鎮</option>
													<option value="957  海端鄉">957  海端鄉</option>
													<option value="958  池上鄉">958  池上鄉</option>
													<option value="959  東河鄉">959  東河鄉</option>
													<option value="961  成功鎮">961  成功鎮</option>
													<option value="962  長濱鄉">962  長濱鄉</option>
													<option value="963  太麻里">963  太麻里</option>
													<option value="964  金峰鄉">964  金峰鄉</option>
													<option value="965  大武鄉">965  大武鄉</option>
													<option value="966  達仁鄉">966  達仁鄉</option>
													<option value="970  花蓮市">970  花蓮市</option>
													<option value="971  新城鄉">971  新城鄉</option>
													<option value="972  秀林鄉">972  秀林鄉</option>
													<option value="973  吉安鄉">973  吉安鄉</option>
													<option value="974  壽豐鄉">974  壽豐鄉</option>
													<option value="975  鳳林鎮">975  鳳林鎮</option>
													<option value="976  光復鄉">976  光復鄉</option>
													<option value="977  豐濱鄉">977  豐濱鄉</option>
													<option value="978  瑞穗鄉">978  瑞穗鄉</option>
													<option value="979  萬榮鄉">979  萬榮鄉</option>
													<option value="981  玉里鎮">981  玉里鎮</option>
													<option value="982  卓溪鄉">982  卓溪鄉</option>
													<option value="983  富里鄉">983  富里鄉</option>
													<option value="890  金沙">890  金沙</option>
													<option value="891  金湖">891  金湖</option>
													<option value="892  金寧">892  金寧</option>
													<option value="893  金城">893  金城</option>
													<option value="894  烈嶼">894  烈嶼</option>
													<option value="896  烏坵">896  烏坵</option>
													<option value="209  南竿">209  南竿</option>
													<option value="210  北竿">210  北竿</option>
													<option value="211  莒光">211  莒光</option>
													<option value="212  東引">212  東引</option>
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


