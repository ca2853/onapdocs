<?php session_start();
ini_set('session.cache_limiter', 'private');	

// Read JSON file
$file_name = 'json/main_menu_options.json';
$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);


//Parse the employee name


foreach ($data as $menu_option) {
  #echo "<p><b>Row number $row</b></p>";
  #echo "<ul>";
		echo "<option Value=\"";
		echo $menu_option['option_name'];

		if (strcmp($menu_option['display_default'], "yes") == 0)
			echo "\" selected> ";
		else
			echo "\"> ";
		echo $menu_option['option_value'];
		echo "</option>";
		echo "\n";
}
?> 

