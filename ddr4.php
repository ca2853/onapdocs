<?php

session_start();

//include_once "php/classes.php";
include_once "php/onapdocs_functions.php";


$_SESSION["debug_mode"] = 'on';
$base_dir_path= "/data/navigator_db";
//echo $base_dir_path;
//
$config_file_name = "nav_config.json";
$topic_name = "";
$attr_name = "release_prop_msg";
$title_file_path = "";

prt_debug_as_comments ($base_dir_path, __FILE__, __LINE__);
prt_debug_as_comments ($attr_name, __FILE__, __LINE__);
?> 
