<?php 

require_once "onapdocs_functions.php";

$json_attr = "debug_mode";
$json_attr_value = get_json_attr ($json_attr); 

//
//
// Function()
//
//

function get_json_attr ($json_attr)
{
//$dir_path= format_db_path();
$dir_path= "/data/navigator_db/5g-blueprint/json_db";
$json_file_name = "titles.json";
$topic_name = "ops-5g";

$json_file_name_path = set_config_path ($dir_path, $topic_name, $json_file_name);

//
//echo "in get_main_title: " . $file_name;

$readjson = file_get_contents($json_file_name_path);

//Decode JSON
$data = json_decode($readjson, true);

	foreach ($data as $rec) {
			echo  $rec[$json_attr] ;
	}
}
?> 
