<?php
# For local testing uncomment the lines below
# 
#$_POST = array(
#	'release'=>'amsterdam',
#	'doc_type'=>'arch-overview',
#);


#$page_header = array(
#	'arch-overview'=>'Architecture Overview',
#	'dev-guide'=>'Components Architecture and API Specs',
#	'devops-guide'=>'Dev Ops',
#	'user-guide'=>'User Guide',
#);

$file_name = "json/main_menu_options.json";
$menu_options = file_get_contents($file_name);

#$data = json_decode($readjson, true);
$data = json_decode($menu_options, true);

$doc_type = $_POST["doc_type"];

foreach ($data as $page_header) {

#<<<< echo "***". "(".$doc_type . ")"."*****\n";

	if ($page_header["option_name"] == $doc_type) {
		#echo "***". "(".$page_header[$doc_type] . ")"."*****\n";
		#var_dump($page_header);

		#echo "<<<< ".$doc_type_name." >>>>"."\n";
		echo "<H3 id=\"main_menu_title_medium\">";
		echo "<center>".$page_header["option_value"]."</center></H3>" . PHP_EOL;
		echo "<H2 id=\"main_menu_title_small\">";
		echo "<center>".$_POST["release"] ."</center></H2>";
		#$doc_type_title = $page_header[$doc_type_name];
		#echo "<<<< ".$doc_type_title." >>>>"."\n";
		break;
	}
}
?> 

