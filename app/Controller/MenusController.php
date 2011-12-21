<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 */
class MenusController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Menu->recursive = 0;
		$this->set('menus', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->set('menu', $this->Menu->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
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
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Menu->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->Menu->delete()) {
			$this->Session->setFlash(__('Menu deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Menu was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Menu->recursive = 0;
		$this->set('menus', $this->paginate());
		
		$this->set('cur_menuh','CMS');
		$this->set('cur_url', '/admin/menus/index');		
	}
/**
 * admin_list method
 *
 * @param string $clear
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
			$this->Session->delete('AMenu');
		}else{
			if(isset($this->data['Menu'])){
				$this->Session->delete('AMenu');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit  
		);
		
        $this->Menu->recursive = 0;        
		$this->set('menus', $this->paginate($this->cond));
	}
/*
 * admin_filter method
 *
 * @return void
 */

	private function admin_filter() {
		if(isset($this->data['Menu'])){
			$input = $this->data['Menu'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('AMenu.name',$input['name']);
			}
			if(isset($input['modified']) && intval($input['modified'])>0){
				$this->Session->write('AMenu.modified',$input['modified']);
			}
		}
		
		$this->cond = array();

		if($this->Session->check('AMenu.name')){
			$this->cond['Menu.name LIKE'] = '%'.$this->Session->read('AMenu.name').'%';
		}
		if($this->Session->check('AMenu.modified')){
			$this->cond[] = "Menu.modified BETWEEN '".$this->Session->read('AMenu.modified')." 00:00:00' AND '".$this->Session->read('AMenu.modified')." 23:59:59'";
		}
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->set('menu', $this->Menu->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->Menu->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		/*if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}*/
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->Menu->delete()) {
			$this->Session->setFlash(__('Menu deleted'));
		}
		$this->Session->setFlash(__('Menu was not deleted'));
		$this->autoRender = false;
	}
}
