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

var Score_value = $("select[id='Score_value']").map(function(){
return $(this).val();}).get(); //取name[]的value型態array

var Topic_id = $("input[id='Topic_id']").map(function(){
return $(this).val();}).get();

for ( var i = 0; i < Score_value.length; i++) {
          if (Score_value[i] == "") {
				booleans=true;
          }
}



if(booleans==false){

		$.ajax({
			  url: '<?php echo base_url();?>score/score_return',
			  type: 'POST',
				data: {
				topic_id:Topic_id,
				score_value:Score_value,
				result_id:'<?=$result_id?>',
				member_id:'<?=$member_id?>'
			  }, 
			  error: function(xhr, ajaxOptions, thrownError) {
				//alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				$('#ReturnViews').html(xhr.responseText);
			  },
			  success: function(response) {
			  //$('#ReturnViews').html(response);
				 
				  if(response==1){
						
						alertify.alert('合格，請按下 ok!');  
						parent.topics_ajax(); 
						parent.jQuery.fancybox.close();
				  }else{
						alertify.alert('不合格，請按下 ok!');
						parent.topics_ajax(); 
						parent.jQuery.fancybox.close();
				  
				  }
				
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
	</style>
</head>
<body>

<div id="container">
	<h1>符號檢測</h1>

	<div id="body">
	
	<?php foreach($topic->result() as $row): ?>
		  <?=$row->script?>
		
		<select id="Score_value" name="Score_value[]">
		 <option value="1">正確</option>
		 <option value="0">不清楚</option>
		 <option value="-1">不正確</option>
		</select>
		
		
		<input type="hidden" id="Topic_id" name="Topic_id[]"  value="<?=$row->id?>"/>
		<img src="http://www.veryicon.com/icon/png/File%20Type/Software%20Files/Png.png" title="<?=$row->photo?>" height="20" width="20" >
		<img src="http://whiteappleer.tw/wp-content/uploads/2011/04/iTunes_10_icon.png" title="<?=$row->audio?>" height="20" width="20">
		
		</br>
	<?php  endforeach;?> 
		
		<a  href="javascript:" id="Score_submit">確定</a>
		
	</div>

	 
	<p class="footer"><div id="ReturnViews"></div></p>
</div>

</body>
</html>