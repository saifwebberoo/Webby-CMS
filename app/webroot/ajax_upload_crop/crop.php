<?php
	$targ_w = $targ_h = 150;
	$jpeg_quality = 90;
	$src = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/ajax_upload_crop/uploads/'.$_POST['image_name'];
	$thumb_path= $_SERVER['DOCUMENT_ROOT'].'/app/webroot/ajax_upload_crop/uploads/tt.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
//echo "hai";
	//header('Content-type: image/jpeg');
	imagejpeg($dst_r,$thumb_path,$jpeg_quality);
?>
