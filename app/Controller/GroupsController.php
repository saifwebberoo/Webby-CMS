<?php
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

	private $cond;

/**
 * admin_filter method
 *
 * @return void
 */
	private function admin_filter() {
		if(isset($this->data['Group'])){
			$input = $this->data['Group'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('GRP.name',$input['name']);
			}
		}
		
		
		$this->cond = array();
		if($this->Session->check('GRP.name')){
			$this->cond['Group.name LIKE'] = $this->Session->read('GRP.name').'%';
		}
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('cur_menuh','Settings');
		$this->set('cur_url', '/admin/groups/index');
	}
/**
 * admin_list method
 *
 * @return void
 */
	public function admin_list($clear = 0) {
		$this->layout = 'ajax';

		if($clear==1){
			$this->Session->delete('GRP');
		}else{
			if(isset($this->data['Group'])){
				$this->Session->delete('GRP');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => 20  
		);
		
        $this->Group->recursive = 0;        
		$this->set('groups', $this->paginate($this->cond));
	}
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->set('saved', true);
				$this->data = array();
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
				$this->set('saved', false);
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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->set('saved', true);
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
				$this->set('saved', false);
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
/* 		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		} */
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'));
			//$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Group was not deleted'));
		//$this->redirect(array('action' => 'index'));
		
		$this->autoRender = false;
	}
}
