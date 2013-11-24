<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>構音量表診斷系統</title>
	<link rel="STU icon" href="<?=base_url("/images/favicon.png")?>">
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?=base_url("/lib/bootstrap/css/bootstrap.css")?>">
	<link rel="stylesheet" href="<?=base_url("/stylesheets/slider.css")?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=base_url("/stylesheets/default.css")?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=base_url("/stylesheets/anythingslider.css")?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=base_url("/stylesheets/justified-nav.css")?>" />
    <!-- Custom styles for this template -->
	<script type="text/javascript" src="<?=base_url("/js/jquery.min.js")?>" charset="utf-8"></script>

	<!--動態選單-->
	<script type="text/javascript" src="<?=base_url("/js/jquery.easing.1.2.js")?>" charset="utf-8"></script>
	<script type="text/javascript" src="<?=base_url("/js/jquery.anythingslider.js")?>" charset="utf-8"></script>
	<script type="text/javascript" src="<?=base_url("/js/anythingslider.js")?>" charset="utf-8"></script>
  </head>

  <body>

    <div class="container">
	
	  <div class="masthead">
        <h3 class="text-muted">構音量表診斷系統</h3>
		
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
			<p>
			<?php
			  include "slideshow.php";
			?>
			</p>
			<a class="btn btn-large btn-success" href="<?=base_url("/Welcome/register")?>">申請帳號</a>
			<a class="btn btn-large btn-login" href="<?=base_url("/Welcome/login")?>">會員登入</a>

      </div>


      <div class="body-content">

        <!-- Example row of columns -->
        <div class="row">
          <div class="col-lg-4">
            <h2 style="color: #E21752;font-weight: 900;">語言治療師(流程)</h2>
			<img src="./images/doctor.jpg" style="width:350px;height:200px;"></p>
            <p><a class="btn btn-default" href="#">See more... &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <h2 style="color: #2e6499;font-weight: 900;">幼教老師(流程)</h2>
			<img src="./images/teacher.jpg" style="width:350px;height:200px;"></p>
			<p><a class="btn btn-default" href="#">See more... &raquo;</a></p>
			</p>
         </div>
          <div class="col-lg-4">
            <h2 style="color: #9ab17e;font-weight: 900;">其他身分者(實習生流程)</h2>
			<img src="./images/another.jpg" style="width:350px;height:200px;"></p></p>
            <p><a class="btn btn-default" href="#">See more... &raquo;</a></p>
          </div>
        </div>

      </div><!-- /.body-content -->

      <div class="footer">
        <a href="http://lab.csie.stu.edu.tw/l0738/">CY-Team 製作</a>
      </div>

    </div> <!-- /container -->

  </body>
</html>