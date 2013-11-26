<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>構音量表-登入</title>
    <link rel="STU icon" href="<?=base_url("/images/favicon.png")?>">
    <link rel="stylesheet" href="<?=base_url("/stylesheets/loginstyle.css")?>">
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  </head>
  <body>
    <section class="container">
      <div class="login">
        <h1>構音量表 - 會員登入</h1>
        <form method="post" action="<?=base_url("/")?>">
          <p><input type="text" name="login" value="" placeholder="帳號"></p>
          <p><input type="password" name="password" value="" placeholder="密碼"></p>
          <!--p class="remember_me">
            <label>
              <input type="checkbox" name="remember_me" id="remember_me">
              Remember me on this computer
            </label>
          </p-->
		  <p class="remember_me">
            <label class="login-help">
              <a href="<?=base_url()?>">回首頁</a>
            </label>
          </p>
          <p class="submit"><input type="submit" name="commit" value="登入"></p>
        </form>
      </div>
  
      <div class="login-help">
        <p>忘記密碼? <a href="<?=base_url("/dysarthria/index")?>">點這裡重新設定</a></p>
      </div>
    </section>
  
    <section class="about">
      <p class="about-author">
        &copy; 2012&ndash;2013 <a href="http://lab.csie.stu.edu.tw/l0738/">CY-Team 製作</a>
    </section>
  </body>
</html>
