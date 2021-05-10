

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
$default_css_file="default_navigator_sheet.css";
$css_basedir="common/css";

$default_css_file=$css_basedir . "/" . $default_css_file;

$global_css_file=$css_basedir . "/" . $uri_path . "_navigator_sheet.css";
//
//$custom_css_file=$css_basedir . "/" . $uri_path . "/" . $_SESSION["doc-type"] . "/" . "_navigator_sheet.css";
//echo "custom_css_file: " . $custom_css_file;
//echo "global: " . $global_css_file;
//echo $custom_css_file;

if (file_exists($custom_css_file)) {
	echo $custom_css_file;
}else if (file_exists ($global_css_file)) {
	echo $global_css_file;
} else {
	echo $default_css_file;
}
?> 
