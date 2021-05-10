<?php 
//<?php session_start();
//ini_set('session.cache_limiter', 'private');

//
// Read JSON file
//

$dir_path= format_db_path();
$file_name = $dir_path . "/" . "global_config/topics.json";

if (file_exists ($file_name) === FALSE) {
        //
        // Return an error msg if the nav)config.json file does not exist
        //
        echo  <<<EOT
file $file_name does not exist.
EOT;
        exit;
}


$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);

//
// only set the "selected" option once and ignore any subsequent
// release entries that may have it set by mistake

$found_default_option = 0;

foreach ($data as $loc) {

	echo "<option Value=\"";
	echo $loc['release_value'];
	if (strcmp($loc['display_default'], "yes") == 0 && $found_default_option == 0) {
		echo "\" selected> ";
		$found_default_option = 1;
	}
	else {
		echo "\"  " . $loc['release_status'];
		echo "> ";
	}

	echo $loc['release_name'];
	//echo " - " . $loc['release_status'];
	echo "</option>";
	echo "\n";
}
?>

