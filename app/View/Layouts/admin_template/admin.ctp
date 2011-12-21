<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title><?php echo $title_for_layout; ?></title>
		<?php echo $this->element('admin/head', array(), array('cache' => true));?>
	</head>
  
	<body id="bodyele">
	<?php echo $this->element('admin/topnav');?>
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->

		<?php //echo $this->element('admin/sidebar');?>
		
		<div id="main-content"> <!-- Main Content Section with everything -->

			<div id="content">

				<?php //echo $this->Session->flash(); ?>

				<?php echo $content_for_layout; ?>

			</div>

			<!-- End Notifications -->
			<?php
			/*
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&copy; Copyright 2011 JobForest.In | Powered by <a href="http://thepeoplestore.in/">ThePeopleStore.IN</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			*/
			?>
		</div> <!-- End #main-content -->
		
	</div>
	<?php echo $this->element('admin/footer');?>
	<?php
		echo $this->element('sql_dump');
		echo $this->Js->writeBuffer(); // Write cached scripts
	?>
</body>
</html>