<?php

//
// Function format_img_tag
//

function format_img_tag ($onap_obj_file, $c_name, $css_tag) 
{
//$json_obj_file = $onap_Obj_file;

$css_tag = "position-component";
//$c_name = "EXTAPI";
$usemap = $c_name . "_Map";
$real_img_sz = 1;

// <<<< DEBUG >>>> echo "onap_obj_file: " . $onap_obj_file . PHP_EOL;
$readjson = file_get_contents($onap_obj_file);

//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rec) {
//echo "\"" . $rec['name']. PHP_EOL;
		if ($rec['name'] == $c_name) {

			echo "<img  id = "."\"".$css_tag."\""."\n";
			echo "\tsrc = ";
			echo "\"" . $rec['comp_detail']['img_uri'] . "\"\n";
			echo "\talt = \"Image file: " .   $rec['comp_detail']['img_uri']  . " not found\"\n";
			echo "\tusemap = "."\""."#".$usemap."\""."\n";
			echo "\n>\n";
			echo "\t<map name = "."\"".$usemap."\"".">\n";
			$real_img_sz =  $rec['comp_detail']['img_uri_sz_px']; 
			break;
		}
	}

return (int)$real_img_sz;

}
//
// Function gt_img_sz
//

function gt_img_sz ($c_name)
{

$file_name = "json/comp_images.json";

$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rec) {
	if ($rec['comp_name'] == $c_name) 
	{
		echo "image size: " . $rec['img_sz_px'] . PHP_EOL;
		break;
	}
}
}
//
//
//
//
// Read JSON file
//$file_name = '/usr/share/onapdocs-03/json/comp_api_info.json';
//

function format_map_area_tags ($onap_obj_file, $c_name, $css_name, $ratio)
{


//$c_name = "EXTAPI";

//Decode JSON

//Print data
#print_r($data);
#echo "<br/><br/>Location names are: <br/>";

$readjson = file_get_contents($onap_obj_file);

$data = json_decode($readjson, true);
//Parse 
foreach ($data as $loc)
{
	if ($loc['name'] == $c_name)
	{
		$api_count = sizeof ($loc['comp_detail']['api']);
		for ( $i = 0; $i < $api_count; $i++)
		{
			//echo "\t<area\t". $loc['comp_detail']['api'][$i]['name'] . PHP_EOL;
			echo "\t<area\t" . PHP_EOL;
			echo "\t\tshape = \"";
			echo $loc['comp_detail']['api'][$i]['shape']."\"\n";
			echo "\t\tcoords = \"";

			$new_coords = resize_coords ($ratio, $loc['comp_detail']['api'][$i]['coords']);
			//echo $loc['comp_detail']['api'][$i]['coords']."\"\n";
			echo $new_coords . "\"\n";

			echo "\t\thref = \"";
			echo $loc['comp_detail']['api'][$i]['href']."\"\n";
			echo "\t\talt = \"";
			echo $loc['comp_detail']['api'][$i]['name']."\"\n";
			echo "\t\ttarget = \"";
			echo $loc['comp_detail']['api'][$i]['target']."\"\n";
			echo "\t/>\n";
		}
	}
}
}


function get_width_from_css ($css_id)
{

//
        // Read the styleshhet and look for the id used for the ONAP component
        // web page - $css_id is the class name defined in the staylesheet
        // once the class name is found return the 'width' atribute assoiated with it
//
//

//$file_name = "/home/cah/share/onapdocs-new/css/menu_style.css";
$file_name = "css/menu_style.css";

$searchthis = $css_id;
$width_tag='width';
$matches = array();

$handle = @fopen($file_name, "r");
if ($handle)
{
    while (!feof($handle))
    {
        $buffer = fgets($handle);
        if(strpos($buffer, $searchthis) !== FALSE)
            while (!feof($handle)){
                    $buffer = fgets($handle);
                if(strpos($buffer, $width_tag) !== FALSE) {
                    $matches[] = $buffer;
                    break;
                }
            }
    }
    fclose($handle);
}

//show results:
//print_r($matches);

//echo  "before preg_match()" . $matches[0];

// preg_match() returns an array()
//
preg_match('!\d+!', $matches[0], $css_width_str);

return (int)$css_width_str[0];
//$img_width = (int)$css_width_str[0];
//echo  "img_width int: (" . $img_width . ")\n";

}

// Coomon ONAP Docs functions used to resize the map coordinates based on
// the original size of the .png imafe and the size of the web page as defined in
// the sylesheet.css
//

function resize_coords ($wy_ratio, $hx_ration $old_coords)
{

//echo "<<<< DEBUG - in function resize_coords>>>> css width: ".$css_width."\n";
//echo "<<<< DEBUG - in function resize_coords>>>> real width: ".$real_width."\n";
//echo "<<<< DEBUG - in function resize_coords>>>> Ratio: ".$ratio."\n";

        $coords = array();
        $str = $old_coords;

        $coords = str_getcsv($str);

        $x1=(int)$coords[0]*$hx_ratio;
        $y1=(int)$coords[1]*$wy_ratio;
        $x2=(int)$coords[2]*$hx_ratio;
        $y2=(int)$coords[3]*$wy_ratio;

        //echo (int)$x1.", ";
        //echo (int)$y1.", ";
        //echo (int)$x2.", ";
        //echo (int)$y2."\n";

        $new_coords = (int)$x1.", ".(int)$y1.", ".(int)$x2.", ".(int)$y2;
//echo "<<<< DEBUG - in function resize_coords>>>> New Coords: ".$new_coords."\n";

        return $new_coords;
}
//
//
//
//


function format_main_img_tag ($release_name, $doc_type)
{ 
  
$file_name = 'json/onap_releases.json';
$readjson = file_get_contents($file_name);
$css_tag = "position-main";

//Decode JSON
$data = json_decode($readjson, true);
//echo "<<<< DEBUG in format_main_img_tag>>>> looking for release: (" . $release_name . ")" . PHP_EOL;
foreach ($data as $loc) {

//echo "<<<< DEBUG in format_main_img_tag >>>> Release value: (" . $loc['release_value'] . ")" . PHP_EOL;
        if ($loc['release_value'] == $release_name)
        {
                echo "<img  id = " . "\"". $css_tag ."\"\n";
                echo "\tsrc = ";
                echo "\"" . $loc['image_uri'] . "\"\n";
                echo "\talt = \"Image file" .$loc['image_uri'] . " not found\"\n";
                echo "\tusemap = "."\""."#".$doc_type."\""."\n";
                echo "\n>\n";
                echo "\t<map name = "."\"".$doc_type."\"".">\n";
		break;
        }
	else {

//echo "<<<< DEBUG in format_main_img_tag >>>> Release value: (" . $loc['release_value'] . ")" . PHP_EOL;
	}


}
//echo "<<<< DEBUG in format_main_img_tag>>>> returning: (" . $loc['image_sz'] . ")" . PHP_EOL;
return ((int)$loc['image_sz']);
}

?> 
