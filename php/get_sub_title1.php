<?php

$file_name = "json/titles.json";

$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rec)
{
	echo  $rec['sub_title1'] . "\n";

}
?> 
