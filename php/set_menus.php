
<?php 
//
// Set the .css file based on what is in the rootdir/css
//	the default is always default_navigator_sheet.css
//	if a css filename of "path"_navigator_sheet.css exist
//	it will be used instead
//);

#	'release'=>'Debug-is-on',

//$release_name = "honolulu";
//$doc_type = "use-cases";
//

$uri_path = $_SESSION["path"];
$default_menus_file="default_menus.html";
$html_basedir="common/html";

$default_menus_file=$html_basedir . "/" . $default_menus_file;
$custom_menus_file=$html_basedir . "/" . $uri_path . "_menus.html";

if (file_exists($custom_menus_file)) {
	include $custom_menus_file;
//echo $custom_menus_file;
}else{
	include $default_menus_file;
//echo $default_menus_file;
}
?> 
