<?php session_start();
$menu = array (
'about' => array(
	'display' => 'ONAP Subcommittees &raquo;',
	'url' => '#',
	'sub' => array(
		'arch' => array
		(
			'display' => 'Architecture Subcommittee &raquo;',
			'url' => '',
			'sub' => array
			(
				'principles' => array
				(
					'display' => 'Principles',
					'url' => 'https://wiki.onap.org/display/DW/ONAP+Architecture+Principles'
				),
				'process' => array
				(
					'display' => 'Process',
					'url' => 'https://wiki.onap.org/display/DW/ONAP+Architecture+Team+Process?moved=true'
				),
				'meetings' => array
				(
					'display' => 'Weekly Meeting Logistics &raquo;',
					'url' => '#',
					'sub' => array
					(
						'meeting_logistics' => array
						(
							'display' => 'Weekly Meeting Logistics',
							'url' => 'https://wiki.onap.org/display/DW/Architecture+Subcommittee+Meeting'
						),
						'2017' => array
						(
							'display' => '2017 Meeting Minutes',
							'url' => 'https://wiki.onap.org/display/DW/ONAPARC+2017+Meetings'
						),
						'2018' => array
						(
							'display' => '2018 Meeting Minutes',
							'url' => 'https://wiki.onap.org/display/DW/ONAPARC+2018+Meetings'
						),
						'2019' => array
						(
							'display' => '2019 Meeting Minutes',
							'url' => 'https://wiki.onap.org/display/DW/ONAPARC+2019+Meetings'
						),
						'2020' => array
						(
							'display' => '2020 Meeting Minutes',
							'url' => 'https://wiki.onap.org/display/DW/ONAPARC+2020+Meetings'
						)
					)
				),
				'jira' => array
				(
					'display' => 'JIRA',
					'url' => 'https://jira.onap.org/projects/ONAPARC/issues/ONAPARC-565?filter=allopenissues'
				)
			)
		),
		'rqmts' => array
		(
			'display' => 'Requirments Subcommittee',
			'url' => 'https://wiki.onap.org/display/DW/Requirements+subcommittee',
			'sub' => array
			(
				'logistics' => array 
				(
					'display' => 'Wekly Metting Logistics',
					'url' => 'https://wiki.onap.org/display/DW/Requirements+subcommittee',
				),
				'meetings' => array 
				(
					'display' => 'Meetings Minutes',
					'url' => 'https://wiki.onap.org/display/DW/Requirements+subcommittee+meeting+minutes',
				),
				'guilin' => array
				(
					'display' => 'Guilin-R7 Release',
					'url' => '#',
					'sub' => array
					(
						'func' => array
						(
							'display' => 'func_requirements',
							'url' => 'https://wiki.onap.org/display/DW/Guilin+release+-+functional+requirements+proposed+list'
						),
						'non_func' => array
						(
							'display' => 'Non-func Requirments',
							'url' => 'https://wiki.onap.org/display/DW/Guilin+release+-+non-functional+requirements+proposed+list'
						)
					)
				)
			)
		),
		'modeling' => array
			(
			'display' => 'Modeling',
			'url' => 'links/#services',
			'sub' => array
			(
				'sub1' => array
				(
					'display' => 'Submenu1',
					'url' => 'links/#services_local'
				),
				'sub2' => array
				(
					'display' => 'SubMenu2',
					'url' => 'links/#services_online'
				)
			)
		)

	)
),
'usecases' => array
	(
		'display' => 'ONAP Use Cases &raquo;',
		'sub' => array
		(
			'sub1' => array
			(
				'display' => 'Submenu1',
				'url' => 'links/#services_local'
			),
			'sub2' => array
			(
				'display' => 'SubMenu2',
				'url' => 'links/#services_online'
			)
		)
	),
'lfn' => array(
	'display' => 'LFN stuff',
	'sub' => array(
		'tac' => array(
			'display' => 'TAC Weekly Meetings',
			'url' => 'links/#products'),
		'mac' => array(
			'display' => 'MAC',
			'url' => 'links/#services',
			'sub' => array(
				'local' => array(
							'display' => 'Local Services',
							'url' => 'links/#services_local'),
				'online' => array(
							'display' => 'Online Services',
							'url' => 'links/#services_online')
						)
					)
				)
			),
'contact' => array(
	'display' => 'Contact Us'
	)
);

function buildMenu($menu_array, $is_sub = FALSE){
	$attr =
	(!$is_sub) ? ' id="navigation"' : ' class="submenu"';
	$menu = "\n<ul$attr>";
	foreach($menu_array as $id => $properties) {        
		foreach($properties as $key => $val) {
			if (is_array($val)) {
				$sub = buildMenu($val, TRUE);
			}else{
				$sub = NULL;
				$$key = $val;
			}
		}
		if (!isset($url)) {
	$url = $id;
	}
	$menu.="\n\t<li><a href=\"$url\"" . " target=\"_self\">$display</a>$sub</li>\n";
	unset($url, $display, $sub);
	}

	return $menu . "</ul>\n";
}

echo buildMenu ($menu);

?>
