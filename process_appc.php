<html lang="en">
<head>
<meta charset="UTF-8">
<title>ONAPDOCS Landing Page</title>
<meta name="description" content="">

<link rel="stylesheet" href="css/menu_style.css"> 

<!-- IE6-8 support of HTML5 elements --> <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>

<!--
-->
<div>
<H3 id="main_menu_title_medium"><center>APPC API's </center></H3>
<H2 id="main_menu_title_small"><center> <?php session_start(); echo "Rel: " . $_SESSION["release"]; ?></center></H2>
</div>

<!--
<div id="onap_lfn_menu">
-->
<div >

	
	<?php 
		$OnapCompName = "APPC";
		include 'php/main.php'; /* format page bitmap coords */
	?>

</div><!--end wrapper-->

</body>
</html>
