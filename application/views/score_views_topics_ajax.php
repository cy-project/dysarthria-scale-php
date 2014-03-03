<div class="well" >
		<h5 class="page-title">未評測</h5>
			<table class="sortable table"><!--施測名單-->
				<thead>
					<tr>
						<th><a href="#">題目</a></th>
						<th><a href="#">檢測</a></th>
						
					</tr>
				</thead>
				<tbody>
				<?php 
				//print_r($topic_on->result());
				foreach($topic_on->result() as $row): ?>
					<tr>
						<td>
						<?php if($part_id==1){?>
						<?=$row->title?>
						<?php }else{?>	
						<?=$row->script?>
						<?php } ?>
						</td>
						<td>
						<?php if($part_id==1){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_symbol/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>/project_id/<?=$project_id?>" >檢測評分</a>
				  <?php }elseif($part_id==2){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_words/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>/project_id/<?=$project_id?>" >檢測評分</a>
						
				  <?php }elseif($part_id==3){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_words/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>/project_id/<?=$project_id?>" >檢測評分</a>
				  <?php }elseif($part_id==4){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_words/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>/project_id/<?=$project_id?>" >檢測評分</a>
				  <?php }elseif($part_id==5){?>
						<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>score/score_views_symbol/member_id/<?=$member_id?>/result_id/<?=$row->result_id?>/testing_list_id/<?=$testing_list_id?>/project_id/<?=$project_id?>" >檢測評分</a>
				 <?php }?>
				 </td>			
				</tr>
				<?php  endforeach;?> 
				</tbody>
			</table>
		</div>
		
		<div class="well" >
		<h5 class="page-title">已評測</h5>
			<table class="sortable table"><!--施測名單-->
				<thead>
					<tr>
						<th><a href="#">題目</a></th>
						<th><a href="#">推薦追蹤狀態</a></th>
						<th><a href="#">推薦追蹤</a></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($topic_yes->result() as $row): ?>
					<tr>
						<td>
						<?php if($part_id==1){?>
						<?=$row->title?>
						<?php }else{?>	
						<?=$row->script?>
						<?php } ?>
						</td>
						<td>
						<?php if($row->istrace=="0"){?>
							已被追蹤
						<?php }else{ ?>
							檢測通過
						<?php }?>
						</td>
						<td>
						<a  href="#" onclick="JavaScript:Track_submit('<?=$row->judgment_ids?>')">追蹤</a>
						</td>
						
					</tr>
				<?php  endforeach;?> 	
				</tbody>
			</table>
		</div>

		
	 