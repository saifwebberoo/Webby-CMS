<?php
App::uses('AppModel', 'Model');
/**
 * Label Model
 *
 * @property City $City
 * @property State $State
 */
class Label extends AppModel {
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
				'message' => 'Please enter the label name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'website' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'Please enter a valid URL',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact_email' => array(
			'required' => array(
				'rule'=>'notempty',
				'message'=>'Please enter a valid email address.'
			),
			'isemail' => array(
				'rule' => 'email',
				'message' =>'Please enter a valid email address.'
			),
			'isunique' => array(
				'rule' => 'isUnique',
				'message' => 'This email address already in use, please try another.'
			)
		),
		'password' => array(
			'required' => array('rule'=>'notempty', 'message'=>'Please enter a password.'),
			'length' => array('rule' => array('custom','/[a-zA-Z0-9\_\-]{6,}$/i'),'message'=>'Must be 6 characters or longer'),
			'matches' => array( 'rule' => 'validatePassword','message'=>'Your passwords dont match!' )
		),		
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'ZipCode' => array(
			'className' => 'ZipCode',
			'foreignKey' => 'zip_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
	public $hasAndBelongsToMany = array(
		'ArtistCategory' => array(
				'className' => 'ArtistCategory',
				'joinTable' => 'labels_artist_categories',
				'foreignKey' => 'label_id',
				'associationForeignKey' => 'artist_category_id',
				'unique' => true,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'finderQuery' => '',
				'deleteQuery' => '',
				'insertQuery' => ''
		),
		'Genre' => array(
			'className' => 'Genre',
			'joinTable' => 'labels_genres',
			'foreignKey' => 'label_id',
			'associationForeignKey' => 'genre_id',
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
	
	function validatePassword() {  
		$passed=true;
        $ssalt = Configure::read('Security.salt');
		//only run if there are two password feield (like NOT on the contact or signin pages..)  
		if(isset($this->data['Label']['cpassword'])) {  
			if($this->data['Label']['password'] != $this->data['Label']['cpassword']) {  
				$passed=false;  
			}else{  
				//hash passwordbefore saving  
				$this->data['Label']['password'] = md5($ssalt.$this->data['Label']['password']);
				unset($this->data['Label']['cpassword']);
			}  
		}  
		return $passed;  
	}
	
    function updatePassword($email,$password) {
        $label = $this->findByContactEmail($email);
        $ssalt = Configure::read('Security.salt');
        if(isset($label['Label']['id'])) {
            $this->id = $label['Label']['id'];
            $this->saveField('password',md5($ssalt.$password));
            return $label['Label'];
        }
        return array();
    }
    
    function validateLogin($data) { 
		$passwd = md5(Configure::read('Security.salt').$data['password']);
 		$label = $this->find('first',array(
				'conditions'=>array(
					'Label.contact_email'=>$data['email'],
					'Label.password'=>$passwd
				),
				'fields' => array(
					'id',
					'name'
				),
				'recursive' => -1
			)
		);
        if(isset($label['Label'])) 
            return $label['Label']; 
        return false; 
    }	
	
	
}
