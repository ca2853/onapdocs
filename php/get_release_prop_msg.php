
<?php 

require_once "onapdocs_functions.php";

$base_dir_path= format_db_path();
//
$config_file_name = "nav_config.json";
$topic_name = "";
$attr_name = "release_prop_msg";

$title_file_path = set_config_path ($base_dir_path, $topic_name, $config_file_name);
//echo "in: " , __FILE__ . " title_file_path >>> (" . $title_file_path . ")\n";

echo  get_json_attr ($title_file_path, $attr_name);
?> 
