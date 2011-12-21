<script type="text/javascript"> 
$(document).ready(function(){

	$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
	
/* 	$("ul.topnav li span").mouseover(function() { //When trigger is clicked...
		
		//Following events are applied to the subnav itself (moving subnav up and down)
		$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

		$(this).parent().hover(function() {
		}, function(){	
			$(this).parent().find("ul.subnav").slideUp('fast'); //When the mouse hovers out of the subnav, move it back up
		});

		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() { 
			$(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			$(this).removeClass("subhover"); //On hover out, remove class "subhover"
	}); */
	
	$("ul.topnav li").mouseover(function() { //When trigger is clicked...
		
		//Following events are applied to the subnav itself (moving subnav up and down)
		$(this).find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

		$(this).hover(function() {
		}, function(){	
			$(this).find("ul.subnav").slideUp('fast'); //When the mouse hovers out of the subnav, move it back up
		});

		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() { 
			$(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			$(this).removeClass("subhover"); //On hover out, remove class "subhover"
	});
});
</script>


	<?php
		
		$menus = array(
			'Dashboard' => array(
				'href' => '/admin-dashboard',
				'sub_menu' => array()
			),
			'Labels' => array(
				'href' => '#',
				'sub_menu' => array(
					'/admin/labels/index' => 'Manage All Members',
					'/admin/labels/verification_pending' => 'Manage Pending Verification',
					'/admin/labels/verified_list' => 'Manage Verified Members',
					'/admin/labels/reports' => 'Manage Reports'
				)
			),
			'Artist' => array(
				'href' => '#',
				'sub_menu' => array(
					'/admin/artist/index' => 'Manage All Agents',
					'/admin/artist/verification_pending' => 'Manage Pending Verification',
					'/admin/artist/verified_list' => 'Manage Verified Members',
					'/admin/artist/reports' => 'Manage Reports',
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
			'Settings' => array(
				'href' => '#',
				'sub_menu' => array(
					'/admin/settings/index' => 'Settings',
					'/admin/setting_types/index' => 'Setting Types',
					'/admin/users/index' => 'Admin Users',
					'/admin/groups/index' => 'Admin User Groups',
					'/admin/districts/index' => 'Manage Districts',
					'/admin/states/index' => 'Manage States',
					'/admin/image_categories/index' => 'Image Categories',
					'/admin/images/index' => 'Images',
				)
			),
			'Template' => array(
				'href' => '#',
				'sub_menu' => array(
					'#1' => 'General',
					'#2' => 'Design'
				)
			),
		);
		
	?>
	<ul class="topnav">  <!-- Accordion Menu -->
		<?php
			foreach($menus as $menuh => $menu_items){
				echo '<li>';
				$hassubmenu = false;
				if(count($menu_items['sub_menu'])>0){
					$hassubmenu = true;
				}
				
				echo ($menuh == $cur_menuh)?'<a href="'.$menu_items['href'].'" class="current">':'<a href="'.$menu_items['href'].'">';
				echo $menuh;
				echo ($hassubmenu)?'</a><ul class="subnav">':'</a>';

				foreach($menu_items['sub_menu'] as $mikey => $mival){
					if($cur_url == $mikey){
						echo '<li><a href="'.$mikey.'" class="current">'.$mival.'</a></li>';
					}else{
						echo '<li><a href="'.$mikey.'">'.$mival.'</a></li>';
					}
				}
				echo ($hassubmenu)?'</ul></li>':'</li>';
			}
		?>
	</ul>
<a href="/" class="preview" target="_blank">Preview</a>	
<a href="/admin-logout" class="logout">Logout</a>

<!--
<ul class="topnav">
    <li><a href="#">Home</a></li>
    <li>
        <a href="#">Tutorials</a>
        <ul class="subnav">
            <li><a href="#">Sub Nav Link</a></li>
            <li><a href="#">Sub Nav Link</a></li>
			<li><a href="#">Sub Nav Link</a></li>
			<li><a href="#">Sub Nav Link</a></li>
			<li><a href="#">Sub Nav Link</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Resources</a>
        <ul class="subnav">
            <li><a href="#">Sub Nav Link</a></li>
            <li><a href="#">Sub Nav Link</a></li>
			<li><a href="#">Sub Nav Link</a></li>
			<li><a href="#">Sub Nav Link</a></li>
        </ul>
    </li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Advertise</a></li>
    <li><a href="#">Submit</a></li>
    <li><a href="#">Contact Us</a></li>
</ul>
-->