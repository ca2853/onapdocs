#!/usr/bin/php
<?php

//$num_args = var_dump($argc);
//
// Set Colors
//

$bold_red = "\033[01;31m";
$bold_green = "\033[01;32m";
$bold_blue = "\033[01;36m";
$end_of_color = "\033[0m";
$end_of_color = "\033[0m";

$num_args = $argc;

//echo "argc: " . $num_args .PHP_EOL;
//echo PHP_EOL;


if ($num_args != 3)
{
	echo "Usage: $argv[0]: topics.json full_path_to_data_dir" . PHP_EOL;
	exit;
} else {
    $file_name = $argv[1];
    $base_dir = $argv[2];
}
//
// exit if base directory does not exists already 
//  base_dir
//  	  |-> json_db_path
//  	  		|-> 
if ( file_exists($base_dir) === FALSE) {
	//mkdir ("$base_dir");
	echo "[ " .$base_dir ." ] does not exist"  . PHP_EOL;
	exit;
} 
$json_db = "json_db";
$json_db_path = $base_dir . "/" . "json_db";
make_dirs ($json_db_path);

$common_dirs = array ("css", "json");

//echo "Processing file: (" . $file_name .")" . PHP_EOL;
//echo PHP_EOL;
//
$readjson = file_get_contents($file_name);

$data = json_decode($readjson, true);
foreach ($data as $loc) {
		//echo $loc["release_value"] . " " . PHP_EOL;
		$parent_dir=$loc["release_value"];
		$full_path = $json_db_path . "/" . $parent_dir;

		make_dirs ($full_path);

		$options_count = sizeof ($loc["options"]);
		//echo $options_count . "...";

		for ( $i = 0; $i < $options_count; $i++)
		{
			//echo "(" . $i . ")" . $loc["options"][$i]["value"] . ", " ;
			echo "	";
			echo  "[$bold_blue" . $loc["options"][$i]["value"] . "$end_of_color]" . " >>> " . PHP_EOL;
			echo "	";
			//
			$sub_dir = $full_path . "/" . $loc["options"][$i]["value"];
			make_dirs ($sub_dir);
		}

		echo "Making common dirs..." .PHP_EOL;
		for ( $j = 0; $j < count($common_dirs); $j++) {
			$sub_dir = $full_path . "/" . $common_dirs[$j];
			echo "	";
			make_dirs ($sub_dir);
		}
		echo PHP_EOL;


}

function make_dirs ($path)
{
global $bold_red ;
global $bold_green;
global $bold_blue;
global $end_of_color;
global $end_of_color;
	if ( file_exists($path) === FALSE) {
		mkdir ("$path");
		echo "Making " . "[$bold_green" . $path . "$end_of_color]"  . PHP_EOL;
	} else {
		echo "[" . $bold_red . $path . " \033[0m]"  . " exists " . "continue..." . PHP_EOL;
	}
}


//Print data
//print_r($data);

?>

