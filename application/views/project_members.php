<div class="well" style="border: 0px;">
									<table class="sortable table">
										<thead>
											<tr>
												<th><a href="#">#</a></th>
												<th><a href="#">姓名</a></th>
												<th><a href="#">帳號</a></th>
												<th><a href="#">職業</a></th>
												<th class="sorttable_nosort">權限</th>
												<th class="sorttable_nosort">修改</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												print_r($this->data[0]->name);
												$length = count($this->data);
												for($fix = 0;$fix < $length; $fix++)
												{
											?>
											<tr>
												<td><?php echo $fix+1;?></td>
												<td><?php echo $this->data[$fix]->name;?></td>
												<td><?php echo $this->data[$fix]->account;?></td>
												<td><?php echo $this->data[$fix]->identity;?></td>
												<td>
													<?php if($this->data[$fix]->position == 1){
														echo "施測者";
													}?>
												</td>
												<td><a href="#myModal" data-toggle="modal" ><i class="icon-pencil"></i></a></td>
											</tr>
											<?php 
												}?>
										</tbody>
										</table>
								</div>