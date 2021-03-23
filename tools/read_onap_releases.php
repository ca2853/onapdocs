#!/usr/bin/php
<?php

//$num_args = var_dump($argc);
$num_args = $argc;
echo "argc: " . $num_args .PHP_EOL;


if ($num_args != 2)
{
	echo "Usage: $argv[0]: file_name" . PHP_EOL;
	exit;
} else {
    $file_name = $argv[1];
}

echo "argc: " . $num_args . " Processing ..." . $file_name . PHP_EOL;
$readjson = file_get_contents($file_name);

$data = json_decode($readjson, true);
foreach ($data as $loc) {
		echo "<option value=" . "\"" . $loc["release_value"] . "\">" .  $loc["release_name"] . "</option>" . PHP_EOL;

		$options_count = sizeof ($loc["options"]);
		//echo $options_count . "...";

		for ( $i = 0; $i < $options_count; $i++)
		{
			echo "(" . $i . ")" . $loc["options"][$i]["value"] . ", " ;
		}
		echo PHP_EOL;
		echo PHP_EOL;
}



//Print data
//print_r($data);

?>

