<?php



$num_args = $argc;
echo "(argc=" . $num_args . ")" . PHP_EOL;

if ($num_args != 2)
{
        echo "Usage: $argv[0]: file_name " . PHP_EOL , PHP_EOL;
        exit;
} else {
        $image_uri = $argv[1];
}



        $str =  trim($image_uri," ");
        $image_size = getimagesize($str);

        echo "(" . $str .  ")" . PHP_EOL;

	echo "" .  " \t(W: " . (int)$image_size[0] . "px)" .PHP_EOL;
	echo "" .  " \t(H: " . (int)$image_size[1] . "px)" .PHP_EOL;
?>

