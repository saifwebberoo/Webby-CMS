<?php
App::uses('AppController', 'Controller');
/**
 * ImageCategories Controller
 *
 * @property ImageCategory $ImageCategory
 */
class ImageCategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImageCategory->recursive = 0;
		$this->set('imageCategories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ImageCategory->id = $id;
		if (!$this->ImageCategory->exists()) {
			throw new NotFoundException(__('Invalid image category'));
		}
		$this->set('imageCategory', $this->ImageCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImageCategory->create();
			if ($this->ImageCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The image category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image category could not be saved. Please, try again.'));
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
		$this->ImageCategory->id = $id;
		if (!$this->ImageCategory->exists()) {
			throw new NotFoundException(__('Invalid image category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImageCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The image category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ImageCategory->read(null, $id);
		}
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
		$this->ImageCategory->id = $id;
		if (!$this->ImageCategory->exists()) {
			throw new NotFoundException(__('Invalid image category'));
		}
		if ($this->ImageCategory->delete()) {
			$this->Session->setFlash(__('Image category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image category was not deleted'));
		$this->autoRender = false;
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
	
		$this->layout = 'admin';
		$this->set('cur_menuh','Media');
		$this->set('cur_url', '/admin/image_categories/index');
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
			$this->Session->delete('IMCF');
		}else{
			if(isset($this->data['ImageCategory'])){
				$this->Session->delete('IMCF');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit   
		);
		
        $this->ImageCategory->recursive = 0;        
		$this->set('image_categories', $this->paginate($this->cond));
	}	
	
/**
 * admin_filter method
 *
 * @return void
 */
	private function admin_filter() {
		if(isset($this->data['ImageCategory'])){
			$input = $this->data['ImageCategory'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('IMCF.name',$input['name']);
			}
		}
		
		$this->cond = array();
		if($this->Session->check('IMCF.name')){
			$this->cond['ImageCategory.name LIKE'] = $this->Session->read('IMCF.name').'%';
		}
	}	
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ImageCategory->id = $id;
		if (!$this->ImageCategory->exists()) {
			throw new NotFoundException(__('Invalid image category'));
		}
		$this->set('imageCategory', $this->ImageCategory->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ImageCategory->create();
			
				$except = array('\\', '/', ':', '*', '?', '"', '<', '>', '|',' ','+');
				$this->request->data['ImageCategory']['path_name'] =  str_replace($except, '_',$this->request->data['ImageCategory']['name']); 
				
			if ($this->ImageCategory->save($this->request->data)) {
				@mkdir(WWW_ROOT."uploads/".$this->request->data['ImageCategory']['path_name']);
				@mkdir(WWW_ROOT."uploads/".$this->request->data['ImageCategory']['path_name'].'/thumb_images');
				@mkdir(WWW_ROOT."uploads/".$this->request->data['ImageCategory']['path_name'].'/croped_images');
				$this->set('saved',true);
				$this->data = array();
				$this->Session->setFlash(__('The image category has been saved'));
			} else {
				$this->set('saved',false);
				$this->Session->setFlash(__('The image category could not be saved. Please, try again.'));
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
		$this->ImageCategory->id = $id;
		if (!$this->ImageCategory->exists()) {
			throw new NotFoundException(__('Invalid image category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			$except = array('\\', '/', ':', '*', '?', '"', '<', '>', '|',' ','+');

			$old = $this->ImageCategory->read(null,$this->request->data['ImageCategory']['id']);
			$oldname = $old['ImageCategory']['path_name'];		
			
			$this->request->data['ImageCategory']['path_name'] =  str_replace($except, '_',$this->request->data['ImageCategory']['name']); 
				
			if ($this->ImageCategory->save($this->request->data)) {
				@rename(WWW_ROOT."uploads/".$oldname,WWW_ROOT."uploads/".$this->request->data['ImageCategory']['path_name']);
				@chmod(WWW_ROOT."uploads/".$this->request->data['ImageCategory']['path_name'],0777);
				$this->Session->setFlash(__('The image category has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The image category could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->ImageCategory->read(null, $id);
		}

	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if(false){
			$this->ImageCategory->id = $id;
			if (!$this->ImageCategory->exists()) {
				throw new NotFoundException(__('Invalid image category'));
			}
			if ($this->ImageCategory->delete()) {
				$this->Session->setFlash(__('Image category deleted'));
			}
			$this->Session->setFlash(__('Image category was not deleted'));
		}
		$this->autoRender = false;
	}
}
