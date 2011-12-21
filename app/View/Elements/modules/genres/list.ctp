<input type="hidden" id="GenreGenre" value="" name="data[Genre][Genre]">
<?php
	$sel_list = isset($this->data['Genre']['Genre'])?$this->data['Genre']['Genre']:array();
	$pgenres = ClassRegistry::init('Genre')->find('list', array('conditions' => array('Genre.genre_id'=>0),'order'=>'LOWER(Genre.name) ASC'));
	foreach($pgenres as $id=>$name){
		getGenre($id, $name, $sel_list);
	}

	function getGenre(&$id, &$name, &$sel_list){
		echo '<div class="genre-group"><div class="genre-group-head">'.$name.'</div>';
		$cgenres = ClassRegistry::init('Genre')->find('list', array('conditions' => array('Genre.genre_id'=>$id),'order'=>'LOWER(Genre.name) ASC'));
		foreach($cgenres as $cid=>$name){
			if(is_array($sel_list) && in_array($cid, $sel_list))
				echo '<div class="checkbox"><input checked="checked" type="checkbox" id="GenreGenre'.$cid.'" value="'.$cid.'" name="data[Genre][Genre][]"><label for="GenreGenre'.$cid.'">'.h($name).'</label></div>';
			else
				echo '<div class="checkbox"><input type="checkbox" id="GenreGenre'.$cid.'" value="'.$cid.'" name="data[Genre][Genre][]"><label for="GenreGenre'.$cid.'">'.h($name).'</label></div>';
		}
		echo '</div>';
	}
?> 
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	<?php if(strlen($formID)>0){ ?>
	$('#C_Genre_<?php echo $formID;?>').masonry({
	<?php } else { ?>
	$('#C_Genre').masonry({
	<?php } ?>
	  itemSelector: '.genre-group',
	  isAnimated: true
	});
});
//]]>
</script> 