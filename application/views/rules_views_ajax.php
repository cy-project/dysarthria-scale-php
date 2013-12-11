<div id="css_table">

      <div class="css_tr">
         
          <div class="css_td">詳細說明</div>
		  <div class="css_td">值</div>
		  <div class="css_td">輸入</div>
		  <div class="css_td">更新</div>
		  
      </div>
	  <?php foreach($rules->result() as $row): ?>
		  <div class="css_td"><?=$row->guide?></div>
		  <div class="css_td"><?=$row->weight?></div>
		 
		  <div class="css_td">
		  <input type="text" id="weight_<?=$row->id?>"/></div>
		  <div class="css_td"><a href="#"  onclick="result_up('<?=$row->id?>');">確定</a></div>
		<?php  endforeach;?> 
</div>	