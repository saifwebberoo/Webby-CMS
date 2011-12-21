<?php
	if(!isset($sel_limit)){
		$sel_limit = 20;
	}
	$limits = array(5=>5,10=>10,20=>20,50=>50,100=>100,'1000'=>'-- All --');
	echo $this->Form->input('Page.limit',array('label'=>false,'options'=>$limits,'selected'=>$sel_limit,'onchange'=>"updatePageLimitUrl('$cur_url','$title');return false;"))
?>
<!--
<select name="dropdown">
	<option selected="selected" value="option1">Choose an action...</option>
	<option value="option2">Edit</option>
	<option value="option3">Delete</option>
</select>
<a class="button" href="#">Apply to selected</a>-->