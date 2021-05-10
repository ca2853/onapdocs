<?php 
	session_start();
      //Put session start at the beginning of the file
	//ini_set('session.cache_limiter', 'private');
	//header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); 
	//header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
	//header("Cache-Control: post-check=0, pre-check=0",false);
	//session_cache_limiter("must-revalidate");

//echo "In " . __FILE__ . ", Session Name: " . session_name();
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

<link rel="stylesheet" href=<?php include 'php/set_css.php' ?> > 

<!-- IE6-8 support of HTML5 elements --> <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>

<?php 
	include 'php/set_page_header.php'; /* Format Pahe Header based ton Meny slection */ 
?>

<?php 
require_once "php/onapdocs_functions.php";
//echo "REQUEST_METHOD:" . $_SERVER['REQUEST_METHOD']; 

$base_dir_path= format_db_path();
//echo "in action_page.php - base_dir_path:  " . $base_dir_path . PHP_EOL;

$topic_name = $_SESSION['release'];
//echo '$_SESSION["release"]: ' . $_SESSION["release"];

$config_file = "nav_config.json";
$config_file_path = set_config_path ($base_dir_path, $topic_name, $config_file);
echo <<<EOT
<!--
In action_page() and before being able to use prt_debug_as_comments()
config file:  $config_file_path ].

-->
EOT;



$_SESSION["debug_mode"] = get_json_attr ($config_file_path, "debug_mode");
//echo '$_SESSION["debug_mode"]: ' . $_SESSION["debug_mode"];
$supress_menus = get_json_attr ($config_file_path, "supress_menus");


prt_debug_as_comments ($config_file_path, __FILE__, __LINE__);

//
//
//echo "supress_menus**: " ."(" . $supress_menus .")";

if ($_SERVER['REQUEST_METHOD'] == 'POST' and $supress_menus == 'no' )
{
	/*
	 * menu.html file contains the menu options. display the menus only  
	 * when the user uses the main menu to access the subsequent pages
	 */

	//include('menus.html');
	include('php/set_menus.php');
}
?>


<div class="image-map-container">
	<?php 
		include 'php/format_img_tag.php'; /* format page bitmap coords */
	?>

<div class="map-selector">
</div>
</div>
	<?php 
		include 'php/format_main_menu_tags.php'; /* format page bitmap coords */
	?>
</map>

<!-- Javascript and JQuery Scripts -->

<script src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'>
</script>
<script src='js/hover_script.js' type="text/javascript">
</script>

</body>
</html>
