<?php
App::uses('AppModel', 'Model');
/**
 * Page Model
 *
 * @property Menu $Menu
 * @property Page $Page
 * @property Tmenu $Tmenu
 * @property Page $Page
 * @property Widget $Widget
 */
class Page extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $actsAs = array('Containable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter page title.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'menu_label' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' =>  'Please enter menu label.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pageurl' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' =>  'Please enter page url (eg: home.html, packages.html).',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule'    => 'isUnique',
				'message' => 'This page has already been added.'
			)
		),
		'menu_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' =>  'Please select the menu.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentPage' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChildPage' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Widget' => array(
			'className' => 'Widget',
			'joinTable' => 'pages_widgets',
			'foreignKey' => 'page_id',
			'associationForeignKey' => 'widget_id',
			'unique' => true,
			'conditions' => '',
			'fields' => array('id', 'name', 'content', 'worder', 'published', 'show_title'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	
	public function beforeSave($options = array()) {
		@unlink(CACHE.'data/unlimited/cake_'.str_replace(array(' ','.'),'_',$this->data['Page']['pageurl']));
        return true;
    }
}
