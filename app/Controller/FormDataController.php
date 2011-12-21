<?php
App::uses('AppController', 'Controller');
/**
 * FormData Controller
 *
 * @property FormDatum $FormDatum
 */
class FormDataController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FormDatum->recursive = 0;
		$this->set('formData', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FormDatum->id = $id;
		if (!$this->FormDatum->exists()) {
			throw new NotFoundException(__('Invalid form datum'));
		}
		$this->set('formDatum', $this->FormDatum->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FormDatum->create();
			if ($this->FormDatum->save($this->request->data)) {
				$this->Session->setFlash(__('The form datum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form datum could not be saved. Please, try again.'));
			}
		}
		$forms = $this->FormDatum->Form->find('list');
		$this->set(compact('forms'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->FormDatum->id = $id;
		if (!$this->FormDatum->exists()) {
			throw new NotFoundException(__('Invalid form datum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FormDatum->save($this->request->data)) {
				$this->Session->setFlash(__('The form datum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form datum could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FormDatum->read(null, $id);
		}
		$forms = $this->FormDatum->Form->find('list');
		$this->set(compact('forms'));
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
		$this->FormDatum->id = $id;
		if (!$this->FormDatum->exists()) {
			throw new NotFoundException(__('Invalid form datum'));
		}
		if ($this->FormDatum->delete()) {
			$this->Session->setFlash(__('Form datum deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Form datum was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FormDatum->recursive = 0;
		$this->set('formData', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->FormDatum->id = $id;
		if (!$this->FormDatum->exists()) {
			throw new NotFoundException(__('Invalid form datum'));
		}
		$this->set('formDatum', $this->FormDatum->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FormDatum->create();
			if ($this->FormDatum->save($this->request->data)) {
				$this->Session->setFlash(__('The form datum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form datum could not be saved. Please, try again.'));
			}
		}
		$forms = $this->FormDatum->Form->find('list');
		$this->set(compact('forms'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->FormDatum->id = $id;
		if (!$this->FormDatum->exists()) {
			throw new NotFoundException(__('Invalid form datum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FormDatum->save($this->request->data)) {
				$this->Session->setFlash(__('The form datum has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form datum could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FormDatum->read(null, $id);
		}
		$forms = $this->FormDatum->Form->find('list');
		$this->set(compact('forms'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FormDatum->id = $id;
		if (!$this->FormDatum->exists()) {
			throw new NotFoundException(__('Invalid form datum'));
		}
		if ($this->FormDatum->delete()) {
			$this->Session->setFlash(__('Form datum deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Form datum was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
