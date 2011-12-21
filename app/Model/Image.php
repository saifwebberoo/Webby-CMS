<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property ImageCategory $ImageCategory
 */
class Image extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ImageCategory' => array(
			'className' => 'ImageCategory',
			'foreignKey' => 'image_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
