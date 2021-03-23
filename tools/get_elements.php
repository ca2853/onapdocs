
<?php ;
//<?php session_start();
//ini_set('session.cache_limiter', 'private');	

// Read JSON file
$file_name = '../json/onap_releases.json';
$readjson = file_get_contents($file_name);

$this_func = __FUNCTION__;
echo "in function: " .  $this_func . PHP_EOL;
//
//Decode JSON
$data = json_decode($readjson, true);


//Release pulldown menu data


foreach ($data as $rel) {

	$options_count = sizeof ($rel["options"]);
echo "in function: " .  $__FUNCTION__ . PHP_EOL;
	echo $rel["release_value"] . ": " ;
	echo $rel["display_default"] . ": " .PHP_EOL;
	for ( $i = 0; $i < $options_count; $i++)
                {

		echo "	" . $rel["options"][$i]["value"] . "";
		echo "	" . $rel["options"][$i]["name"] . "";
		echo "	" . $rel["options"][$i]["display_default"] .PHP_EOL;
	}
	echo PHP_EOL;
}
?> 

