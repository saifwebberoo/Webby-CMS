<?php
/**
 * User Model
 *
 * @property Group $Group
 */
App::uses('CakeEmail', 'Network/Email');
class User extends AppModel {
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
				'message' => 'Please enter you full name.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter username.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isunique' => array(
				'rule' => 'isUnique',
				'message' => 'This username is already in use, please try another.'
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter password.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'cpwd' => array(
				'rule' => array('confirmPassword', 'password'),
				'message' => 'Passwords do not match',
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isunique' => 
						array(
							'rule' => 'isUnique',
							'message' => 'This email is already in use, please try another.'
						)
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a group from list.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	function confirmPassword($data) {
		$valid = false;
		//Security::hash(Configure::read('Security.salt') . 
		if ($data['password'] == $this->data['User']['cpassword']) {
			$valid = true;
		}
		return $valid;
	}
	
	function beforeSave($options = array()) {
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
        return true;
    }
	
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)
	);
	
	public function afterSave($created) {
		if ($created) {
			$email = new CakeEmail();
			$email->from('saif@webberoo.in')->to('saif.silver@gmail.com')->subject('Welcome')->send('Hello! This is my message to the new user.');
		}
	}	
}
