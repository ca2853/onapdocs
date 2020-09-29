
<?php
#$_POST = array(
#	'release'=>'amsterdam',
#	'doc_type'=>'dev-guide',
#);
#	'release'=>'Debug-is-on',

$release_name = $_POST["release"];
$doc_type = $_POST["doc_type"];
$filesuffix = '.png';
$imagedir = 'images/';
$onap_str = 'onap-diagram';
$filename = $imagedir.$release_name."-".$onap_str."-".$doc_type.$filesuffix;
$css_tag = "position-main";
$usemap = $_POST["doc_type"];

echo "<img  id = "."\"".$css_tag."\""."\n";
echo "\tsrc = ";
echo "\"$filename\"\n";
echo "\talt = \"Image file  $filename not found\"\n";
echo "\tusemap = "."\""."#".$usemap."\""."\n";
echo "\n>\n";
echo "\t<map name = "."\"".$usemap."\"".">\n";
?> 

