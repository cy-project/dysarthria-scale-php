<link rel="stylesheet" type="text/css" href="<?=base_url("/lib/bootstrap/css/bootstrap.css")?>">
<link rel="stylesheet" type="text/css" href="<?=base_url("/stylesheets/theme.css")?>">
<link rel="stylesheet" href="<?=base_url("/lib/font-awesome/css/font-awesome.css")?>">
		<?php 
			$length1 = count($this->data);
			$length4 = count($this->datacount);
			$tope = array();
			$tope[1] = "人員管理權限";
			$tope[2] = "專案管理權限";
			$tope[3] = "檢測權限";
			$tope[4] = "施測權限";
			$tope[5] = "公告權限";
			for($count1 = 1;$count1<=$length1;$count1++){?>	
				 <p class='block-heading '><?php echo$tope[$count1]; ?></p>
						<div id='page-stats' class='block-body collapse in'>
						<div class='pull-left span4 unstyled'>
				<?php $length2 = count($this->data[$count1]);
				for($count2 = 0; $count2<$length2;$count2++){
					$length3 = count($this->data[$count1][$count2]);?>
					<a href='#' id="<?php echo "Select_area_".$this->datoem[$count1][$count2];?>" style="
					<?php if($this->count1 == 2){
					$number = 0;
					for($count3 = 0;$count3<$length4;$count3++){
					if($this->datacount[$count3]->permission_id == $this->datoem[$count1][$count2]){
					echo "display: none;";
					$number = 1;}
					}
					if($number == 0)
					echo "display: block;";
					}elseif($this->count1 == 1){
					echo "display: block;";} ?>" onclick="switch_options('<?php echo "Options_area_".$this->datoem[$count1][$count2];?>','2')" id="<?php echo "Options_area_".$this->datoem[$count1][$count2];?>"><p><samp><?php echo $this->data[$count1][$count2]; ?></samp></p></a>
					
				<?php }?>
				</div></div>
						<div class='clearfix'></div>
			<?php }?>