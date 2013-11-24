<?php

$dir = "./";
getDirList($dir);

function getDirList($dir){
	if(is_dir($dir)){
		$dh = opendir($dir);
		chdir($dir);
		while(($file = readdir($dh)) != false){
			if(is_dir($file) && basename($file) != '.' && basename($file) != '..'){
				getDirList($file);
			}
			else if(filename($file) != "." && filename($file) != ".."){
				echo $file.",";
			}
		}
		chdir("../");
		closedir($dh);
	}
}

function filename($file){
	$path_parts = pathinfo($file);
	return basename($file, $path_parts['extension']);
}

?>