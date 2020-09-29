<?php session_start();
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: post-check=0, pre-check=0",false);
        session_cache_limiter("must-revalidate");


require_once "onapdocs_functions.php";
#$_POST = array(
       #'release'=>'elalto',
       #'doc_type'=>'dev-guide',
#);

//       'release'=>'Debug-is-on',
// Read JSON file
//
$release_name = $_SESSION['release'];
$doc_type = $_SESSION['doc_type'];

//echo "<<<< DEBUG - **in format_main_menu_tags >>>> looking for release: (" . $release_name . ")" . PHP_EOL;
//$doc_type = "dev-guide";
$onap_obj_file = $release_name . "/json/onapdocs_obj_file.json";


$real_image_sz = format_main_img_tag ($release_name, $doc_type);
//echo "<<< DEBUG in format_main_menu_tags.php >>>> Main Image Size: " . $real_image_sz . PHP_EOL;

$readjson = file_get_contents($onap_obj_file);

//Decode JSON
$data = json_decode($readjson, true);

//Print data
#print_r($data);
#echo "<br/><br/>Location names are: <br/>";

//Parse the map/area  attributes
//
foreach ($data as $loc) {
        echo "\t<area id = " . "\"" . $loc['id'] ."\"" .  PHP_EOL;
        echo "\t\tshape = \"";
  echo $loc['shape']."\"\n";
        echo "\t\tcoords = \"";
  echo $loc['coords']."\"\n";
        echo "\t\thref = \"";
	switch ($doc_type) {
	case "dev-guide":
//<<<< DEBUG >>>> echo "found a match" .PHP_EOL;
		//use either the Release main page image.png or
		//the component image.png, 
		//
		  echo $loc['d_href']."\"\n";
	case "requirements" :
		  echo $loc['r_href']."\"\n";
	default:
		  echo $loc['a_href']."\"\n";
	}
        echo "\t\talt = \"";
  echo $loc['name']."\"\n";
        echo "\t\ttarget = \"";
  echo $loc['target']."\"\n";
  echo "\t>\n";

}
?>
