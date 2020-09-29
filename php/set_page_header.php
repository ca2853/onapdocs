<?php
#$_POST = array(
#	'release'=>'amsterdam',
#	'doc_type'=>'arch-overview',
#);

$page_header = array(
	'arch-overview'=>'Architecture Overview',
	'dev-guide'=>'Components Architecture and API Specs',
	'devops-guide'=>'Dev Ops',
	'user-guide'=>'User Guide',
);

$doc_type = $_POST["doc_type"];
#echo "***".$doc_type."*****\n";
$doc_type_name = $page_header[$doc_type];
#echo "<<<< ".$doc_type_name." >>>>"."\n";
echo "<H3 id=\"main_menu_title_medium\">";
echo "<center>".$doc_type_name."</center></H3>" . PHP_EOL;
echo "<H2 id=\"main_menu_title_small\">";
echo "<center>".$_POST["release"] ."</center></H2>"
#$doc_type_title = $page_header[$doc_type_name];
#echo "<<<< ".$doc_type_title." >>>>"."\n";
?> 

