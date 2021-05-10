
<?php 

require_once "onapdocs_functions.php";

$base_dir_path= format_db_path();
//$file_name = $dir_path . "/" . "global_config/titles.json";
//
$config_file_name = "nav_config.json";
$topic_name = "";
$attr_name = "sub_title";

$title_file_path = set_config_path ($base_dir_path, $topic_name, $config_file_name);

echo  get_json_attr ($title_file_path, $attr_name);
?> 
