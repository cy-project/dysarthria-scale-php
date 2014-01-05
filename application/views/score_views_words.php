<!DOCTYPE html>
<html lang="tw">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Welcome to CodeIgniter</title>

<?php include "head.php"; ?>
	
<script type="text/javascript">
$().ready(function(){
//初始化載入

		js_Score_click();
		mp3s();
		sorttables();
});

function mp3s(){

$('a[@href$="mp3"]').flash(
        { src: '<?=base_url("/js/singlemp3player.swf")?>', height: 50, width: 100 },
        { version: 7 },
        function(htmlOptions) {
            $this = $(this);
            htmlOptions.flashvars.file = $this.attr('href');
            $this.before($.fn.flash.transform(htmlOptions));						
        }
    );

}


function js_Score_ajax(){ // ajax 傳值

var booleans=false; //判斷array內是否有空值

var Score_value = $("select[id='Score_value']").map(function(){
return $(this).val();}).get(); //取name[]的value型態array

var Note_value = $("select[id='note_value']").map(function(){
return $(this).val();}).get(); //取name[]的value型態array

var Topic_id = $("input[id='Topic_id']").val();

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
				alertify.alert('Ajax request 發生錯誤'+xhr.responseText);
				//$('#ReturnViews').html(xhr.responseText);
			  },
			  success: function(response) {
			  //$('#ReturnViews').html(response);
			  
				  if(response==1){
						
						alertify.alert('合格，請按下 ok!');parent.topics_ajax(); 
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


</head>
<body>

<div class="container-fluid">
<div class="row-fluid">
<div class="well" >
<?php foreach($topic->result() as $row):?>
	<h5 class="page-title"><?=$row->title?>檢測</h5>
<?php endforeach;?>
		<embed width="100" height="20" type="application/x-shockwave-flash" src="<?=base_url("/js/singlemp3player.swf")?>" pluginspage="http://www.adobe.com/go/getflashplayer" flashvars="file=<?=base_url()?><?=$row->voice_file?>"/>
		
			<table class="sortable table"><!--施測名單-->
				<thead>
					<tr>
						<th><a href="#">題目</a></th>
						<th><a href="#">評分</a></th>
						<th><a href="#">備註</a></th>
					</tr>
				</thead>
				<tbody>
					
						<?php 
							$script="";
							
							foreach($topic->result() as $row): 
							 
							 $script=$row->script;
							 $part=$row->part;
							endforeach;
								
							preg_match_all('/./u', $script, $matches);
							if($part==4){
							
							$matches=$matches[0];
							
							for($i=0;$i<sizeof($matches);$i+=2){
							
							$j=$i;
							$matches2[]=$matches[$i]."".$matches[$j+1];
							}
							
							
							$matches=$matches2;
							}else{
							
							$matches=$matches[0];
							
							}
							
							
							for($i=0;$i<sizeof($matches);$i++){?>
		
							<tr>
								<td>
									<?php echo $matches[$i];?>
								</td>
								<td>
									<select id="Score_value" name="Score_value[]" >
									 <option value="1">正確</option>
									 <option value="0">不清楚</option>
									 <option value="-1">不正確</option>
									</select>
								</td>
								<td>
									<select id="note_value" name="note_value[]">
									 <option value="無">無</option>
									 <option value="省略">省略</option>
									 <option value="替代">替代</option>
									 <option value="扭曲">扭曲</option>
									 <option value="最佳">最佳</option>
									</select>
								</td>
							</tr>
					<?php }?>
					
					
					
</tbody>
</table>
<input type="hidden" id="Topic_id" name="Topic_id[]"  value="<?=$row->id?>"/>
<button class="btn btn-primary"  id="Score_submit" style="display: inline-block;">確定</button>	
</div>
</div>
</div>
	

</body>
</html>