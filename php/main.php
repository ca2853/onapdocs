<?php 
//session_start();
//
// $__SESSION['release'] has a copy of the $_POST['release']
// $__SESSION['doc_type'] has a copy of the $_POST['doc_type']
// You shou thik of _SESSION as a non-persistant cookie tha
// only lasts for the duration of the session
// 

require_once "onapdocs_functions.php";


$release_name = $_SESSION["release"];
$doc_type = $_SESSION["doc_type"];

$json_db="/data/navigator_db" .  "/" . $_SESSION["path"]; . "/" . "json_db"
$onap_obj_file = $json_db . "/" . $release_name . "/" . $doc_type . "/onapdocs_obj_file.json";

echo "<<<< DEBUG in main.php>>>>" .  $release_name  . "(" . $doc_type . ")" . PHP_EOL;;


//if ($_GET) {
    //$component_name = $_GET['argument1'];
    //$image_file = $_GET['argument2'];
//} else {
    //$component_name = $argv[1];
    //$image_file = $argv[2];
//}

global $OnapCompName;
global $Comp_image_file;

//
//Get the global vars;
//

$ratio = array();
$css_tag_w_h = array();
$real_img_sz = array();

$component_name = $OnapCompName;

//echo "<<<< DEBUG: In main.php >>>> mage uri: ".$image_file.">>>> \n";

$css_tag = 'dev_page';

$css_tag_w_h = get_width_from_css ($css_tag); 
//echo "css_tag_width: " . $css_tag_width . PHP_EOL;
//
//echo "<<<< DEBUG in main.php >>>>  W: (" . $css_tag_w_h[0] .  ")" .PHP_EOL;
//echo "<<<< DEBUG in main.php >>>>  H: (" . $css_tag_w_h[1] . ")" . PHP_EOL;

$real_img_sz = format_img_tag ($onap_obj_file, $release_name, $component_name, $css_tag);
//echo "<<<< DEBUG real W: (" . $real_img_sz[0] .  ")" .PHP_EOL;
//echo "<<<< DEBUG real H: (" . $real_img_sz[1] . ")" . PHP_EOL;

$ratio[0] = $css_tag_w_h[0]/$real_img_sz[0];
$ratio[1] = $css_tag_w_h[1]/$real_img_sz[1];
//echo "<<<< DEBUG in main.php >>>> W-r[0]: (" . $ratio[0] . ")" . PHP_EOL;
//echo "<<<< DEBUG in main.php >>>> H-r[1]: (" . $ratio[1] . ")" . PHP_EOL;
//
// un-comment to disable coords resizining;
//
//$ratio[0] = 1;
//$ratio[1] = 1;


//echo "<<<< DEBUG in mian.php >>> ratio: " . $ratio . PHP_EOL;

//$css_width = get_width_from_css ($css_tag);
//echo "<<<< DEBUG: In main.php >>>> Real Image size in px: ".$real_image_width.">>>> \n";

format_map_area_tags ($onap_obj_file, $component_name, $css_tag, $ratio);

?>
