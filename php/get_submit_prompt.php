
<?php 

require_once "onapdocs_functions.php";

$base_dir_path= format_db_path();
//
$config_file_name = "nav_config.json";
$topic_name = "";
$attr_name = "submit_tag";

$title_file_path = set_config_path ($base_dir_path, $topic_name, $config_file_name);

$attr_value =  get_json_attr ($title_file_path, $attr_name);

echo "\"" . $attr_value . "\"" ;
?> 
