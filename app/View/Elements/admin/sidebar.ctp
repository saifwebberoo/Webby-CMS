<div id="sidebar">

	<a id="sb_splitter" href="#" class="splitter" onclick="ToggleSideBar();return false;"></a>	
	<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
	<h1 id="sidebar-title"><a href="#">Job Forest Admin</a></h1>
  
	<!-- Logo (221px wide) -->
	<a href="#"><img id="logo" src="/admin_theme/logo.png" alt="Admin logo"></a>
  
	<!-- Sidebar Profile links -->
	<div id="profile-links">
		Hello, <a href="#" title="Edit your profile"><?php echo $this->Session->read('Auth.User.name'); ?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br>
		<br>
		<a href="/" title="View the Site">View the Site</a> | <a href="/admin-logout" title="Sign Out">Sign Out</a>
	</div>        
	
	
	<?php
		
		$menus = array(
			'Dashboard' => array(),
			'Employers' => array(
				'2' => 'Approval Pending Employers',
				'/admin/employers/index' => 'Manage Employers',
				'4' => 'Manage Reviews',
				'5' => 'Manage Categories'
			),
			'Job Seeker' => array(
				'2' => 'Manage Job Seekers',
				'3' => 'Manage Skills'
			),
			'CMS' => array(
				'5' => 'Manage Pages',
				'2' => 'Manage Widget'
			),
			'Settings' => array(
				'2' => 'General',
				'3' => 'Design',
				'/admin/users/index' => 'Admin Users',
				'/admin/groups/index' => 'Admin User Groups',
				'/admin/districts/index' => 'Manage Districts',
				'/admin/states/index' => 'Manage States',
				'6' => 'Manage Schools',
				'7' => 'Manage Job Title'
			),
		);
		
	?>
	
	
	<ul id="main-nav">  <!-- Accordion Menu -->
		<?php
			foreach($menus as $menuh => $menu_items){
				echo '<li>';
				$nosubmenu = '';
				if(count($menu_items)==0){
					$nosubmenu = 'no-submenu';
				}
				if($menuh == $cur_menuh){
					echo '<a style="padding-right: 15px;" href="/admin-dashboard" class="nav-top-item '.$nosubmenu.' current">';
					echo $menuh;
					echo '</a><ul style="display: block;">';
				}else{
					echo '<a style="padding-right: 15px;" href="/admin-dashboard" class="nav-top-item '.$nosubmenu.'">';
					echo $menuh;
					echo '</a><ul style="display: none;">';
				}
				foreach($menu_items as $mikey => $mival){
					if($cur_url == $mikey){
						echo '<li><a href="'.$mikey.'" class="current">'.$mival.'</a></li>';
					}else{
						echo '<li><a href="'.$mikey.'">'.$mival.'</a></li>';
					}
				}
				echo '</ul></li>';
			}
		?>
		<?
/* 		<li>
			<a style="padding-right: 15px;" href="/admin-dashboard" class="nav-top-item no-submenu"> 
				<!-- Add the class "no-submenu" to menu items with no sub menu -->
				Dashboard
			</a>       
		</li>
		
		<li> 
			<a style="padding-right: 15px;" href="#" class="nav-top-item current"> 
				<!-- Add the class "current" to current menu item -->
			Employers
			</a>
			<ul style="display: block;">
				<li><a href="#">Approval Pending Employers</a></li> <!-- Add class "current" to sub menu items also -->
				<li><a href="#">Manage Employers</a></li>
				<li><a href="#" class="current">Manage Reviews</a></li>
				<li><a href="#">Manage Categories</a></li>
			</ul>
		</li>
		
		<li>
			<a style="padding-right: 15px;" href="#" class="nav-top-item">
				Job Seeker
			</a>
			<ul style="display: none;">
				<li><a href="#">Manage Job Seekers</a></li>
				<li><a href="#">Manage Skills</a></li>
			</ul>
		</li>
		
		<li>
			<a style="padding-right: 15px;" href="#" class="nav-top-item">
				Pages
			</a>
			<ul style="display: none;">
				<li><a href="#">Create a new Page</a></li>
				<li><a href="#">Manage Pages</a></li>
			</ul>
		</li> 
		
<!--<li>
			<a style="padding-right: 15px;" href="#" class="nav-top-item">
				Image Gallery
			</a>
			<ul style="display: none;">
				<li><a href="#">Upload Images</a></li>
				<li><a href="#">Manage Galleries</a></li>
				<li><a href="#">Manage Albums</a></li>
				<li><a href="#">Gallery Settings</a></li>
			</ul>
		</li>
		
		<li>
			<a style="padding-right: 15px;" href="#" class="nav-top-item">
				Events Calendar
			</a>
			<ul style="display: none;">
				<li><a href="#">Calendar Overview</a></li>
				<li><a href="#">Add a new Event</a></li>
				<li><a href="#">Calendar Settings</a></li>
			</ul>
		</li>
-->		
		<li>
			<a style="padding-right: 15px;" href="#" class="nav-top-item">
				Settings
			</a>
			<ul style="display: none;">
				<li><a href="#">General</a></li>
				<li><a href="#">Design</a></li>
				<li><a href="">Admin Users and Permissions</a></li>
				<li><a href="#"></a></li>
				<li><a href="#">Manage Colleges</a></li>
				<li><a href="#">Manage Schools</a></li>
				<li><a href="#">Manage Job Title</a></li>
			</ul>
		</li>      
		
	</ul> <!-- End #main-nav -->
	
	<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
		
		<h3>3 Messages</h3>
	 
		<p>
			<strong>17th May 2009</strong> by Admin<br>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
	 
		<p>
			<strong>2nd May 2009</strong> by Jane Doe<br>
			Ut a est eget ligula molestie gravida. Curabitur massa. Donec 
eleifend, libero at sagittis mollis, tellus est malesuada tellus, at 
luctus turpis elit sit amet quam. Vivamus pretium ornare est.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
	 
		<p>
			<strong>25th April 2009</strong> by Admin<br>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
			<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
		</p>
		
		<form action="" method="post">
			
			<h4>New Message</h4>
			
			<fieldset>
				<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
			</fieldset>
			
			<fieldset>
			
				<select name="dropdown" class="small-input">
					<option selected="selected" value="option1">Send to...</option>
					<option value="option2">Everyone</option>
					<option value="option3">Admin</option>
					<option value="option4">Jane Doe</option>
				</select>
				
				<input class="button" value="Send" type="submit">
				
			</fieldset>
			
		</form>
		
	</div> <!-- End #messages -->*/
	?>
</div></div> <!-- End #sidebar -->