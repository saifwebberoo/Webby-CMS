<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>A&amp;R Network :: <?php echo $title_for_layout;?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="<?php echo (isset($page) && isset($page['Page']['meta_keywords']))?$page['Page']['meta_keywords']:'A&R Network';?>" />
		<meta name="description" content="<?php echo (isset($page) && isset($page['Page']['meta_descriptions']))?$page['Page']['meta_descriptions']:'Artists Labels Connect';?>" />	
		<?php echo $this->element('frontend/head', array(), array('cache' => true));?>
	</head>
	<body>
		<div id="wrapper">
			<div id="wrapper-inner">
				<div id="header" class="head_no_banner">
					<div id="top-header">
						<h1 class="logo"><a href="/" title="label artist connect">A &amp; R Networks</a></h1>
						<?php echo $this->element('frontend/top_nav');?>
					</div>
				</div><!-- #header-->

				<div id="content" class="content-bg">
					<div class="columns-2">
						<?php
							if(isset($page) && isset($page['Widget']) && count($page['Widget'])>0){
						?>
							<div class="col2-1"><div class="col2-1-inner">
								<?php echo $content_for_layout; ?>
							</div></div>
							<div class="col2-2">
								<?php echo $this->element('frontend/right_sidebar');//, array(), array('cache' => true);?>
							</div>
						<?php
							}else{
						?>
							<div class="columns-2-inner">
								<?php echo $content_for_layout; ?>
							</div>
						<?php
							}
						?>
					</div>
					
					<div class="carousel-container dottedlines-tb">
						<?php echo $this->element('frontend/bottom_carousel'); //, array(), array('cache' => true) ?>
					</div>
					
				</div><!-- #content-->
			</div><!-- #wrapper-inner -->
		</div><!-- #wrapper -->
		<?php echo $this->element('frontend/footer');?>
		<?php echo $this->element('sql_dump');?>
	</body>
</html>