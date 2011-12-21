<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title><?php echo $title_for_layout; ?></title>
		<!--
		<link rel="stylesheet" href="/admin_desk/css/template.css" type="text/css" />
		<link rel="stylesheet" href="/admin_desk/css/windows.css" type="text/css" />
		<link rel="stylesheet" href="/admin_desk/css/dock.css" type="text/css" />
		<link rel="stylesheet" href="/admin_desk/css/menu.css" type="text/css" />
		-->
		<?php echo $this->element('admin/desktop_head', array(), array('cache' => true))?>
		<!--
		<script type="text/javascript" src="/admin_desk/js/jquery.js"></script>
		<script type="text/javascript" src="/admin_desk/js/jquery-ui.js"></script>
		<script type="text/javascript" src="/admin_desk/js/jquery-inc.js"></script>
		<script type="text/javascript" src="/admin_desk/js/jclock.js"></script>
		<script type="text/javascript" src="/admin_desk/js/interface.js"></script>
		<script type="text/javascript" src="/admin_desk/js/functions.js"></script>
		<script type="text/javascript" src="/admin_desk/js/init.js"></script>
		-->
	</head>
	<body>
		<div class="taskBar" id="window_block2">
			<?php echo $this->element('admin/desktop_topnav', array(), array('cache' => true));?>
		</div>
		<div id="window-container">
			<?php //echo $content_for_layout; ?>
		</div>
		<div class="dock" id="dock">
			<div class="dock-container">
				<a class="dock-item" href="/admin/pages/index" title="Page Manager" rel="1000-400-0-0">
					<span>Pages</span><img src="/admin_desk/images/myicons/page.png" alt="Page Manager" />
				</a> 
				<a class="dock-item" href="/admin/widgets/index" title="Widget Manager" rel="1000-400-10-10">
					<span>Widgets</span><img src="/admin_desk/images/myicons/widget.png" alt="Widget Manager" />
				</a> 
				<a class="dock-item" href="/admin/forms/index" title="Form Manager" rel="1000-400-20-20">
					<span>Forms</span><img src="/admin_desk/images/myicons/form.png" alt="Form Manager" />
				</a> 
				<a class="dock-item" href="/admin/menus/index" title="Menu Manager" rel="1000-400-30-30">
					<span>Menus</span><img src="/admin_desk/images/myicons/menu.png" alt="Menu Manager" />
				</a> 
				<a class="dock-item" href="/admin/images/index" title="Image Manager" rel="1000-400-40-40">
					<span>Images</span><img src="/admin_desk/images/myicons/image.png" alt="Image Manager" />
				</a> 
				<!--<a class="dock-item" href="/admin/histories/index" title="Open Page" rel="900-300-0-0">
					<span>History</span><img src="/admin_desk/images/icons/history.png" alt="history" />
				</a> 
				<a class="dock-item" href="http://www.igoogle.com" title="Open Page" rel="900-300-0-0">
					<span>Calendar</span><img src="/admin_desk/images/icons/calendar.png" alt="calendar" />
				</a> 
				<a class="dock-item" href="content.php" title="Open Page" rel="900-300-0-0">
					<span>RSS</span><img src="/admin_desk/images/icons/rss.png" alt="rss" />
				</a>-->
				<a class="dock-item" href="/admin/artists/index" title="Artists" rel="1000-400-0-0">
					<span>Artists</span><img src="/admin_desk/images/myicons/artists.png" alt="Artists" />
				</a>
				<a class="dock-item" href="/admin/labels/index" title="Labels" rel="1000-400-0-0">
					<span>Labels</span><img src="/admin_desk/images/myicons/labels.png" alt="Labels" />
				</a>
				<a class="dock-item" href="/admin/settings/index" title="Settings" rel="1000-400-0-0">
					<span>Settings</span><img src="/admin_desk/images/myicons/settings.png" alt="Settings" />
				</a> 
				<a class="dock-item" href="/" title="Preview" rel="1000-400-0-0">
					<span>Preview</span><img src="/admin_desk/images/myicons/preview.png" alt="Preview" />
				</a>
				<div id="dynamic-icons"></div>
			</div> 
		</div>
	</body>
</html>