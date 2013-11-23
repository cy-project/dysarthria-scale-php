<!DOCTYPE html>
<html lang="en">
  <?php
    include "head.php";
  ?> 
  <body class=""> 
  <!--<![endif]-->
    <?
	  include "navbar.php";
	  include "sidebar-nav.php";
	?>

	<div class="content">
        
        <div class="header">
            <h1 class="page-title">最新消息</h1>
        </div>
                <ul class="breadcrumb">
					<li><a href="<?=base_url("/dysarthria/index")?>">首頁</a> <span class="divider">/</span></li>
					<li class="active">最新消息</li>
				</ul>
        <div class="container-fluid">
            <div class="row-fluid">
				<div class="row-fluid">
					<div class="block span6">
						<a href="#tablewidget" class="block-heading" data-toggle="collapse">發布消息</a>
						<div id="tablewidget" class="block-body collapse in">
							<table class="table">
							  <thead>
								<tr>
								  <th><input type="checkbox"> <span class="label label-warning">全部</span></input> <input type="checkbox"> <span class="label label-info">語言治療師</span></input> <input type="checkbox"> <span class="label label-success">教師</span></input> <input type="checkbox"> <span class="label label-inverse">大學生</span></input> <input type="checkbox"> <span class="label">其他</span></input></th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td><input type="text" onfocus="if(this.value=='標題') this.value='';" onblur="if(this.value=='') this.value='標題';" value="標題" alt="標題"></td>
								</tr>
								<tr>
								  <td><textarea class="news" rows="40">
【延畢生辦理就學貸款】您一定要看

By 學務處生活輔導組 | 2013/09/04 | 行政公告

如果您是延畢生，學費要辦理就學貸款，您一定要看

流程一

依教務處課務組行事曆選課時間，加退選後次日請至校務資訊系統→總務資訊管理→列印延修選課繳費清單(本繳費單為方便延畢生辦理「就學貸款」，故提前開放已確定完成選課者，於次日自行列印『繳費單』辦理就貸。完成就貸申請後，如因課程異動導致就貸金額不符者，【學分數增加】請至總務出納組補繳差額；【學分數減少】則列入就貸多貸退費。)

流程二

樹德科技大學校務資訊系統上網申請https://info.stu.edu.tw/login/syslogin.htm填寫並列印

台灣銀行上網申請https://sloan.bot.com.tw填寫並列印及辦理簽約對保。

流程三

申貸資料繳回學校辦理註冊102年09月27日前辦理，可掛號郵寄信件或親自或委託人到校繳交。

1.樹德科技大學就學貸款申請書、2台灣銀行撥款申請通知書。

注意事項：

繳回申貸資料完成註冊後，學生證蓋註冊，影印學生證至全省台灣銀行辦理延期還款。

1.已至台灣銀行簽約對保，申貸資料未繳回或未上網(學校校務資訊系統就學貸款申請書)，經通知後仍未繳回者，視同末申請就學貸款，請至總務處出納組補繳學費，不得有異議。

2.若有相閞問題請勿聽信"同學說"一定要打電話07-6158000 begin_of_the_skype_highlighting 07-6158000 免費  end_of_the_skype_highlighting分機2124郭小姐詢問。

3.郵寄信件824高雄市燕巢區橫山路59號，生輔組郭美真收

學務處生輔組關心您
								  </textarea></td>
								</tr>
								<tr>
								  <td>
								  <a href="index.html"><button class="btn btn-primary"><i class="icon-save"></i> 發布</button></a>
								  <button class="btn">預覽</button>
								  </td>
								</tr>
							  </tbody>
							</table>
						</div>
					</div>
					<div class="block span6">
						 <a href="index-news.html" class="block-heading" >最新消息</a>
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
							<p><a href="users.html">More...</a></p>
						</div>
					</div>
				</div>
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