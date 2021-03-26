
<?php

//
// 	DO NOT MODIFIED THIS FUNCTION BEFORE YOU READ THE COMMENTS 
//
// json/titles.json file has to exist as Release Name and Doc_type are not 
// defined until  Menu1 and Menu2 are created and a selection is made
//
$file_name = "json/titles.json";

$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rec) {
		return  $rec['supress_menus'];
}
?> 
