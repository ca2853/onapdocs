<?php

require_once "onapdocs_functions.php";


	$json_image_uri="a.png";

	if ( filter_var ($json_image_uri, FILTER_VALIDATE_URL) === FALSE ) {
		$image_uri = set_img_uri ($json_image_uri);
		echo "In " . __FILE__ . ": " . $image_uri . "(" . $image_uri . ")" . PHP_EOL;
	}else {
		echo "image_uri is a Link: (" . $json_image_uri . ")" . PHP_EOL;
	}
?>

