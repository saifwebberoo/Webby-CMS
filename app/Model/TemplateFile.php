<?php
class TemplateFile extends AppModel {

	var $name = 'TemplateFile';
	var $validate = array(
		'name' => array('notempty')
	);

}
?>