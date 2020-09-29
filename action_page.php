<?php 
      //Put session start at the beginning of the file
	//ini_set('session.cache_limiter', 'private');
	header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); 
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
	header("Cache-Control: post-check=0, pre-check=0",false);
	session_cache_limiter("must-revalidate");
	session_start();
?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$_SESSION['release'] = $_POST['release'];
		$_SESSION['doc_type'] = $_POST['doc_type'];
	}
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>ONAPDOCS Landing Page</title>
<meta name="description" content="">

<link rel="stylesheet" href=<?php echo $_SESSION['release'] . "/css/menu_style.css"?> 

<!-- IE6-8 support of HTML5 elements --> <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>

<?php 
	include 'php/set_page_header.php'; /* Format Pahe Header based ton Meny slection */ 
?>

<!--
<H3 id="main_menu_title_medium"><center>  Architecture Overview</center></H3>
-->

<!--
<div id="onap_lfn_menu">
-->
<div >

<nav id="nav">

<nav id="nav">
	<ul id="navigation">
		<li><a href="#">ONAP Subcommittees &raquo;</a>
			<ul>
				<li><a target="" href="#">Architecture &raquo</a>
					<ul>
						
								<li><a href="https://wiki.onap.org/display/DW/ONAP+Architecture+Principles">Architecture Principles</a></li>
								<li><a href="https://wiki.onap.org/pages/viewpage.action?pageId=79205767">ArchCom Review Process</a></li>
								<li><a href="https://wiki.onap.org/display/DW/ONAP+Architecture+Team+Process?moved=true ">Architecture Team Process</a></li>
						<li><a href="#">ArchCom Weekly Meetings &raquo</a>
							<ul>
								<li><a href="https://wiki.onap.org/display/DW/Architecture+Subcommittee+Meeting">Weekly Meeting Logistics</a></li>
								<li><a href="https://wiki.onap.org/display/DW/ONAPARC+2017+Meetings">ONAPARC 2017</a></li>
								<li><a href="https://wiki.onap.org/display/DW/ONAPARC+2018+Meetings">ONAPARC 2018</a></li>
								<li><a href="https://wiki.onap.org/display/DW/ONAPARC+2019+Meetings">ONAPARC 2019</a></li>
								<li><a href="https://wiki.onap.org/display/DW/ONAPARC+2020+Meetings">ONAPARC 2020</a></li>
							</ul>					
						</li>					
						<li><a href="#">Comopnent Diagrams </a>
							<ul>
								<li><a href="https://wiki.onap.org/display/DW/ONAP+Architecture+Component+Description+-+El+Alto-R5">El Alto</a></li>
								<li><a href="https://wiki.onap.org/display/DW/ONAP+Architecture+Component+Description+-+Frankfurt">Frankfurt</a></li>
								<li><a href="https://wiki.onap.org/display/DW/ONAP+Architecture+Component+Description+-+Guilin+%28R7%29+Release">Guilin</a></li>
							</ul>					
						</li>
					</ul>
				</li>
				
				<li><a href="#">Modeling  &raquo;</a>
					<ul>
                                                <li><a href="https://wiki.onap.org/display/DW/Modeling+sub-committee+meetings">Meeting Minutes</a>
                                                <li><a href="https://wiki.onap.org/display/DW/Modeling+sub-committee+meetings">Latest Documentation</a>
                                                <li><a href="#"></a></li>
                                                <li><a href="#"></a></li>
                                        </ul>
				</li>

				<li><a href="#">Requirments &raquo;</a>
					<ul>
						<li><a href="https://wiki.onap.org/display/DW/Requirements+subcommittee">Weeky Meeting Logistics</a></li>
						<li><a href="https://wiki.onap.org/display/DW/Requirements+subcommittee+meeting+minutes">Meeting Minutes</a></li>
						<li><a href="https://wiki.onap.org/display/DW/Guilin+release+-+functional+requirements+proposed+list">Guilin-R7 Minutes</a></li>
					</ul>
				</li>

				<li><a href="#">Security &raquo;</a>
					<ul>
						<li><a href=" https://wiki.onap.org/display/DW/ONAP+Security+coordination">About SECCOM</a></li>
						<li><a href="https://wiki.onap.org/display/DW/Onap+security+subcommittee+meeting+notes">Weeky Meetings</a></li>
						<li><a href="https://wiki.onap.org/pages/viewpage.action?pageId=15995347">Best Pactices</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="#">LF Networking &raquo;</a>
			<ul>
				<li><a href="#">LFN-TAC Meeting Minutes &raquo</a>
			
					<ul>
						<li><a href="https://wiki.lfnetworking.org/display/LN/LFN-TAC+Minutes+2018">LFN-TAC Minutes 2018</a></li>
						<li><a href="https://wiki.lfnetworking.org/display/LN/LFN-TAC+Minutes+2019">LFN-TAC Minutes 2019</a></li>
						<li><a href="https://wiki.lfnetworking.org/display/LN/LFN-TAC+Minutes+2020">LFN-TAC Minutes 2020</a></li>
					</ul>
				</li>
				<li><a href="https://wiki.lfnetworking.org/pages/viewpage.action?pageId=327912">Marketing Advisory Concil (MAC)</a></li>
				<li><a href="https://wiki.lfnetworking.org/display/LN/2020+April+Virtual+Technical+Event">2020 April Technical Event
				<li><a href="#">Place Holder</a></li>
				<li><a href="#">Next Level &raquo;</a>
					<ul>
						<li><a href="#">Place Holder</a></li>
						<li><a href="#">Place Holder</a></li>
						<li><a href="#">Place Holdern</a></li>
					</ul>						
				</li>
				<li><a href="#">Place Holder </a></li>
			</ul>				
		</li>
		<li><a href="#">ONAP Use Cases</a>
				<ul>
					<li><a href="https://wiki.onap.org/display/DW/Release+6+%28Frankfurt%29+proposed+use+cases+and+functional+requirements">R6 UseCases</a></li>
					<li><a href="https://wiki.onap.org/display/DW/5G+Use+Cases+in+R6+Frankfurt">5G</a></li>
					<li><a href="https://jira.onap.org/secure/attachment/15254/15254_ONAP_E2E_Network_Slicing_Arch_Com_200225-V0.3.pptx">5G Slicing</a></li>
					<li><a href="#">Place Holder</a></li>
					<li><a href="#">Place Holdern</a></li>
				</ul>						
		</li>
		<li><a href="#">Release Planning</a>
				<ul>
					<li><a href="https://wiki.onap.org/pages/viewpage.action?pageId=3246393">Legacy</a></li>
					<li><a href="https://wiki.onap.org/display/DW/Release+Planning%3A++Frankfurt">Frankfurt-R6</a></li>
					<li><a href="https://wiki.onap.org/display/DW/Release+Planning%3A++Guilin">Guilin-R7</a></li>
				</ul>						
		</li>
		<li><a href="#" class="last">Task Forces &raquo;</a>
				<ul>
					<li><a href="https://wiki.onap.org/display/DW/ONAP+Project+and+Component+Lifecycle">ONAP Project and Component Lifecycle</a></li>
					<li><a href="https://wiki.onap.org/pages/viewpage.action?pageId=79203136">CNF Taskforce</a></li>
					<li><a href="https://wiki.onap.org/display/DW/Release+Cadence+Proposal">Release Cadence</a></li>
				</ul>						
		</li>
	</ul>
</nav>


</nav>

</div><!--end wrapper-->
<!--/div--><!--end wrapper-->

<div>
	<?php 
		include 'php/format_main_menu_tags.php'; /* format page bitmap coords */
	?>
      </map>
</div>
</body>
</html>
