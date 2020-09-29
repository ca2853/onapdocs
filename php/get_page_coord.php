<?php
#$_POST = array(
#       'release'=>'amsterdam',
#       'doc_type'=>'dev-guide',
#);

//       'release'=>'Debug-is-on',
// Read JSON file
//
$release_name = $_POST['release'];
$doc_type = $_POST['doc_type'];
$json_dir = 'json';
$dash = '-';
$file_name = $json_dir."/".$release_name.$dash.$doc_type.$dash."page-coords".".json";

#echo "$file_name\n";

$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);

//Print data
#print_r($data);
#echo "<br/><br/>Location names are: <br/>";

//Parse the employee name
foreach ($data as $loc) {
        echo "\t<area\n";
        echo "\t\tshape = \"";
  echo $loc['shape']."\"\n";
        echo "\t\tcoords = \"";
  echo $loc['coords']."\"\n";
        echo "\t\thref = \"";
  echo $loc['href']."\"\n";
        echo "\t\talt = \"";
  echo $loc['name']."\"\n";
        echo "\t\ttarget = \"";
  echo $loc['target']."\"\n";
  echo "\t>\n";

}
?>

<?php
