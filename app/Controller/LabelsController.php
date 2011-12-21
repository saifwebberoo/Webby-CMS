<?php
App::uses('AppController', 'Controller');
/**
 * Labels Controller
 *
 * @property Label $Label
 */
class LabelsController extends AppController {

    function validateFields()
    {
        if(is_array($this->request->data['Label']['contact_phone']))
            $this->request->data['Label']['contact_phone'] = implode(',',$this->request->data['Label']['contact_phone']);
        else
            $this->request->data['Label']['contact_phone'] = '';

        if(is_array($this->request->data['Label']['genre']))
            $this->request->data['Label']['genre'] = implode(',',$this->request->data['Label']['genre']);
        else
            $this->request->data['Label']['genre'] = '';

		$this->request->data['Label']['created_on']= date('Y-m-d');
        $ssalt = Configure::read('Security.salt');
        $this->request->data['Label']['code'] = md5($ssalt.$this->request->data['Label']['username']);
    }
	function processInverse()
	{
        if(is_string($this->request->data['Label']['contact_phone']))
            $this->request->data['Label']['contact_phone'] = explode(',',$this->request->data['Label']['contact_phone']);
        else
            $this->request->data['Label']['contact_phone'] = '';
	
        if(is_string($this->request->data['Label']['genre']))
            $this->request->data['Label']['genre'] = explode(',',$this->request->data['Label']['genre']);
        else
            $this->request->data['Label']['genre'] = '';

	}	
/**
 * label registration method
 *
 * @return void
 */	
	function label_signup() {
	
		$this->set('isAjax',0);
		if($this->RequestHandler->isAjax())
		{
			$this->layout="ajax";
			$this->set('isAjax',1);
		}		
		else
			$this->layout='default';
			
		if (!empty($this->request->data)) {

			$this->Label->create();
            $this->validateFields();
/* 			pr($this->request->data);
			exit; */
			
			if ($this->Label->save($this->request->data)) {
				//$this->sendAuthMail();
				$result = $this->Label->query("SELECT `content` FROM `pages` WHERE `id`='130'");
                $this->Session->setFlash($result[0]['pages']['content']);
                //$this->redirect('/SignIn');
			} else {
				$this->processInverse();
				$this->Session->setFlash(__('The Profile could not be registered. Please, try again.', true));
			}
		}
		$genres = $this->Label->Genre->find('list',array(
															'order'=>array('Genre.name ASC'),
															'fields'=>array('id','name')
											));
		$this->set(compact('genres'));
	}	

	public function login(){ 
		if(empty($this->data) == false){
		
			unset($this->Label->validate['password']);
			unset($this->Label->validate['email']['isunique']);
			$this->Label->create();
			$this->Label->set($this->data);
			
			//if ($this->MemberProfile->validates()){
			if ($this->Label->validates(array('fieldList' => array('email', 'password')))) {
			
				
				if(($member = $Label->validateLogin($this->data['MemberProfile'])) != false){

					if(isset($member['id']) && intval($member['id'])>0){
				
						$this->Session->write('Label', $member);
						$this->Session->setFlash('You\'ve successfully logged in...'); 
						//$this->redirect('/agent-profile/'.$member['id']);
						
					}else{
						$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
						$this->redirect('/member-login');
					}
					exit(); 
				}else{
					$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');			
				}		


			}
		} 
    }

	
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Label->save($this->request->data)) {
				$this->Session->setFlash(__('The label has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The label could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Label->read(null, $id);
		}
		$cities = $this->Label->City->find('list');
		$states = $this->Label->State->find('list');
		$this->set(compact('cities', 'states'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
/* 		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		} */
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->Label->delete()) {
			$this->Session->setFlash(__('Label deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Label was not deleted'));
		$this->autoRender = false;
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin';
		$this->set('cur_menuh','Labels');
		$this->set('cur_url', '/admin/labels/index');
	}

	
/**
 * admin_list method
 *
 * @return void
 */
	public function admin_list($clear = 0, $limit = null) {
		
		if($limit){
			$this->admin_setPaging($limit);
		}else{
			$limit = $this->admin_getPaging();
		}
		
		$this->layout = 'ajax';

		if($clear==1){
			$this->Session->delete('LBL');
		}else{
			if(isset($this->data['Label'])){
				$this->Session->delete('LBL');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit   
		);
		
        $this->Label->recursive = 0;        
		$this->set('labels', $this->paginate($this->cond));
	}	


/**
 * admin_filter method
 *
 * @return void
 */
	private function admin_filter() {
		if(isset($this->data['Label'])){
			$input = $this->data['Label'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('LBL.name',$input['name']);
			}
			if(isset($input['website']) && strlen($input['website'])>0){
				$this->Session->write('LBL.website',$input['website']);
			}
			if(isset($input['contact_name']) && strlen($input['contact_name'])>0){
				$this->Session->write('LBL.contact_name',$input['contact_name']);
			}
			if(isset($input['contact_phone']) && strlen($input['contact_phone'])>0){
				$this->Session->write('LBL.contact_phone',$input['contact_phone']);
			}			
		}
		
		$this->cond = array();
		if($this->Session->check('LBL.name')){
			$this->cond['Label.name LIKE'] = $this->Session->read('LBL.name').'%';
		}

		if($this->Session->check('LBL.website')){
			$this->cond['Label.website LIKE'] = $this->Session->read('LBL.website');
		}
		if($this->Session->check('LBL.contact_name')){
			$this->cond['Label.contact_name LIKE'] = $this->Session->read('LBL.contact_name');
		}
		if($this->Session->check('LBL.contact_phone')){
			$this->cond['Label.contact_phone LIKE'] = $this->Session->read('LBL.contact_phone');
		}

	}

	
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		$this->set('label', $this->Label->read(null, $id));
	}
/**
 * processData method
 *
 * @return void
 */
	
	function processData(){
		
		if(isset($this->request->data['ArtistCategory']['ArtistCategory'][0])){
			$this->request->data['Label']['artist_categories'] = implode(',', $this->request->data['ArtistCategory']['ArtistCategory']);
			unset($this->request->data['ArtistCategory']);
		}
		
		if(isset($this->request->data['Genre']['Genre'][0])){
			$this->request->data['Label']['genres'] = implode(',', $this->request->data['Genre']['Genre']);
			unset($this->request->data['Genre']);
		}
	}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->processData();
			$this->Label->primaryKey = 'UUID';
			$this->Label->create();
			if ($this->Label->save($this->request->data)) {
				$this->request->data = array();
				$this->set('saved',true);
			} else {
				$this->set('saved',false);
				$this->processDataReverse();
			}
		}

		/* Artits Categories List */
		$artistCategories = $this->Label->ArtistCategory->find('list',array(
				'order' => array(
					'ArtistCategory.name ASC'
				),
				'conditions' => array(
					'ArtistCategory.published' => 1
				)
		));
		
		/* Genre List */
		$genres = $this->Label->Genre->find('list',array(
			'conditions' => array(
				'Genre.published' => 1
			),
			'order' => array('Genre.name ASC')
		));

		$this->set(compact('artistCategories','genres'));
	}
/**
 * processDataReverse method
 *
 * @return void
 */
	function processDataReverse(){
		if(isset($this->request->data['Label']['artist_categories']))
			$this->request->data['ArtistCategory']['ArtistCategory'] = explode(',', $this->request->data['Label']['artist_categories']);
		if(isset($this->request->data['Label']['genres']))
			$this->request->data['Genre']['Genre'] = explode(',', $this->request->data['Label']['genres']);
	}
	
/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	function admin_edit($id = null) {

		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			unset($this->Label->validate['password']);
			$this->processData();
			if ($this->Label->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved'));
				$this->processDataReverse();
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
				$this->processDataReverse();
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->Label->read(null, $id);
			$this->processDataReverse();
		}
		
		
		/* Artits Categories List */
		$artistCategories = $this->Label->ArtistCategory->find('list',array(
				'order' => array(
					'ArtistCategory.name ASC'
				),
				'conditions' => array(
					'ArtistCategory.published' => 1
				)
		));
		
		/* Genre List */
		$genres = $this->Label->Genre->find('list',array(
			'conditions' => array(
				'Genre.published' => 1
			),
			'order' => array('Genre.name ASC')
		));

		$this->set(compact('artistCategories','genres'));
	}
	
/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->Label->delete()) {
			$this->Session->setFlash(__('Label deleted'));
		}
		$this->autoRender = false;
	}
}
