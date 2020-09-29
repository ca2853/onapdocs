<?php session_start();
ini_set('session.cache_limiter', 'private');	

// Read JSON file
$file_name = 'json/onap_releases.json';
$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);


//Parse the employee name


foreach ($data as $loc) {
  #echo "<p><b>Row number $row</b></p>";
  #echo "<ul>";
		echo "<option Value=\"";
		echo $loc['release_value'];
		//if ($loc['release_status']  == "current")
		if (strncmp($loc['release_status'], "current", 7) == 0)
			echo "\" selected> ";
		else
			echo "\"> ";
		echo $loc['release_name'];
		echo " - " . $loc['release_status'];
		echo "</option>";
		echo "\n";
}
?> 

