<!--
*** Keep this commented as as it overrides some CSS settings for
*** <H3>, <H2>, ... tags.
**
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
-->
<HTML>
<HEAD>
<TITLE> Config Worning Message</TITLE>
<link rel="stylesheet" href="css/menu_style.css"> 
</HEAD>

<style>
.tftable
        {
        font-size:12px;
	/*
	 * color:#333333;
	 */
	color:black;
        width:100%;
        border-width: 1px;
        border-color: #729ea5;
        border-collapse: collapse;
        }

.tftable th
        {
        font-size:12px;
/*
 * background-color:#acc8cc;
	background-color:#E0FFFF;
*/
	background-color:#088A85;
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #729ea5;
        text-align:left;
        }
b {
  font-weight: bold;
}

</style>

<body>
<H3 id="main_menu_title_large"><center>Component Review Status</center></H3>
<H2 id="main_menu_title_medium"><center>..</center></H2>
<H1 id="main_menu_title_small"><center>..<font size="2" color="blue">(0.4b)</font></center></H1>

<div id="main_menu_wrapper">
<table class="tftable" border="0">
<tr>
<th><font  size="5" color="white">
No Changes are planned for the 
"<?php session_start(); echo $_SESSION["release"]; ?>"
 Release</th>
</tr>
<tr>
	<td>
	</td>
</tr>
<tr>
<td>
<font  size="4" color="blue"><b>..</b></font>
<font  size="3" color="black">
<a href="#"></a>
</font>
</td>
</tr>
</table>


</div>

<!--div id="sub_main_menu_wrapper">
</div>

</body>
</HTML-->
