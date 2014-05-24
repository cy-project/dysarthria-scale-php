<html>
<link rel="stylesheet" type="text/css" href="<?=base_url("/lib/bootstrap/css/bootstrap.css")?>">
<link rel="stylesheet" type="text/css" href="<?=base_url("/stylesheets/theme.css")?>">
<link rel="stylesheet" href="<?=base_url("/lib/font-awesome/css/font-awesome.css")?>">
		<?php 
			$length1 = count($this->data);
			$tope = array();
			$tope[1] = "人員管理權限";
			$tope[2] = "專案管理權限";
			$tope[3] = "檢測權限";
			$tope[4] = "施測權限";
			$tope[5] = "公告權限";
			$length = count($tope);
			for($count = 1;$count <= $length; $count++){
				echo "<p class='block-heading'>".$tope[$count]."</p>
						<div id='page-stats' class='block-body collapse in'>
						<div class='pull-left span4 unstyled'></div></div>
						<div class='clearfix'></div>";
			}
			/*for($count1 = 1;$count1<=$length1;$count1++){	
				echo "<p class='block-heading'>".$tope[$count1]."</p>
						<div id='page-stats' class='block-body collapse in'>
						<div class='pull-left span4 unstyled'>";
				$length2 = count($this->data[$count1]);
				for($count2 = 0; $count2<$length2;$count2++){
					$length3 = count($this->data[$count1][$count2]);
					echo "<div class='pull-left span4 unstyled'>";
					for($count3 = 0;$count3<$length3;$count3++){
						echo "<a value='".$this->datoem[$count1][$count2][$count3]."' href=''><p><samp>".$this->data[$count1][$count2][$count3]."</samp></p></a>";
					}
					echo "</div>";
				}
				echo "</div></div>
						<div class='clearfix'></div>";
			}*/
		?>

</html>