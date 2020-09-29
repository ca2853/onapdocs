
<?php
//$_POST = array(
	//'release'=>'El Alto',
	//'doc_type'=>'dev-guide',
//);
#	'release'=>'Debug-is-on',

$release_name = $_POST["release"];
$doc_type = $_POST["doc_type"];
$css_tag = "position-main";


$file_name = 'json/onap_releases.json';
$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);
foreach ($data as $loc) {

	//echo "Release name: " . $loc['release_name'] . PHP_EOL;
	if ($loc['release_name'] == $release_name) 
	{
		echo "<img  id = " . "\"". $css_tag ."\"\n";
		echo "\tsrc = ";
		echo "\"" . $loc['image_uri'] . "\"\n";
		echo "\talt = \"Image file" .$loc['image_uri'] . "not found\"\n";
		echo "\tusemap = "."\""."#".$doc_type."\""."\n";
		echo "\n>\n";
		echo "\t<map name = "."\"".$doc_type."\"".">\n";
	}


}
?> 
