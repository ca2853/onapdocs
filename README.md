
# onapdocs
This repository holds all the source code for the ONAPDOCS project sponsored by the ONAP Architecture subcommittee
	- Testing Git - 10/01/2020 update

Mar 2, 2021
In addition to the global config in the json directory, each 'release' now has its own json, css, etc..
dirs to allow for more local customization

Mar 22, 2021
created menus.html and copied all the menus html tags that were embedded in action_page.php to int
	action_page.php now includes menus.html using the following:
----
<?php
	require_once "php/onapdocs_functions.php";

	$supress_menus = get_supress_menus_option();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' and $supress_menus == 'no' )
	{
        /*
         * menu.html file contains the menu options. display the menus only  
         * when the user uses the main menu to access the subsequent pages
         */

		include('menus.html');
	}
?>
----

Mar 10, 2021
	addeded the index.php in the webserver root dir to rediredt to onapdocs in the case a user tries
	to access the root dir directly
<?php
header("Location: https://safratech.net/onapdocs"); 
exit; 
?>
----

Mar 23, 2021
	Added the support for REQUEST_METHOD == _GET in addition to POST
	this will provide the ability to pass the 'release' and 'doc_type' variables as part of thr URL

Mar 25, 2021
	Added a feature to control the appearance of the global menus.
	- Added the supress_menus attribute to json/titlrs.json
		if it ss set to yes then the global menus are not displayed
	- Global menus are not displayed if the REQUEST_METHOD is set to 'GET'

Mar 26, 2021
	dded a new feature to move all the json files at the topic leve to root/json_db

Apr 1, 2021
	Added logic to use local json dir at the doc_type level (titles.json) once the selection from 
	the first screen has been made
Apr 22, 2021
	- created a /data dir for all the json file
	- one code base will now support all many configs
	- added code to parse out the string after https://safratech.net/onapdocs-dev (onapdocs-dev) 
	- topics.json is a now a common json file; it is symbolically linked to the appopriate .json 
		file as per the string wntered on on the URI (path)
Apr 23, 2021
	- Added logic to loog for css file in the css dir. there should always be a default_naigator_sheet.css in 		that dir to be used as default. custom css file can be used by creating css files with filenam 
		format as follows: "uri path"_navigator_sheet.css
			ex: onapdocs-dev_navigator_sheet.css
