<?php



$rel_name = $_SESSION['release'];
$doc_type = $_SESSION['doc_type'];

//$rel_name = "honolulu";
//$doc_type = "comp-review";

$file_name = "json/onap_releases.json";

$readjson = file_get_contents($file_name);


//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rel) {

        $options_count = sizeof ($rel["options"]);

        if (strcmp ($rel['release_value'], $rel_name ) == 0)
        {
                for ( $i = 0; $i < $options_count; $i++)
                {
                        if (strcmp($rel["options"][$i]["value"], $doc_type) == 0)
                        {
                                echo "<H3 id=\"main_menu_title_medium\">";
                                echo "<center>".$rel["options"][$i]["display_str"]."</center></H3>" . PHP_EOL;
                                echo "<H2 id=\"main_menu_title_small\">";
                                echo "<center>".$rel["release_name"] ."</center></H2>";
                                break;
                        }
                }
        }
}
?>

