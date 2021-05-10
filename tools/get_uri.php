<?php

$uri_wslashes = "/onapdocs-dev/release=hono";
$uri= basename ($uri_wslashes, '/');
echo $uri;
echo "1) ".dirname("/etc/sudoers.d", ".d").PHP_EOL;
echo "2) ".dirname("/etc/sudoers.d").PHP_EOL;
echo "3) ".dirname("/etc/passwd").PHP_EOL;
echo "4) ".dirname("/etc/").PHP_EOL;
echo "5) ".dirname(".").PHP_EOL;
echo "6) ".dirname("/");

?>


