<?php

//$ss_photos = ClassRegistry::init('Member')->getCurrentPerformersImages();

$ss_items = array();
$img_index = 0;
/*
foreach($ss_photos as $ss_photo){
	$ss_path = get_ss_path($ss_photo['MemberDetail']['photo'], &$thumbnail);
	if($ss_path!==0 && $ss_photo['Member']['first_name'].' '.$ss_photo['Member']['last_name']!='Jane Music'){
		$ss_items[$img_index]['img_href'] 	 = 'http://'.SITE_DOMAIN.'/'.$ss_path;
		$ss_items[$img_index]['target'] 	 = '_blank';
		$ss_items[$img_index]['title'] 		 = str_replace("'","\'",$ss_photo['Member']['first_name'].' '.$ss_photo['Member']['last_name']);
		$ss_items[$img_index++]['profile_url'] = 'http://'.SITE_DOMAIN.'/more-info-artist/'.$ss_photo['MemberDetail']['UUID'];
	}
}
*/
$ss_path = $this->Thumbnail->get_ss_fixed_path(WWW_ROOT.'img/banners/pic1.jpg');
$ss_items[$img_index]['img_href'] 	 = 'http://'.SITE_DOMAIN.'/'.$ss_path;
$ss_items[$img_index]['target'] 	   = '_blank';
$ss_items[$img_index]['title'] 		   = '';
$ss_items[$img_index++]['profile_url'] = '';

$ss_path = $this->Thumbnail->get_ss_fixed_path(WWW_ROOT.'img/banners/pic2.jpg');
$ss_items[$img_index]['img_href'] 	   = 'http://'.SITE_DOMAIN.'/'.$ss_path;
$ss_items[$img_index]['target'] 	   = '_blank';
$ss_items[$img_index]['title'] 		   = '';
$ss_items[$img_index++]['profile_url'] = '';

$ss_path = $this->Thumbnail->get_ss_fixed_path(WWW_ROOT.'img/banners/pic3.jpg');
$ss_items[$img_index]['img_href'] 	   = 'http://'.SITE_DOMAIN.'/'.$ss_path;
$ss_items[$img_index]['target'] 	   = '_blank';
$ss_items[$img_index]['title'] 		   = '';
$ss_items[$img_index++]['profile_url'] = '';

$ss_path = $this->Thumbnail->get_ss_fixed_path(WWW_ROOT.'img/banners/pic4.jpg');
$ss_items[$img_index]['img_href'] 	   = 'http://'.SITE_DOMAIN.'/'.$ss_path;
$ss_items[$img_index]['target'] 	   = '_blank';
$ss_items[$img_index]['title'] 		   = '';
$ss_items[$img_index++]['profile_url'] = '';

$ss_path = $this->Thumbnail->get_ss_fixed_path(WWW_ROOT.'img/banners/pic5.jpg');
$ss_items[$img_index]['img_href'] 	   = 'http://'.SITE_DOMAIN.'/'.$ss_path;
$ss_items[$img_index]['target'] 	   = '_blank';
$ss_items[$img_index]['title'] 		   = '';
$ss_items[$img_index++]['profile_url'] = '';

$ss_path = $this->Thumbnail->get_ss_fixed_path(WWW_ROOT.'img/banners/pic6.jpg');
$ss_items[$img_index]['img_href'] 	   = 'http://'.SITE_DOMAIN.'/'.$ss_path;
$ss_items[$img_index]['target'] 	   = '_blank';
$ss_items[$img_index]['title'] 		   = '';
$ss_items[$img_index++]['profile_url'] = '';

$ss_path = $this->Thumbnail->get_ss_fixed_path(WWW_ROOT.'img/banners/pic7.jpg');
$ss_items[$img_index]['img_href'] 	   = 'http://'.SITE_DOMAIN.'/'.$ss_path;
$ss_items[$img_index]['target'] 	   = '_blank';
$ss_items[$img_index]['title'] 		   = '';
$ss_items[$img_index++]['profile_url'] = '';


?>
<ul id="myRoundabout">
<?php
	for($i=0;$i<$img_index;$i++){
?>
   <li><img src="<?php echo $ss_items[$i]['img_href']?>" alt="<?php echo $ss_items[$i]['title']?>" /></li>
<?php
	}
?>
</ul>