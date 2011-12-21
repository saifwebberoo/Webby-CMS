<?php
App::uses('AppController', 'Controller');
/**
 * Widgets Controller
 *
 * @property Widget $Widget
 */
class WidgetsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Widget->recursive = 0;
		$this->set('widgets', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Widget->id = $id;
		if (!$this->Widget->exists()) {
			throw new NotFoundException(__('Invalid widget'));
		}
		$this->set('widget', $this->Widget->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Widget->create();
			if ($this->Widget->save($this->request->data)) {
				$this->Session->setFlash(__('The widget has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The widget could not be saved. Please, try again.'));
			}
		}
		$pages = $this->Widget->Page->find('list');
		$this->set(compact('pages'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin_tinymce';
		$this->set('cur_menuh','CMS');
		$this->set('cur_url', '/admin/widgets/index');
	}
/*
 * admin_filter method
 *
 * @return void
 */

	private function admin_filter() {
		if(isset($this->data['Widget'])){
			$input = $this->data['Widget'];
			if(isset($input['name']) && intval($input['name'])>0){
				$this->Session->write('AWidget.name',$input['name']);
			}
			if(isset($input['published']) && strlen(trim($input['published']))>0){
				$this->Session->write('AWidget.published',$input['published']);
			}			
			if(isset($input['modified']) && intval($input['modified'])>0){
				$this->Session->write('AWidget.modified',$input['modified']);
			}
			if(isset($input['worder']) && intval($input['worder'])>0){
				$this->Session->write('AWidget.worder',$input['worder']);
			}
		}
		
		$this->cond = array();

		if($this->Session->check('AWidget.name')){
			$this->cond['Widget.name LIKE'] = '%'.$this->Session->read('AWidget.name').'%';
		}
		if($this->Session->check('AWidget.published')){
			$this->cond['Widget.published'] = $this->Session->read('AWidget.published');
		}
		if($this->Session->check('AWidget.modified')){
			$this->cond[] = "Widget.modified BETWEEN '".$this->Session->read('AWidget.modified')." 00:00:00' AND '".$this->Session->read('AWidget.modified')." 23:59:59'";
		}
		if($this->Session->check('AWidget.worder')){
			$this->cond['Widget.worder'] = $this->Session->read('AWidget.worder');
		}
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
			$this->Session->delete('AWidget');
		}else{
			if(isset($this->data['Widget'])){
				$this->Session->delete('AWidget');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit   
		);
		
        $this->Widget->recursive = 0;        
		$this->set('widgets', $this->paginate($this->cond));
	}
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Widget->id = $id;
		if (!$this->Widget->exists()) {
			throw new NotFoundException(__('Invalid widget'));
		}
		$this->set('widget', $this->Widget->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Widget->create();
			if ($this->Widget->save($this->request->data)) {
				$this->Session->setFlash(__('The widget has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The widget could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		}
		$pages = $this->Widget->Page->find('list');
		$this->set(compact('pages'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Widget->id = $id;
		if (!$this->Widget->exists()) {
			throw new NotFoundException(__('Invalid widget'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Widget->save($this->request->data)) {
				$this->Session->setFlash(__('The widget has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The widget could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->Widget->read(null, $id);
		}
		$pages = $this->Widget->Page->find('list');
		$this->set(compact('pages'));
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
		$this->Widget->id = $id;
		if (!$this->Widget->exists()) {
			throw new NotFoundException(__('Invalid widget'));
		}
		if ($this->Widget->delete()) {
			$this->Session->setFlash(__('Widget deleted'));
		}
		$this->Session->setFlash(__('Widget was not deleted'));
		$this->autoRender = false;
	}
}
