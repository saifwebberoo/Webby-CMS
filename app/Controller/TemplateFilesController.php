<?php
App::uses('AppController', 'Controller');
/**
 * TemplateFiles Controller
 *
 * @property TemplateFile $TemplateFile
 */
class TemplateFilesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
	
		$this->layout = 'admin_editarea';
		$this->set('cur_menuh','Settings');
		$this->set('cur_url', '/admin/template_files/index');
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
			$this->Session->delete('ATemplateFile');
		}else{
			if(isset($this->data['TemplateFile'])){
				$this->Session->delete('ATemplateFile');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit   
		);
		
        $this->TemplateFile->recursive = 0;        
		$this->set('templateFiles', $this->paginate($this->cond));
	}	
	
/**
 * admin_filter method
 *
 * @return void
 */

	private function admin_filter() {
		if(isset($this->data['TemplateFile'])){
			$input = $this->data['TemplateFile'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('ATemplateFile.name',$input['name']);
			}
		}
		
		$this->cond = array();
		if($this->Session->check('ATemplateFile.name')){
			$this->cond['TemplateFile.name LIKE'] = $this->Session->read('ATemplateFile.name').'%';
		}
	}

	public function admin_add() {
		$this->layout = 'ajax';
		if ($this->request->is('post')) {
			$this->TemplateFile->create();
			if ($this->TemplateFile->save($this->request->data)) {
				$this->set('saved',true);
				$this->data = array();
				$this->Session->setFlash(__('The Template File has been saved'));
			} else {
				$this->set('saved',false);
				$this->Session->setFlash(__('The Template File could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->layout = 'ajax';
		$this->TemplateFile->id = $id;
		if (!$this->TemplateFile->exists()) {
			throw new NotFoundException(__('Invalid Template File'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TemplateFile->save($this->request->data)) {
				@unlink(ROOT.'/app'.$this->request->data['TemplateFile']['path'].'.bk');
				@rename(ROOT.'/app'.$this->request->data['TemplateFile']['path'], ROOT.'/app'.$this->request->data['TemplateFile']['path'].'.bk');

				$fp = fopen(ROOT.'/app'.$this->request->data['TemplateFile']['path'], "w");
				fputs ($fp,$this->request->data['File']['content']);
				fclose ($fp);
				$this->Session->setFlash(__('The Template File has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The Template File could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->TemplateFile->read(null, $id);
			$this->request->data['File']['content'] = file_get_contents(ROOT.'/app'.$this->request->data['TemplateFile']['path'], false);
		}

		$ext_arr = explode('.',strrev($this->data['TemplateFile']['path']));
		$ext = strrev($ext_arr[0]);
		if($ext=='ctp'){
			$ext = 'php';
		}
		$this->set('ext',$ext);

	}

	public function admin_delete($id = null) {
		$this->TemplateFile->id = $id;
		if (!$this->TemplateFile->exists()) {
			throw new NotFoundException(__('Invalid Template file category'));
		}
		if ($this->TemplateFile->delete()) {
			$this->Session->setFlash(__('Template file deleted'));
		}
		$this->Session->setFlash(__('Template file was not deleted'));
		$this->autoRender = false;
	}

}
?>