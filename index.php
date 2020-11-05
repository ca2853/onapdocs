<!--
*** Keep this commented as as it overrides some CSS settings for
*** <H3>, <H2>, ... tags.
**
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
-->
<HTML>
<HEAD>
<TITLE><?php include 'php/get_main_title.php' ?></TITLE>
<link rel="stylesheet" href="css/menu_style.css"> 
</HEAD>

<style>
h2.a {
	font-style: normal;
	font-size: 21px;
	color: magenta;
	margin-left: 0;
}

ul.a {
	font-style: italic;
	font-size: 17px;
	color: firebrick;
	list-style-type: disc;
	margin-left: 30px;
	margin-bottom: 0px;
}

ul.b {
	font-style: italic;
	font-size: 15px;
	color: firebrick;
	list-style-type: circle;
	margin-left: 30px;
	margin-top: 0px;
	line-height:10%
}

ul.d {
	/*
	font-style: italic;
	*/
	font-size: 15px;
	color: black;
	list-style-type: circle;
	margin-left: 30px;
	margin-top: 0px;
	line-height:10%
}
ul.c {
/*
	font-style: italic;
*/
	font-size: 12px;
	color: darkblue;
	list-style-type: circle;
	margin-left: 60px;
	margin-top: 0px;
	line-height:10%
}

p.c {
  font-style: oblique;
}
</style>
<body>
<H3 id="main_menu_title_large"><center><?php include 'php/get_main_title.php' ?></center></H3>
<H2 id="main_menu_title_medium"><center><?php include 'php/get_sub_title.php' ?></center></H2>
<H1 id="main_menu_title_small"><center>Release:<font size="2" color="<?php include 'php/get_release_color.php' ?>">(<?php include 'php/get_release_name.php' ?>)</font></center></H1>

<div id="main_menu_wrapper">

<form action="action_page.php" method="post"> 
	<label for="release">Make a selection:</label>
	<select id="release" name="release">
	<?php include 'pulldown_menu1.php';?>
</select>
<select name="doc_type">
	<?php include 'pulldown_menu2.php';?>
</select>
<select name="doc_type1">
	<option selected="yes" value="MoreOption-Guide">More Options.... </option>
	<option value="option1-Guide">Option 1 </option>
	<option value="option2-Guide">Option 2 </option>
</select>
<br><br>
<input type="submit" value="Submit your ONAP Doc Selection">
</form>

</div>

<div id="sub_main_menu_wrapper">
<p> <font size="2" color="red">Posted: September, 2020</font></p>
<h1>  <font size="4" color=" #800000">Upcoming Events</font> </h1>
<ul class="d">  
	<li><font color="#008080">Open Networking and Edge Summit (ONES) - Virtual Experience (Sep 28-30, 2020)<a href="https://events.linuxfoundation.org/open-networking-edge-summit-north-america/">Click here to Register</a></li>
	<li>LFN Fall Technical Meetings - Virtual Experience  (Oct 13-15, 2020)- <a href="https://wiki.lfnetworking.org/display/LN/2020+October+Virtual+Technical+Event">Click here to Register</font></a></li>
</ul>
</div>

<div id="sub_main_menu_wrapper1">
<p> <font size="2" color="red">Posted: July 1, 2020</font></p>
<h1>  <font size="4" color="green">Guilin Release Status</font> </h1>
<ul class="d">  
	<li >Guilin Release Requirements<a href="https://wiki.onap.org/display/DW/Guilin+Release+Requirements">Click here</a></li>
	<li >Guilin Release Project Status<a href="https://wiki.onap.org/display/DW/Project+Status+in+Guilin+Release">Click here</a></li>
	<li >Guilin Release Impact View per Component<a href="https://wiki.onap.org/display/DW/Guilin+Impact+View+per+Component">Click here</a></li>
	<li >Guilin Release Milestone Status<a href="https://wiki.onap.org/display/DW/Guilin+Milestone+Status">Click here</a></li>
	<li >Project Architectual Review Requirements<a href="https://wiki.onap.org/pages/viewpage.action?pageId=79205767">Click here</a></li>
</ul>
</div>

</body>
</HTML>
