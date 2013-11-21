<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>構音量表-註冊</title>
  <link rel="STU icon" href="<?=base_url("/images/favicon.png")?>">
  <link rel="stylesheet" type="text/css" media="all" href="<?=base_url("/stylesheets/style.css")?>">
  <link rel="stylesheet" type="text/css" media="all" href="<?=base_url("/stylesheets/responsive.css")?>">
</head>

<body>

	<section id="container">
		<span class="chyron"><em><a href="<?=base_url()?>">&laquo; 回首頁</a></em></span>
		<h2>請填寫您的基本資料</h2>
		<form name="hongkiat" id="hongkiat-form" method="post" action="<?=site_url("/Welcome/registering")?>">
			<div id="wrapping" class="clearfix">
				<section id="aligned">
				
					<input type="text" name="account" id="account" placeholder="帳號" autocomplete="off" tabindex="1" class="txtinput">
					
					<input type="text" name="password" id="password" placeholder="密碼" autocomplete="off" tabindex="2" class="txtinput">
					
					<input type="text" name="name" id="name" placeholder="姓名" autocomplete="off" tabindex="3" class="txtinput">
				
					<input type="email" name="email" id="email" placeholder="電子郵件" autocomplete="off" tabindex="4" class="txtinput">
				
					<input type="tel" name="telephone" id="telephone" placeholder="聯絡電話1" tabindex="5" class="txtinput">
					
					<input type="text" name="contact" id="contact" placeholder="緊急聯絡人" autocomplete="off" tabindex="6" class="txtinput">
					
					<input type="tel" name="telephone2" id="telephone" placeholder="聯絡電話2" tabindex="7" class="txtinput">
					
				</section> 
				
				<section id="aside" class="clearfix">
					<section id="recipientcase">
					<h3>身分選擇:</h3>
						<select id="recipient" name="recipient" tabindex="6" class="selmenu">
							<option value="語言治療師">語言治療師</option>
							<option value="幼教老師">幼教老師</option>
							<option value="其他使用者">其他使用者</option>
							<option value="實習生">實習生</option>
						</select>
					</section>
				</section>
			</div>


			<section id="buttons">
				<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="清除">
				<input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="送出">
				<br style="clear:both;">
			</section>
		</form>
	</section>

</body>
</html>