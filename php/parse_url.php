
<?php
//
//
// Parse out the URI pathe which is the string after the first slash in the URL
// if:
// url = 'https://safratech.net/onapdocs/action_page.php?release=istanbul&doc_type=comp-review'
// 	parse_url ($url) returns "/onapdocs/action_page.php
// 	explode ("/onapdocs/action_page.ph") returns $arr with the parsed out 
// 	string
// 	$arr[1] is the path_url (topic) 
// if:
// url = 'https://safratech.net/onapdocs'
// 	parse_url ($url) returns "/onapdocs
// 	explode ("/onapdocs") returns $arr with the parsed out 
// 	string
// 	$arr[1] is the path_url (topic) 
//

$str = parse_url ($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//echo "In parse_url.php, str: (" .  $str . ")" .PHP_EOL;

$arr = explode ("/", $str);
//echo "In parse_url.php, arr: (" . $arr[1] . ")" . PHP_EOL;

$_SESSION["path"] = $arr[1];
//$_SESSION["path"]= basename (dirname (parse_url ($_SERVER['REQUEST_URI'], PHP_URL_PATH) ) )

//
// echo "In parse_url.php, SESSION[\"path\"]: " .  $_SESSION["path"];
?>

