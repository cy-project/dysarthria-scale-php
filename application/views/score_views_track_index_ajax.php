<?php foreach($track->result() as $row): ?>
	<a class="various" data-fancybox-type="iframe" href="<?php echo base_url();?>track/score_views_track_type/part_id/<?=$row->part_id?>" id="add_submit"><?=$row->name?></a>(<?php if($row->part_id==1){?>
	<?php echo ($row->number/3);?><?php }else{?><?=$row->number?><?php }?>)
<?php  endforeach;?> 