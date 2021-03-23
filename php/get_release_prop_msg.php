<?php

$file_name = "json/titles.json";

$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rec) {
	/*
	if ($rec['comp_name'] == $c_name) 
	{
	 */
		printf ("%s", $rec['release_prop_msg']) ;
	/*
		break;
	}
	 */
}
?> 
