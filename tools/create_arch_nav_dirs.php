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
print_banner();

$num_args = $argc;

//echo "argc: " . $num_args .PHP_EOL;
//echo PHP_EOL;


if ($num_args != 4)
{
	echo "Usage: $argv[0]: uri_path topics.json full_path_to_data_dir" . PHP_EOL;
	exit;
} else {
    $uri_path = $argv[1];
    $file_name = $argv[2];
    $base_dir = $argv[3];
}
//
//
//  ex: safratech.net/"path_uri"
//
// full_path_to
// 	|
//  base_dir (this should be the same as the "path_uri"
//  	|
//  	+--json_db_path
// 		|
// 		+--topic_dirs
// 		|
// 		+--Common_dirs
//		|

if ( file_exists($base_dir) === FALSE) {
	//mkdir ("$base_dir");
	echo "[ " .$base_dir ." ] does not exist"  . PHP_EOL;
	exit;
} 
//$json_db = "json_db";
$base_dir .= "/" . $uri_path; 
make_dirs ($base_dir);

$json_db_path = $base_dir . "/" . "json_db";
make_dirs ($json_db_path);

$global_config_dir = $json_db_path .  "/" . "global_config"; 
make_dirs ($global_config_dir);

$common_dirs = array ("css", "local_config");

//echo "Processing file: (" . $file_name .")" . PHP_EOL;
//echo PHP_EOL;
//
$readjson = file_get_contents($file_name);

$var = "release_value";
//$json_attr = "loc["$var"]";

$data = json_decode($readjson, true);
foreach ($data as $loc) {
		//echo $loc["release_value"] . " " . PHP_EOL;
//		$topic_dir=$loc["release_value"];
		$topic_dir=$loc["$var"];
		$topic_dir_path = $json_db_path . "/" . $topic_dir;

		make_dirs ($topic_dir_path);

		$options_count = sizeof ($loc["options"]);
		//echo $options_count . "...";

		for ( $i = 0; $i < $options_count; $i++)
		{
			//echo "(" . $i . ")" . $loc["options"][$i]["value"] . ", " ;
			echo "	";
			echo  "[$bold_blue" . $loc["options"][$i]["value"] . "$end_of_color]" . " >>> " . PHP_EOL;
			echo "	";
			//
			$doc_type_path = $topic_dir_path . "/" . $loc["options"][$i]["value"];
			make_dirs ($doc_type_path);
		}

		echo "Making common dirs..." .PHP_EOL;
		for ( $j = 0; $j < count($common_dirs); $j++) {
			$common_dir_path = $topic_dir_path . "/" . $common_dirs[$j];
			echo "	";
			echo  "[$bold_blue" . $common_dirs[$j] . "$end_of_color]" . " >>> " . PHP_EOL;
			make_dirs ($common_dir_path);
		}
		echo PHP_EOL;


}

function make_dirs ($path)
{
global $bold_red ;
global $bold_green;
global $bold_blue;
global $end_of_color;
	if ( file_exists($path) === FALSE) {
		mkdir ("$path");
		echo "Making " . "[$bold_green" . $path . "$end_of_color]"  . PHP_EOL;
	} else {
		echo "[" . $bold_red . $path . " \033[0m]"  . " exists " . "continue..." . PHP_EOL;
	}
}

function print_banner()
{
global $bold_blue;
global $bold_green;;
global $end_of_color;

	echo $bold_green .  "
   _____            __                  _______                 _                          _
  / ____|          / _|                |__   __|               | |                        | |
 | (___     __ _  | |_   _ __    __ _     | |      ___    ___  | |__        _ __     ___  | |_
  \___ \   / _` | |  _| | '__|  / _` |    | |     / _ \  / __| | '_ \      | '_ \   / _ \ | __|
  ____) | | (_| | | |   | |    | (_| |    | |    |  __/ | (__  | | | |  _  | | | | |  __/ | |_
 |_____/   \__,_| |_|   |_|     \__,_|    |_|     \___|  \___| |_| |_| (_) |_| |_|  \___|  \__|
 " .
 "
  ______   ______   ______   ______   ______   ______   ______   ______   ______   ______   ______   ______ 
 |______| |______| |______| |______| |______| |______| |______| |______| |______| |______| |______| |______|
                                                                                                            
". $end_of_color;

}
?>

