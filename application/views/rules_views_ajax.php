<table class="table sortable">
				<thead>
					<tr>
						<th><a href="#">詳細說明</a></th>
						<th><a href="#">值</a></th>
						<th><a href="#">輸入</a></th>
						<th><a href="#">更新</a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php foreach($rules->result() as $row): ?>
					  <td><?=$row->guide?></td>
					  <td><?=$row->weight?></td>
					 
					  <td><input type="text" id="weight_<?=$row->id?>"/></td>
					  <td><a href="#"  onclick="result_up('<?=$row->id?>');">確定</a></td>
					<?php  endforeach;?> 
					</tr>
				</tbody>
</table>