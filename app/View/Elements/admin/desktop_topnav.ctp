<?php
	$menus = array(
		/* 'Dashboard' => array(
			'href' => '/admin-dashboard',
			'sub_menu' => array()
		), */
		'Labels' => array(
			'href' => '#',
			'sub_menu' => array(
				'/admin/labels/index' => 'Manage All Labels',
				//'/admin/labels/verification_pending' => 'Manage Pending Verification',
				//'/admin/labels/verified_list' => 'Manage Verified Labels',
				//'/admin/labels/reports' => 'Manage Labels Reports'
			)
		),
		'Artist' => array(
			'href' => '#',
			'sub_menu' => array(
				'/admin/artists/index' => 'Manage All Artist',
				//'/admin/artists/verification_pending' => 'Manage Pending Verification',
				//'/admin/artists/verified_list' => 'Manage Verified Artist',
				//'/admin/artists/reports' => 'Artist Reports',
			)
		),
		'CMS' => array(
			'href' => '#',
			'sub_menu' => array(
				'/admin/pages/index'   => 'Manage Pages',
				'/admin/widgets/index' => 'Manage Widget',
				'/admin/forms/index'   => 'Manage Forms',
				'/admin/menus/index'   => 'Manage Menus'
				
			)
		),
		'Media' => array(
			'href' => '#',
			'sub_menu' => array(
				'/admin/images/index' => 'Manage Images',
				'/admin/image_categories/index'   => 'Manage Category'
			)
		),		
		'Settings' => array(
			'href' => '#',
			'sub_menu' => array(
				'/admin/settings/index' => 'Settings',
				'/admin/setting_types/index' => 'Setting Types',
				'/admin/genres/index' => 'Genre Manager',
				'/admin/users/index' => 'Admin Users',
				'/admin/groups/index' => 'Admin User Groups'
			)
		),
		'Template' => array(
			'href' => '#',
			'sub_menu' => array(
				'/admin/template_files' => 'Template Files'
			)
		),
	);
	
?>
<ul class="menu">  <!-- Accordion Menu -->
	<li><a href="/admin-dashboard">Dashboard</a></li>
	<?php
		foreach($menus as $menuh => $menu_items){
			echo '<li>';
			$hassubmenu = false;
			if(count($menu_items['sub_menu'])>0){
				$hassubmenu = true;
			}
			
			echo ($menuh == $cur_menuh)?'<a href="'.$menu_items['href'].'" class="jwindow current" rel="1000-400-0-0">':'<a class="jwindow" href="'.$menu_items['href'].'" rel="1000-400-0-0">';
			echo $menuh;
			echo ($hassubmenu)?'</a><ul class="subnav">':'</a>';

			foreach($menu_items['sub_menu'] as $mikey => $mival){
				if($cur_url == $mikey){
					echo '<li><a href="'.$mikey.'" class="jwindow current"  rel="1000-400-0-0">'.$mival.'</a></li>';
				}else{
					echo '<li><a class="jwindow" href="'.$mikey.'" rel="1000-400-0-0">'.$mival.'</a></li>';
				}
			}
			echo ($hassubmenu)?'</ul></li>':'</li>';
		}
	?>
	<li><a href="#" onclick="showAllWindow(); return false;">Show All</a></li>
	<li><a href="#" onclick="hideAllWindow(); return false;">Hide All</a></li>
	<li><a href="#" onclick="closeAllWindow(); return false;">Close All</a></li>
</ul>



<!--<ul class="menu">
	<li id="start">
		<a href="#" onclick="return false;"><img src="/admin_desk/images/startButton.png" alt="Start" /></a>
		<ul class="subnav">
			<li><a href="#" title="Support details" rel="995-400-0-0">Support</a></li>
			<li><a href="#" title="Licence Agreement" rel="500-500-0-0">Licence</a></li>

			<li><a href="#" title="Download Page" rel="995-400-0-0">Download</a></li>
		</ul>
	</li>
	<li><a href="#" title="Open Google" rel="500-500-0-0">Google</a></li>
	<li><a href="#" title="Open Yahoo" rel="400-500-0-0">Yahoo</a></li>
	<li><a href="#" title="Open Bing" rel="300-300-0-0">Bing</a></li>
</ul>-->
<a href="/admin-logout" class="logout">Logout</a>
<div class="time"></div>