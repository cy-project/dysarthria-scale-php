<table class="sortable table">
	<tbody> 
	<?php foreach($part->result() as $row): ?>
		<tr>
			<td>
				<a href="<?=base_url("/projectview_student/subjects_view_glossary_student")?>/testing_list_id/<?=$testing_list_id?>/part_id/<?=$row->id?>/member_id/<?=$member_id?>/project_id/<?=$project_id?>?name=<?=$row->name?>"><?=$row->name?></a>
				
			</td>
		</tr>
	<?php  endforeach;?> 	
	</tbody>
</table>