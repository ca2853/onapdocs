
<?php session_start();
//
// $_POST = array(
// 	'release'=>'guilin',
// 	'doc_type'=>'dev-guide',
// );
//
#	'release'=>'Debug-is-on',

$release_name = $_SESSION["release"];
$doc_type = $_SESSION["doc_type"];

$css_tag = "position-main";


$file_name = 'json/onap_releases.json';
$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);
foreach ($data as $rel) {

//echo "Release name: " . $rel['release_name'] . PHP_EOL;

	if ($rel['release_value'] == $release_name) {
		//
		// If image_uri at the documet level (doc_type) is set use it; otherwise default yp the
		// release level image_uri
		//
		$image_uri = $rel['image_uri'];

		$options_count = sizeof ($rel["options"]);

		for ( $i = 0; $i < $options_count; $i++)
		{
			if (strcmp($rel["options"][$i]["name"], $doc_type ) == 0) {
				 
				if ( !empty($rel["options"][$i]["image_uri"]) ) {
					//
					//image_uri at the doc_type level is set; use it
					//
					$image_uri = $rel["options"][$i]['image_uri'];
				}
			}
		}


		echo "<img  id = " . "\"". $css_tag ."\"\n";
		echo "\tsrc = ";
		echo "\"" . $image_uri . "\"\n";
		echo "\talt = \"Image file  >>>[" .$image_uri . "] not found\"\n";
		echo "\tusemap = "."\""."#".$doc_type."\""."\n";
		echo "\n>\n";
		echo "\t<map name = "."\"".$doc_type."\"".">\n";
	}


}
?> 
