<?php
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	private $cond;

	public function beforeFilter() {
		$this->Auth->autoRedirect = false;
		parent::beforeFilter();
		//$this->Auth->allow('*');
		$this->Auth->allowedActions = array('admin_login','admin_forgotpassword');
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin';
		
		$this->set('cur_menuh','Settings');
		$this->set('cur_url', '/admin/users/index');
	}

/**
 * admin_filter method
 *
 * @return void
 */
	private function admin_filter() {
		if(isset($this->data['User'])){
			$input = $this->data['User'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('UF.name',$input['name']);
			}
			
			if(isset($input['username']) && strlen(trim($input['username']))>0){
				$this->Session->write('UF.username',$input['username']);
			}
			
			if(isset($input['group_id']) && intval($input['group_id'])>0){
				$this->Session->write('UF.group_id',$input['group_id']);
			}
			
			if(isset($input['is_online']) && intval($input['is_online'])>0){
				$this->Session->write('UF.is_online',$input['is_online']);
			}
			
			if(isset($input['blocked']) && intval($input['blocked'])>0){
				$this->Session->write('UF.blocked',$input['blocked']);
			}
			
			if(isset($input['modified']) && strlen(trim($input['modified']))>0){
				$this->Session->write('UF.modified',$input['modified']);
			}
		}
		
		$this->cond = array();
		if($this->Session->check('UF.name')){
			$this->cond['User.name LIKE'] = $this->Session->read('UF.name').'%';
		}
		if($this->Session->check('UF.username')){
			$this->cond['User.username LIKE'] = $this->Session->read('UF.username').'%';
		}
		if($this->Session->check('UF.group_id')){
			$this->cond['User.group_id'] = $this->Session->read('UF.group_id');
		}
		if($this->Session->check('UF.is_online')){
			$this->cond['User.is_online'] = $this->Session->read('UF.is_online');
		}
		if($this->Session->check('UF.blocked')){
			$this->cond['User.blocked'] = $this->Session->read('UF.blocked');
		}
		if($this->Session->check('UF.modified')){
			$this->cond[] = "User.modified BETWEEN '".$this->Session->read('UF.modified')." 00:00:00' AND '".$this->Session->read('UF.modified')." 23:59:59'";
		}

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
			$this->Session->delete('UF');
		}else{
			if(isset($this->data['User'])){
				$this->Session->delete('UF');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => 20  
		);
		
        $this->User->recursive = 0;        
		$this->set('users', $this->paginate($this->cond));
                
        $groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->set('saved',true);
				$this->data = array();
				$this->Session->setFlash(__('The user has been saved'));
			} else {
				$this->set('saved',false);
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if(strlen(trim($this->request->data['User']['password']))==0){
				unset($this->User->validate['password']);
				unset($this->request->data['User']['password']);
				unset($this->request->data['User']['cpassword']);
			}
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		
		
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
	/* 	if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		} */
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
/* 			$this->redirect(array('action'=>'index')); */
		}
		$this->Session->setFlash(__('User was not deleted'));
/* 		$this->redirect(array('action' => 'index')); */

		$this->autoRender = false;
	}
	
    public function admin_login() {
        $this->layout = 'admin_login';

		//-- code inside this function will execute only when autoRedirect was set to false (i.e. in a beforeFilter).
		if ($this->Auth->login()) {
			if (!empty($this->data['User']['remember_me'])) {
				$san = new Sanitize();
				// Sanitize the input of items we do not know what the end user put in.
				$this->data['User']['username'] = $san->paranoid($this->data['User']['username']);
				// Grab the data from the User table and set them to the cookie array
				$cookie = array();
				$cookie['username'] = $this->data['User']['username'];
				$cookie['password'] = $this->data['User']['password'];
				$this->Cookie->write('Auth.User', base64_encode(serialize($cookie)), true, '+2 weeks');
				unset($this->data['User']['remember_me']);
			}
			$update['User']['id'] = $this->Auth->user('id');
            $update['User']['last_login'] =  date('Y-m-d H:i:s');
            $update['User']['last_login_ip'] = $this->RequestHandler->getClientIP();
			$update['User']['remote_address'] = $_SERVER['REMOTE_ADDR'];
			$update['User']['is_online'] = 1;
            $this->User->save($update, false, array('id', 'last_login', 'last_login_ip','remote_address','is_online'));
			$this->redirect($this->Auth->redirect());
		}
		
		if (empty($this->data)) {
			$cookie = unserialize(base64_decode($this->Cookie->read('Auth.User')));
			if (!is_null($cookie)) {
				if ($this->Auth->login($cookie)) {
					//  Clear auth message, just in case we use it.
					$this->Session->del('Message.auth');
					$redirect = $this->Auth->redirect();
					$this->redirect($redirect);
				}
			}
		}
		$this->set('title_for_layout', 'ARNet :: Login');
	}

     
    public function admin_logout() {
        $this->Session->setFlash('Good-Bye');
		
		$update['User']['id'] = $this->Auth->user('id');
		$update['User']['is_online'] = 0;
		$this->User->save($update, false, array('id', 'is_online'));
		
		$this->redirect($this->Auth->logout());
    }
	
	public function admin_forgotpassword(){
		if (!empty($this->data)) {
			$email = $this->User->find('first',array('conditions'=>array('email'=>$this->data['User']['email'])));
			if(isset($email['User'])){
				$password = rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);
				$this->User->id = $email['User']['id'];
				$this->User->saveField('password', $password);

				App::uses('FastMailComponent', 'Controller/Component');
				FastMailComponent::sendMail(array(
					'from' 		=> 'admin@aandrnetwork.com',
					'from_name' => 'A And R Network - Artists Labels Connect.',
					'to' 		=> trim($this->data['User']['email']),
					'subject' 	=> 'New Password Notification From ARNetwork Admin',
					'message' 	=> 'Use the following login detail:<br /><br /><b>Username</b>: '.$email['User']['username'].'<br /><b>Password</b>: '.$password
				));
				$this->Session->setFlash('Password sent to email.');
			}else{
				$this->Session->setFlash('Email entered not found in system.');
			}
			$this->redirect('/admin');
		}
	}
	
	public function admin_dashboard(){
		$this->set('title_for_layout','CMS :: Webberoo.IN');
		$this->layout = 'admin_desktop';
		$this->set('cur_menuh','Dashboard');
		$this->set('cur_url', '/admin-dashboard');
	}
}
