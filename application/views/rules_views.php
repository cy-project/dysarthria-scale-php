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

		
		rules_views_ajax();
});

function rules_views_ajax(){ // ajax 傳值

		$.ajax({
			  url: '<?php echo base_url();?>rules/rules_views_ajax',
			  type: 'POST',
               dataType:'html', 
			  error: function(xhr, ajaxOptions, thrownError) {
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				//$('#ReturnViews').html(xhr.responseText);
			  },
			  success: function(response) {
			  
				  $('#body').html(response);
			  }
		});
	
	
}

function result_up_ajax(i){

$.ajax({
			  url: '<?php echo base_url();?>rules/rules_views_up',
			  type: 'POST',
				data: {
				rules_id:i,
				weight:$('#weight_'+i).val()
			  },
			  error: function(xhr, ajaxOptions, thrownError) {
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				
			  },
			  success: function(response) {

				if(response=="yes"){
	

						rules_views_ajax();
						
				  }
			   
			  }
		});

}

function result_up(i){ //按鈕驅動


	alertify.confirm('您確定評分已完成?(如按下請"確定"，則後續無法變更)', function (e) {
	  if (e) {
	    alertify.log('確定，資料已送出！！');
		result_up_ajax(i);
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
	<h1>規則清單</h1>

	<div id="body">
 
	</div>
	
	</div>

	 
	<p class="footer"></p>
</div>

</body>
</html>