未檢測 
		<div id="css_table">
		
		<div class="css_tr">
			   
				  <div class="css_td">
				  題目
				  </div>
				  <div class="css_td">
				  檢測
				  </div>
		</div>
		
			<?php foreach($topic_on->result() as $row): ?>
			  <div class="css_tr">
			   
				  <div class="css_td">
				  <?php if($part_id==1){?>
						<?=$row->title?>
				<?php }else{?>	
				<?=$row->script?>
				<?php } ?>
				  </div>
				  <div class="css_td">
				  <?PHP if($part_id==1){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_symbol/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>" >檢測評分</a>
				  <?php }elseif($part_id==2){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_words/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>" >檢測評分</a>
						
				  <?php }elseif($part_id==3){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_words/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>" >檢測評分</a>
				  <?php }elseif($part_id==4){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_words/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>" >檢測評分</a>
				  <?php }elseif($part_id==5){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_symbol/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>" >檢測評分</a>
				 <?php }?>
				  </div>
			  </div>	
			<?php  endforeach;?> 
		</div>
		  
		已檢測
		<div id="css_table"> 
		
			<div class="css_tr">
				   
					  <div class="css_td">
					  題目
					  </div>
					  <div class="css_td">
					  推薦追蹤狀態
					  </div>
					  <div class="css_td">
					  推薦追蹤
					  </div>
			</div>

			<?php foreach($topic_yes->result() as $row): ?>
			  <div class="css_tr">
			   
				  <div class="css_td">
						 <?php if($part_id==1){?>
						<?=$row->title?>
				<?php }else{?>	
				<?=$row->script?>
				<?php } ?>
				  </div>
				  <div class="css_td">
						<?php if($row->istrace=="0"){?>
							已被追蹤
						<?php }else{ ?>
							檢測通過，但尚未被追蹤
						<?php }?>
						</div>
				  <div class="css_td">
				  
					
					
							<a  href="#" onclick="JavaScript:Track_submit('<?=$row->judgment_ids?>')">追蹤</a>
						
							
					
						
				  </div>	
						
				  
				  
			  </div>	
			
		</div>
	<?php  endforeach;?> 
	  &nbsp;&nbsp;&nbsp;