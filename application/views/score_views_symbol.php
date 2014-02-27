<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
<?php include "head.php"; ?>

<script type="text/javascript">
$().ready(function(){
//初始化載入
		js_Score_click();
		wav();
		
		sorttables();
});




function js_Score_ajax(){ // ajax 傳值

var booleans=false; //判斷array內是否有空值

var Score_value = $("select[id='Score_value']").map(function(){
return $(this).val();}).get(); //取name[]的value型態array

var Note_value = $("select[id='note_value']").map(function(){
return $(this).val();}).get(); //取name[]的value型態array

var Topic_id = $("input[id='Topic_id']").map(function(){
return $(this).val();}).get();

for ( var i = 0; i < Score_value.length; i++) {
          if (Score_value[i] == "") {
				booleans=true;
          }
}

for ( var i = 0; i < Note_value.length; i++) {
          if (Note_value[i] == "") {
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
				note_value:Note_value,
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
				
			  },beforeSend:function(){
                   $('#Score_submit').hide();
                    $('#loadingIMG').show();
                },
                complete:function(){
                    $('#loadingIMG').hide();
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

</head>
<body>
<div class="container-fluid">
<div class="row-fluid">
<div class="well" >
		<h5 class="page-title">符號評測</h5>
			<table class="sortable table"><!--施測名單-->
				<thead>
					<tr>
						<th><a href="#">題目</a></th>
						<th><a href="#">評分</a></th>
						<th><a href="#">音檔</a></th>
						<th><a href="#">備註</a></th>
					</tr>
				</thead>
				<tbody>
				<?php 
				//echo "dsds";
				$temp = 1;
				foreach($topic->result() as $row): ?>
					<tr>
						<input type="hidden" id="Topic_id" name="Topic_id[]"  value="<?=$row->topic_id?>"/>
						<td><?=$row->script?></td>
						<td><select id="Score_value" name="Score_value[]" style="width: 120px;" />
						 <option value="1">正確</option>
						 <option value="0">不清楚</option>
						 <option value="-1">不正確</option>
						</select>
						</td>
						<td style="width: 100px;">
						  <div class="wavclass" id="wavshow-<?php echo $temp;?>"></div>
						  <input type="hidden" id="wavget-<?php echo $temp;?>" value="<?=$row->voice_file?>" />
						  </p>
						</td>
						<td><select id="note_value" name="note_value[]" style="width: 120px;" />
						 <option value="無">無</option>
						 <option value="省略">省略</option>
						 <option value="替代">替代</option>
						 <option value="扭曲">扭曲</option>
						 <option value="贅加">贅加</option>
						</select></td>
					</tr>
					<?php 
					$temp++;
					endforeach;?> 
				</tbody>
</table>
<button class="btn btn-primary"  id="Score_submit" style="display: inline-block;">確定</button>		
<div id="loadingIMG" style="display:none"><img src="<?=base_url("/images/ajax-loader.gif")?>" height='14'/>資料處理中，請稍後。</div>
<div id='ReturnViews'></div>						
</div>
</div>
</div>
				
					

</body>
</html>