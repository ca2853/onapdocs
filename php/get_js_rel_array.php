<?php session_start();
ini_set('session.cache_limiter', 'private');



//
// Read JSON file
//
$file_name = 'json/onap_releases.json';
$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);


// Generate*declare) the javascript array var used in choose(opt) 
// in index.php

$var_releases_array =" var releases = [";



foreach ($data as $loc) {

	//
	// Populate te array with te releas values
	//
	$var_releases_array .= "\"" . $loc['release_value'] ."\"," ;
}

//
// the "Not_used" string is used to take care of the the comma in the array
//$var_releases_array .= "\"Not_Used\"" . " ];";
//

$var_releases_array .= " ];";
echo $var_releases_array;
?>

