
<?php
//
//
// Parse out the URI pathe which is the string after the first slash in the URL
//
//

 $_SESSION["path"]= basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// echo "In parse_url.php, SESSION[\"path\"]: " .  $_SESSION["path"];
?>

