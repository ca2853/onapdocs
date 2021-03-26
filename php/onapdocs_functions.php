<?php

//
// Function format_img_tag
//

function format_img_tag ($onap_obj_file, $c_name, $css_tag) 
{
//$json_obj_file = $onap_Obj_file;

//$css_tag = "position-component";
//$c_name = "EXTAPI";
$usemap = $c_name . "_Map";
$real_img_sz = array();

// <<<< DEBUG >>>> echo "onap_obj_file: " . $onap_obj_file . PHP_EOL;
$readjson = file_get_contents($onap_obj_file);

//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rec) {
//echo "\"" . $rec['name']. PHP_EOL;
	//
	// If image_uri at the documet level (doc_type) is set use it; otherwise default yp the
	// release level image_uri
	//
	$image_uri = $rec['image_uri'];

	$options_count = sizeof ($rec["options"]);

	if ($rec['name'] == $c_name) {

		echo "<img  id = "."\"".$css_tag."\""."\n";
		echo "\tsrc = ";
		echo "\"" . $rec['comp_detail']['img_uri'] . "\"\n";
		//echo "\talt = \"Image file: " .   $rec['comp_detail']['img_uri']  . " not found\"\n";
		echo "\talt = \"$c_name\"\n";
		echo "\tusemap = "."\""."#".$usemap."\""."\n";
		echo "\n>\n";
		echo "\t<map name = "."\"".$usemap."\"".">\n";
		$real_img_sz[0] =  $rec['comp_detail']['img_uri_sz_w']; 
		$real_img_sz[1] =  $rec['comp_detail']['img_uri_sz_h']; 
		break;
	}
}

//print_r ($real_img_sz);
	return ($real_img_sz);

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
		//echo "image size: " . $rec['img_sz_px'] . PHP_EOL;
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

$w_ratio = $ratio[0];
$h_ratio = $ratio[1];

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
			echo "\t<area id = \"" . $loc['comp_detail']['api'][$i]['id'] . "\"" . PHP_EOL;
			echo "\t\tshape = \"";
			echo $loc['comp_detail']['api'][$i]['shape']."\"\n";
			echo "\t\tcoords = \"";

			$new_coords = resize_coords ($w_ratio, $h_ratio, $loc['comp_detail']['api'][$i]['coords']);
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
$height_tag='height';
$w_matches = array();
$h_matches = array();
$css_tag_w_h = array();



$handle = @fopen($file_name, "r");
if ($handle)
{
    while (!feof($handle))
    {
        $buffer = fgets($handle);

        if(strpos($buffer, $searchthis) !== FALSE)
	{

//print_r($buffer);
		while (!feof($handle))
		{
			$buffer = fgets($handle);
			if(strpos($buffer, $width_tag) !== FALSE) {
				$w_matches[] = $buffer;
			}
			if(strpos($buffer, $height_tag) !== FALSE) {
				$h_matches[] = $buffer;
				break;
			}
		}
	}
    }
    fclose($handle);
}

//show results:
//print_r($w_matches);
//print_r($h_matches);

//echo  "before preg_match()" . $matches[0];

// preg_match() returns an array()
//

	preg_match('!\d+!', $w_matches[0], $css_width_str);
	preg_match('!\d+!', $h_matches[0], $css_height_str);

	$css_tag_w_h[0] = (int)$css_width_str[0];
	$css_tag_w_h[1] = (int)$css_height_str[0];
//echo "<<<< DEBUG >>>> - in function gt_width_from_css()>>>> css_tag_w_h[0] : " . $css_tag_w_h[0]. PHP_EOL;
//echo "<<<< DEBUG >>>> - in function gt_width_from_css()>>>> css_tag_w_h[1] : " . $css_tag_w_h[1]. PHP_EOL;
//
	return ($css_tag_w_h);

//$img_width = (int)$css_width_str[0];
//echo  "img_width int: (" . $img_width . ")\n";

}

// Coomon ONAP Docs functions used to resize the map coordinates based on
// the original size of the .png imafe and the size of the web page as defined in
// the sylesheet.css
//

function resize_coords ($wx_ratio, $hy_ratio, $old_coords)
{

//echo "<<<< DEBUG - in function resize_coords>>>> wy_ratio width: ". $wy_ratio."\n";
//echo "<<<< DEBUG - in function resize_coords>>>> real width: ".$real_width."\n";
//echo "<<<< DEBUG - in function resize_coords>>>> hx_ratio: ".$hx_ratio."\n";

        $coords = array();
        $str = $old_coords;

        $coords = str_getcsv($str);
//echo "<<<< DEBUG >>>> coords[0]= " .  $coords[0] . PHP_EOL;

        $x1=(int)$coords[0]*$wx_ratio;
        $y1=(int)$coords[1]*$hy_ratio;
        $x2=(int)$coords[2]*$wx_ratio;
        $y2=(int)$coords[3]*$hy_ratio;

//echo (int)$x1.", ";
//echo (int)$y1.", ";
//echo (int)$x2.", ";
//echo (int)$y2."\n";

        $new_coords = (int)$x1.", ".(int)$y1.", ".(int)$x2.", ".(int)$y2;
//echo "<<<< DEBUG - in function resize_coords>>>> New Coords: (" . $new_coords .")\n";

        return $new_coords;
}
//
//
//
//


function format_main_img_tag ($release_name, $doc_type)
{ 
  
	// onap_releases.json has the uri to the 
	// specific release main image.png file
	//
$file_name = 'json/onap_releases.json';
$readjson = file_get_contents($file_name);
$css_tag = "position-main";

//Decode JSON
$data = json_decode($readjson, true);
//echo "<<<< DEBUG in format_main_img_tag>>>> looking for release: (" . $release_name . ")" . PHP_EOL;
foreach ($data as $rel) {

//echo "<<<< DEBUG in format_main_img_tag >>>> Release value: (" . $rel['release_value'] . ")" . PHP_EOL;
        if ($rel['release_value'] == $release_name)
        {
		//
                // If image_uri at the documet level (doc_type) is set use it; otherwise default yp the
                // release level image_uri
                //
                $image_uri = $rel['image_uri'];
//echo "<<<< DEBUG in format_main_img_tag >>>> Image URI: (" . $image_uri . ")" . PHP_EOL;
//echo "<<<< DEBUG in format_main_img_tag >>>> doc_type: (" . $doc_type . ")" . PHP_EOL;

                $options_count = sizeof ($rel["options"]);

                for ( $i = 0; $i < $options_count; $i++)
                {
                        if (strcmp($rel["options"][$i]["value"], $doc_type ) == 0) {

                                if ( !empty($rel["options"][$i]["image_uri"]) ) {
                                        //
                                        //image_uri at the doc_type level is set; use it
                                        //
                                        $image_uri = $rel["options"][$i]['image_uri'];
                                }
                        }
                }
                echo "<img  id = " . "\"". $css_tag ."\"\n";
                echo "\tsrc = ";
                echo "\"" . $image_uri . "\"\n";
//echo "\talt = \"Image file" .$rel['image_uri'] . " not found\"\n";
                echo "\talt = \"$release_name/$doc_type\"\n";
                echo "\tusemap = "."\""."#".$doc_type."\""."\n";
                echo "\n>\n";
                echo "\t<map name = "."\"".$doc_type."\"".">\n";
		break;
        }

//echo "<<<< DEBUG in format_main_img_tag >>>> Release value: (" . $rel['release_value'] . ")" . PHP_EOL;


}
//echo "<<<< DEBUG in format_main_img_tag>>>> returning: (" . $rel['image_sz'] . ")" . PHP_EOL;
return ((int)$rel['image_sz']);
}

function get_supress_menus_option ()
{

$file_name = "json/titles.json";

$readjson = file_get_contents($file_name);

//Decode JSON
$data = json_decode($readjson, true);

foreach ($data as $rec) {
		return  $rec['supress_menus'];
}
}
?> 
