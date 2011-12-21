<?php
App::uses('AppModel', 'Model');
/**
 * Widget Model
 *
 * @property Page $Page
 */
class Widget extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Page' => array(
			'className' => 'Page',
			'joinTable' => 'pages_widgets',
			'foreignKey' => 'widget_id',
			'associationForeignKey' => 'page_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	public function beforeSave($options = array()) {
		@unlink(CACHE.'cake_element__frontend_right_sidebar_cache');
		$this->__recursiveDelete(CACHE.'data/unlimited/');
        return true;
    }
	
	/**
	 * Delete a file or recursively delete a directory
	 *
	 * @param string $str Path to file or directory
	 */
	function __recursiveDelete($str){
		if(is_file($str)){
			return @unlink($str);
		}
		elseif(is_dir($str)){
			$scan = glob(rtrim($str,'/').'/*');
			foreach($scan as $index=>$path){
				$this->__recursiveDelete($path);
			}
			return true; //@rmdir($str);
		}
	}
}
