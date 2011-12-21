<!-- CSS -->
<?php
	$minfy_css = array();
	$minfy_css[0] = 'app/webroot/themes/default/css/style';
	$minfy_css[1] = 'app/webroot/themes/default/js/jquery-ui-1.8.16/css/trontastic/jquery-ui-1.8.16.custom';
	$this->Minify->css($minfy_css);
?>
<!--<link rel="stylesheet" href="/themes/default/css/style.css" type="text/css" media="screen, projection" />-->
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
<!--  Javascripts -->
<?php
	$minfy_javascripts = array();
	$minfy_javascripts[0] = 'app/webroot/js/jquery-1.6.3.min';
	$minfy_javascripts[1] = 'app/webroot/themes/default/js/jquery.carousel.min';
	$minfy_javascripts[2] = 'app/webroot/themes/default/js/jquery.easing';
	$minfy_javascripts[3] = 'app/webroot/themes/default/js/jquery.masonry.min';
	$minfy_javascripts[4] = 'app/webroot/themes/default/js/custom';
	$minfy_javascripts[5] = 'app/webroot/themes/default/js/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min';
	$minfy_javascripts[6] = 'app/webroot/themes/default/photoflow/gallery/js/swfobject';
	$minfy_javascripts[7] = 'app/webroot/themes/default/photoflow/gallery/js/flashgallery';
	$this->Minify->js($minfy_javascripts);
?>
<!--<script type="text/javascript" src="/themes/default/js/jquery.roundabout.min.js"></script>-->
<!--<script type="text/javascript" src="/themes/default/js/jquery.carousel.min.js"></script>
<script type="text/javascript" src="/themes/default/js/jquery.easing.js"></script>
<script type="text/javascript" src="/themes/default/js/custom.js"></script>-->

<!--[if lte IE 7]> 
<style type="text/css">
#social-icons{
	margin-left:-930px;
}
#hide-photogallery{
	margin-left:-910px;
}
#myRoundabout{
	margin-top:50px;
}
</style>
<![endif]-->


<!-- Jquery UI -->

<!--<link type="text/css" href="/themes/default/js/jquery-ui-1.8.16/css/swanky-purse/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	-->
<!--<script type="text/javascript" src="/themes/default/js/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>-->


<script type="text/javascript">
	$(function(){

		// Accordion
		$("#accordion").accordion({ header: "h3" });

		// Tabs
		$('#tabs').tabs();
		
		//hover states on the static widgets
		$('#dialog_link, ul#icons li').hover(
			function() { $(this).addClass('ui-state-hover'); }, 
			function() { $(this).removeClass('ui-state-hover'); }
		);
		
	});
</script>
<!--
<script src="/themes/default/photoflow/gallery/js/swfobject.js" type="text/javascript"></script>
<script src="/themes/default/photoflow/gallery/js/flashgallery.js" type="text/javascript"></script>
-->