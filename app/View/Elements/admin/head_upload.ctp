<!-- CSS -->
<?php
	$minfy_css = array();
	$minfy_css[0] = 'app/webroot/admin_theme/reset';
	$minfy_css[1] = 'app/webroot/admin_theme/style';
	$minfy_css[2] = 'app/webroot/admin_theme/invalid';
	$minfy_css[3] = 'app/webroot/js/jquery-ui-1.8.16.custom/css/start/jquery-ui-1.8.16.custom';
	$minfy_css[4] = 'app/webroot/ajax_upload_crop/fileuploader';
	$minfy_css[5] = 'app/webroot/ajax_upload_crop/css/jquery.Jcrop';
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
	$minfy_javascripts[1] = 'app/webroot/js/jquery.editinplace';
	$minfy_javascripts[2] = 'app/webroot/js/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min';
	$minfy_javascripts[3] = 'app/webroot/js/jquery.scrollTo-min';
	$minfy_javascripts[4] = 'app/webroot/admin_theme/customjs';

	$minfy_javascripts[5] = 'app/webroot/ajax_upload_crop/fileuploader';
	$minfy_javascripts[6] = 'app/webroot/ajax_upload_crop/js/jquery.Jcrop';
	$minfy_javascripts[7] = 'app/webroot/ajax_upload_crop/js/jquery.form';
	$this->Minify->js($minfy_javascripts);

if($this->layout == 'admin_tinymce' || isset($include_tinymce)){
?>
<script type='text/javascript' src='/js/tiny_mce/tiny_mce.js'></script>	
<script type='text/javascript' src='/js/tiny_mce/tiny_mce_helper.js'></script>	
<?php
}

if($this->layout == 'admin_ckeditor' || isset($include_fck)){
?>
<script type="text/javascript">
	function xtoggle(ele_id,cele){
		$('#'+ele_id).toggle();
		if($(ele_id).is(':visible')){
			$(cele).html('+');
		}else{
			$(cele).html('-');
		}
	}
</script>
<script type='text/javascript' src='/js/ckeditor/ckeditor.js'></script>	
<script type='text/javascript' src='/js/ckeditor/adapters/jquery.js'></script>
<?php
}
?>