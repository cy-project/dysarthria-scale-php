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
$().ready(function(){
//初始化載入

		fancybox_start();

		topics_ajax();
});


function fancybox_start(){

$(".various").fancybox({
		maxWidth	: 620,
		maxHeight	: 700,
		fitToView	: false,
		width		: '70%',
		height		: '100%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
		});


}



function topics_ajax(){
	
	$.ajax({
			  url: '<?php echo base_url();?>score/score_views_topics_ajax/testing_list_id/<?=$testing_list_id?>/part_id/<?=$part_id?>/member_id/<?=$member_id?>',
			  type: 'POST',
              beforeSend:function(){
                    $('#loadingIMG').show();
                },
              complete:function(){
                    $('#loadingIMG').hide();
                },			  
			  error: function(xhr, ajaxOptions, thrownError) {
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				//$('#ReturnViews').html(xhr.responseText);
			  },
			  success: function(response) {
			  
			  $('#body').html(response);
			  
			  }
		});
		//fancybox_start();
	
	//topics_ajax();
}





function Track_submit(i){ //按鈕驅動


judgment_ajax(i);
	/*alertify.confirm('您確定評分已完成?(如按下請"確定"，則後續無法變更)', function (e) {
	  if (e) {
	    alertify.log('確定，資料已送出！！');
		fancybox_start();
		judgment_ajax(i);
	  } else {
	    alertify.error('取消');
	  }
	});*/

}

function judgment_ajax(t){ // ajax 傳值

		$.ajax({
			  url: '<?php echo base_url();?>score/score_judgment_up',
			  type: 'POST',
				data: {
				judgment_id:t
			  }, 
			  error: function(xhr, ajaxOptions, thrownError) {
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				//$('#ReturnViews').html(xhr.responseText);
			  },
			  success: function(response) {
			  //$('#ReturnViews').html(response);
			  
				  if(response=="yes"){
						topics_ajax();
						alertify.alert('更新成功');  
				  }

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
	
	#Score_value{
	width:12px;
	
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
		   padding: 0 0.5px 0 10px;
	  }
	</style>
</head>
<body>

<div id="container">
	<h1>檢測題目</h1>
	<div id="loadingIMG" style="display:none"><img src="<?php echo base_url();?>image/ajax-loader.gif" height='14'/>資料處理中，請稍後。</div>
	<div id="body">
	
	</div>
		
</div>
 
	<p class="footer"><div id="ReturnViews"></div></p>
	
	
</div>

</body>
</html>