  <head>
    <meta charset="utf-8">
    <title>構音量表</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="STU icon" href="<?=base_url("/images/favicon.png")?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("/lib/bootstrap/css/bootstrap.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("/stylesheets/theme.css")?>">
    <link rel="stylesheet" href="<?=base_url("/lib/font-awesome/css/font-awesome.css")?>">
    <script src="<?=base_url("/lib/jquery-1.7.2.min.js")?>" type="text/javascript"></script>
	<script src="<?=base_url("lib/bootstrap/js/bootstrap.js")?>" type="text/javascript"></script>
    <script src="<?=base_url("/js/sorttable.js")?>" type="text/javascript"></script>	
    <script src="<?=base_url("/js/jquery.cookie.js")?>" type="text/javascript"></script>
    <!-- Add MP3 files -->
	<script src="<?=base_url("/js/jquery.jmp3.js")?>" type="text/javascript"></script>
	<!--alertify 美化 alert -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">
	<script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script>
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox.js?v=2.1.0"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/jquery.fancybox.css?v=2.1.0" media="screen" />
	<script language="JavaScript">

	$().ready(function() {
		
		sidebar_nav();
		//OneClick(1);
	
	});

	function sidebar_nav(){
	
	$.ajax({
		type: 'POST',
		data:{asd:'333',zxc:'222'}, /*呈現資料塞這裡*/
		url: '<?=base_url("/Dysarthria/sidebar_nav")?>',
		dataType: 'html',
		success: function(response) {
		$('#sidebar-nav').html(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		alert(jqXHR.responseText);
		},
	});
	
	}
	
	</script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!-->