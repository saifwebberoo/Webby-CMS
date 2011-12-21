<?php
	$minfy_css = array();
	$minfy_css[0] = 'app/webroot/admin_desk/css/template';
	$minfy_css[1] = 'app/webroot/admin_desk/css/windows';
	$minfy_css[2] = 'app/webroot/admin_desk/css/dock';
	$minfy_css[3] = 'app/webroot/admin_desk/css/menu';
	$minfy_css[4] = 'app/webroot/themes/default/js/jquery-ui-1.8.16/css/dot-luv/jquery-ui-1.8.16.custom';
	$minfy_css[5] = 'app/webroot/admin_desk/js/jquery-window-5.03/css/jquery.window';
	$this->Minify->css($minfy_css);

	$minfy_javascripts = array();
	$minfy_javascripts[0] = 'app/webroot/admin_desk/js/jquery';
	//$minfy_javascripts[1] = 'app/webroot/admin_desk/js/jquery-ui';
	$minfy_javascripts[2] = 'app/webroot/admin_desk/js/jquery-inc';
	$minfy_javascripts[3] = 'app/webroot/admin_desk/js/jclock';
	$minfy_javascripts[4] = 'app/webroot/admin_desk/js/interface';
	$minfy_javascripts[5] = 'app/webroot/admin_desk/js/functions';
	$minfy_javascripts[6] = 'app/webroot/admin_desk/js/init';
	$minfy_javascripts[7] = 'app/webroot/themes/default/js/jquery.easing';
	$minfy_javascripts[8] = 'app/webroot/themes/default/js/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min';
	$minfy_javascripts[9] = 'app/webroot/admin_desk/js/jquery-window-5.03/jquery.window.min';
	$this->Minify->js($minfy_javascripts);
?>