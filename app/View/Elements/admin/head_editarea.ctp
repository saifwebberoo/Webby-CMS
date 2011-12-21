<!-- CSS -->
<?php
	$minfy_css = array();
	$minfy_css[0] = 'app/webroot/admin_theme/reset';
	$minfy_css[1] = 'app/webroot/admin_theme/style';
	$minfy_css[2] = 'app/webroot/admin_theme/invalid';
	$minfy_css[3] = 'app/webroot/js/jquery-ui-1.8.16.custom/css/start/jquery-ui-1.8.16.custom';
	$this->Minify->css($minfy_css);
?>

<!-- Internet Explorer Fixes Stylesheet -->

<!--[if lte IE 7]>
	<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
<![endif]-->

<!--  Javascripts -->
<?php
	$minfy_javascripts = array();
	$minfy_javascripts[0] = 'app/webroot/js/jquery-ui-1.8.16.custom/js/jquery-1.6.2.min';
	$minfy_javascripts[1] = 'app/webroot/js/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min';
	$minfy_javascripts[2] = 'app/webroot/admin_theme/customjs';
	$this->Minify->js($minfy_javascripts);
?>

<script language="Javascript" type="text/javascript" src="/editarea_0_8_2/edit_area/edit_area_full.js"></script>