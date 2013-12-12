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

		js_Score_click();
});

function js_Score_ajax(){ // ajax 傳值

var booleans=false; //判斷array內是否有空值

var values = $("input[id='Score_value']").map(function(){
return $(this).val();}).get(); //取name[]的value型態array

for ( var i = 0; i < values.length; i++) {
          if (values[i] == "") {
				booleans=true;
          }
}

if(booleans==false){
		$.ajax({
			  url: '<?php echo base_url();?>/index.php/score/score_return',
			  type: 'POST',
				data: {
				score_value:values,
				result_id:'1',
				Test_engineer:'1'
			  }, // Test_engineer:$.cookie("name") 
			  error: function(xhr, ajaxOptions, thrownError) {
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				//$('#ReturnViews').html(xhr.responseText);
			  },
			  success: function(response) {
			  
				  if(response==0){
						
						alertify.alert('合格，請按下 ok!');  
				  }else{
						alertify.alert('不合格，請按下 ok!');
				  
				  }
			   
				//js_Score_click();
			  }
		});
	}else{
	
		alertify.error("［注意］尚有未填的空格!!");
	 
	}
	
}

function js_Score_click(){ //按鈕驅動

$("#Score_submit").click(function() {
	alertify.confirm('您確定評分已完成?(如按下請"確定"，則後續無法變更)', function (e) {
	  if (e) {
	    alertify.log('確定，資料已送出！！');
		js_Score_ajax();
	  } else {
	    alertify.error('取消');
	  }
	});
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
	<h1>檢測主題(先給一個Member_id)</h1>

	<div id="body">
	
		<div id="css_table">
		   
		 
			  <div class="css_tr">
			   <?php foreach($part->result() as $row): ?>
				  <div class="css_td">
						<a class="various" href="<?php echo base_url();?>score/score_views_topics/testing_list_id/<?=$testing_list_id?>/part_id/<?=$row->id?>/member_id/<?=$member_id?>" id="add_submit"><?=$row->name?></a>
				  </div>
				  <?php  endforeach;?> 
			  </div>	
			
		</div>
	  &nbsp;&nbsp;&nbsp;
	</div>
		
</div>

	 
	<p class="footer"></p>
</div>

</body>
</html>