<?php 
	session_start();
      //Put session start at the beginning of the file
	//ini_set('session.cache_limiter', 'private');
	header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); 
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
	header("Cache-Control: post-check=0, pre-check=0",false);
	session_cache_limiter("must-revalidate");
?>

<?php 
//echo "REQUEST_METHOD:" . $_SERVER['REQUEST_METHOD']; 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$_SESSION['release'] = $_POST['release'];
		$_SESSION['doc_type'] = $_POST['doc_type'];
	}
	else {
		/*
		 * vars are passed in the URL
		 */
		$_SESSION['release'] = $_GET['release'];
		$_SESSION['doc_type'] = $_GET['doc_type'];

	}
//echo "<<<< DEBUG - in action_page.php >>>> looking for release: (" . $_SESSION['release'] . ")" . PHP_EOL;
//echo "<<<< DEBUG - in action_page.php >>>> looking for doc_type: (" . $_SESSION['doc_type'] . ")" . PHP_EOL;
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<TITLE><?php include 'php/get_main_title.php' ?></TITLE>
<meta name="description" content="">

<link rel="stylesheet" href=<?php session_start(); echo "json_db" . "/" . $_SESSION['release'] . "/css/menu_style.css"?>> 

<!-- IE6-8 support of HTML5 elements --> <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>

<?php 
	include 'php/set_page_header.php'; /* Format Pahe Header based ton Meny slection */ 
?>

<!--
  Check the supress_menus flag in titles.json 
 
-->

<?php 
require_once "php/onapdocs_functions.php";
//echo "REQUEST_METHOD:" . $_SERVER['REQUEST_METHOD']; 

$json_db = "json_db";
$titles_file = "titles.json";
$release_name = $_SESSION['release'];
$slash = "/";
$titles_file = $json_db . $slash . $release_name . $slash . "json" .  $slash . $titles_file;

//echo "titles_file: " . $titles_file . PHP_EOL;
$supress_menus = get_supress_menus_option($titles_file);
//echo "supress_menus**: " ."(" . $supress_menus .")";

if ($_SERVER['REQUEST_METHOD'] == 'POST' and $supress_menus == 'no' )
{
	/*
	 * menu.html file contains the menu options. display the menus only  
	 * when the user uses the main menu to access the subsequent pages
	 */

	include('menus.html');
}
?>


<div>
	<?php 
		include 'php/format_main_menu_tags.php'; /* format page bitmap coords */
	?>
      </map>
</div>
</body>
</html>
