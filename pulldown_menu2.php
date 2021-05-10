
<?php 
//ini_set('session.cache_limiter', 'private');	

require_once "php/onapdocs_functions.php";

// Read JSON file
$dir_path= format_db_path();
$file_name = $dir_path . "/" . "global_config/topics.json";


//echo $file_name;

$readjson = file_get_contents($file_name);

//
//Decode JSON
$data = json_decode($readjson, true);


//
//	Option (doc_type) pulldown menu, menu2
// the logic here s that the first release with the select default option
// set will be used. All other "select" options will be ignored  
//



$found_selected_rel = 0;

foreach ($data as $rel) {

	$option_selected = 0;
	$options_count = sizeof ($rel["options"]);

	//
	// read ahead to check the for  selected option on menu 2
	//  to display on the first page fr the first time
	//

	echo PHP_EOL;
	if ($option_selected  == 0 && $found_selected_rel == 0) {
		for ( $i = 0; $i < $options_count; $i++) {
			if (strcmp($rel["display_default"], "yes") == 0) {
				$option_selected = 1;
			}
		}
	}
//echo "option_selected = " . $option_selected . PHP_EOL;
//echo "found_selected_rel = " . $found_selected_rel . PHP_EOL;
	
	if ($option_selected  == 1) {
		format_select_tag ("inline", $rel["release_value"], "doc_type");
		$found_selected_rel = 1;
	}
	elseif ($found_selected_rel == 1) {
		format_select_tag ("none", $rel["release_value"], "");
	}
	else {
		format_select_tag ("none", $rel["release_value"], "");
	}


	//echo PHP_EOL . "Options Count: " .  $options_count . PHP_EOL;

	$found_selected_option = 0;
	for ( $i = 0; $i < $options_count; $i++)
		{
		echo "	<option value=\"";

		echo $rel["options"][$i]["value"] ."\"";
		if (strcmp($rel["options"][$i]["display_default"], "yes") == 0 && $found_selected_option == 0) {
			echo " selected ";
			$found_selected_option = 1;
		}
		elseif (strcmp($rel["options"][$i]['status'], "disabled") == 0)
			echo " disabled ";
		echo "> ";
		//echo PHP_EOL;
		echo $rel["options"][$i]["name"];
		//echo PHP_EOL;
		echo  "</option>" ;
		echo PHP_EOL;
	}
	echo "</select>";
	echo PHP_EOL;
}
//
// Format the "select" tag line for menu2
//
function format_select_tag ($display, $rel, $name)
{
	echo PHP_EOL . "<select id=";
	echo "\"" .  $rel . "-doc-type\" ";
	echo "name=\"$name\" ";
	echo "style=\"display: " . "$display" . "\"" ." >" . PHP_EOL;

}
?> 

