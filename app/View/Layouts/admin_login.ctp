<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo $title_for_layout;?></title>
		<link rel="stylesheet" type="text/css" href="/admin_login_theme/css/style.css" />
		<script type="text/javascript">
			function hideDiv(id){if(document.getElementById){document.getElementById(id).style.display='none';}
			else{if(document.layers){document.id.display='none';}
			else{document.all.id.style.display='none';}}}
			function showDiv(id){if(document.getElementById){document.getElementById(id).style.display='block';}
			else{if(document.layers){document.id.display='block';}
			else{document.all.id.style.display='block';}}}
			function updateDiv(id,html){if(document.getElementById){document.getElementById(id).innerHTML=html;}
			else{if(document.layers){document.id.innerHTML=html;}
			else{document.all.id.innerHTML=html;}}}
		</script>
	</head>
	<body id="login">
		<div id="login-container">
			<?php echo $content_for_layout;?>
		</div> <!--close login-container-->	
		
		<?php
			echo $this->element('sql_dump');
		?>
	</body>
</html>