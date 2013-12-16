<table class="sortable table">
		  <thead>
				<tr>
				  <th><a href="#">追蹤主題</a></th>
				  <th><a href="#">追蹤次數</a></th>
				</tr>
		  </thead>
		 
		  <tbody> 
		  <?php foreach($track->result() as $row): ?>
			<tr>
			  <td><a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>track/score_views_track_type/part_id/<?=$row->part_id?>" id="add_submit"><?=$row->name?></a></td>
			  <td><?php if($row->part_id==1){?>
					<?php echo ($row->number/3);?><?php }else{?><?=$row->number?><?php }?></td>
			</tr>
			<?php  endforeach;?> 
		  </tbody>
</table>