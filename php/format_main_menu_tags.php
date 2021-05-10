<?php 
//session_start();
	//header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
        //header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        //header("Cache-Control: post-check=0, pre-check=0",false);
        //session_cache_limiter("must-revalidate");


//require_once "onapdocs_functions.php";

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
//echo "<<<< DEBUG - **in format_main_menu_tags >>>> looking for doc_type: (" . $doc_type . ")" . PHP_EOL;
//$doc_type = "dev-guide";
//

$dir_path = format_db_path();
//
//  area_map_file is a symbolic link to the topics/doc_type json object file
//
//

$area_map_file = "area_map.json";
$onap_obj_file = $dir_path .  "/"  . $release_name . "/" . $doc_type . "/" . $area_map_file;
//
// The follwoing code generates HTML comments to help in debugging
// viow the HTML source and look for this comment by the <img>  tag
//
prt_debug_as_comments ($onap_obj_file, __FILE__, __LINE__);
//
// End og HTML comments generation
//

if (file_exists ($onap_obj_file) === FALSE) {
	//
        // Return an error msg if the nav)config.json file does not exist
        //
echo  <<<EOT
EOT;
        //exit;
	prt_debug_as_comments ($onap_obj_file, "JSON File Not Found", " ");

} else {

//echo "<<<< DEBUG in format_main_menu_tags.php>>>>" . "looking for: "  .  $onap_obj_file .  PHP_EOL;


//$real_image_sz = format_main_img_tag ($release_name, $doc_type);
//echo "<<< DEBUG in format_main_menu_tags.php >>>> Main Image Size: " . $real_image_sz . PHP_EOL;

$readjson = file_get_contents($onap_obj_file);

//Decode JSON
$data = json_decode($readjson, true);

//Print data
#print_r($data);
#echo "<br/><br/>Location names are: <br/>";

//Parse the map/area  attributes
//
echo "\t<map name = "."\"" . $doc_type ."\"" . " ". "id=" .  "\"image-map\"" . " >\n";

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
}
?>
