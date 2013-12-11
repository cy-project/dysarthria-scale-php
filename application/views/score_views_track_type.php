<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<!--alertify 美化 alert -->
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox.js?v=2.1.0"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/jquery.fancybox.css?v=2.1.0" media="screen" />

<script type="text/javascript">
$().ready(function(){//初始化載入
		 js_track_type_ajax();
});


function js_track_ajax(i,j){ //i:judgment_id , j:check

	$.ajax({
			  url: '<?php echo base_url();?>track/score_views_track_up',
			  type: 'POST',
				data: {
				judgment_id:i,
				check:j
			  },
			  error: function(xhr, ajaxOptions, thrownError) {
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				
			  },
			  success: function(response) {

				if(response=="yes"){
	
						parent.fancybox_start();parent.js_track_index_ajax(); 
						js_track_type_ajax();
						
				  }
			   
			  }
		});
}

function js_track_type_ajax(){ //part_id

	$.ajax({
			  url: '<?php echo base_url();?>track/score_views_track_type_ajax',
			  type: 'POST',
				data: {
				part_id:'<?=$part_id?>'
			  },
			  error: function(xhr, ajaxOptions, thrownError) {
				$('#body').html('Ajax request 發生錯誤'+xhr.responseText);
			  },
			  success: function(response) {
			  
				$('#body').html(response);
	
			  }
		});

}

function js_track_click(i,j){ //按鈕驅動

	alertify.confirm('您確定要改變這位學生被追蹤的狀態嗎?', function (e) {
	  if (e) {
	    alertify.log('確定，資料已送出！！');
		js_track_ajax(i,j);
	  } else {
	    alertify.error('取消');
	  }
	});

}

</script>

<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	
	#css_table {
			display:table;
	}
	.css_tr {
		   display: table-row;
	
	  }
	.css_td {
			-webkit-box-shadow: 0px 2px 3px #F2F2F2;
			-moz-box-shadow: 0px 2px 3px #F2F2F2;
			box-shadow: 0px 2px 3px #F2F2F2;
		   display: table-cell;
		   text-align:center;
		   padding: 0 0px 0 8px;
	  }
	</style>
</head>
<body>

<div id="container">

	<div id="body">
	
		
		
	</div>

	<p class="footer"> </div>  
				 
</body>
</html>