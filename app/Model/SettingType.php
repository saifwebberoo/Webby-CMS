<?php
class SettingType extends AppModel {

	var $name = 'SettingType';
	var $validate = array(
		'name' => array(
			'rule'=>'notempty',
			'message'=>'Please enter a name.'
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Setting' => array(
			'className' => 'Setting',
			'foreignKey' => 'setting_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	function afterSave(){
		@unlink(CACHE.'views'.DS.'element_cache_admin_admin_setting');
	} 
	
	function afterDelete(){
		@unlink(CACHE.'views'.DS.'element_cache_admin_admin_setting');
	} 

}
?>