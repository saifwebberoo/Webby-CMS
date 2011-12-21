<?php
class Setting extends AppModel {

	public $name = 'Setting';
	public $validate = array(
		'key' => array(
			'rule'=>'notempty',
			'message'=>'Please enter a key.'
		),
	);
	
	public $belongsTo = array(
		'SettingType' => array(
			'className' => 'SettingType',
			'foreignKey' => 'setting_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function beforeSave($options = array()) {
		@unlink(CACHE.'data/unlimited/cake_global_settings');
        return true;
    }
}
?>