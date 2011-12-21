<?php
App::uses('AppModel', 'Model');
/**
 * ImageCategory Model
 *
 * @property Image $Image
 */
class ImageCategory extends AppModel {
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
		'name' => 
				array(
					'notempty' => 	
							array(
								'rule'=>'notempty',
								'message'=>'Please enter the category name'
							),
						'isunique' => 
							array(
								'rule' => 'isUnique',
								'message' => 'This category is already exist, please try another.'
							)
		),		
		'crop_width' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a valid width',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'crop_height' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a valid height',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'image_category_id',
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

}
