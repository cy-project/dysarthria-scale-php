<!DOCTYPE html>
<html lang="en">
<?php
		include "head.php";
?> 
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
				$('.well').html('Ajax request 發生錯誤'+xhr.responseText);
			  },
			  success: function(response) {
			  
				$('.well').html(response);
	
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

</head>
<body>

<div id="container">

	<div id="body">
		<div class="well" style="border: 0px;">
			
		</div>	
	</div>

	<p class="footer"> </div>  
				 
</body>
</html>