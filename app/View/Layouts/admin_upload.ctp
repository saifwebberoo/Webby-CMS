<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title><?php echo $title_for_layout; ?></title>
		<?php echo $this->element('admin/head_upload');//', array(), array('cache' => true)?>	
	</head>
	<body>
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		<div id="main-content"> <!-- Main Content Section with everything -->
			<div id="content">
				<?php //echo $this->Session->flash(); ?>
				<?php echo $content_for_layout; ?>
			</div>
		</div> <!-- End #main-content -->
	</div>
	<?php echo $this->element('admin/footer');?>
	<?php
		echo $this->element('sql_dump');
		echo $this->Js->writeBuffer(); // Write cached scripts
	?>
</body>
</html>
<?php 
	//echo $this->element('admin/image_crop_head');
	//echo $content_for_layout; 
	//echo $this->element('sql_dump');
	//echo $this->Js->writeBuffer(); // Write cached scripts
?>
