<?php
App::uses('AppController', 'Controller');
/**
 * SettingTypes Controller
 *
 * @property SettingType $SettingType
 */
class SettingTypesController extends AppController {

	var $name = 'SettingTypes';
	public function admin_index() {
		$this->layout = 'admin';
		$this->set('cur_menuh','Settings');
		$this->set('cur_url', '/admin/setting_types/index');		
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
			$this->Session->delete('ASettingType');
		}else{
			if(isset($this->data['SettingType'])){
				$this->Session->delete('ASettingType');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit  
		);
		
        $this->SettingType->recursive = 0;        
		$this->set('settingTypes', $this->paginate($this->cond));
	}
/*
 * admin_filter method
 *
 * @return void
 */

	private function admin_filter() {
		if(isset($this->data['SettingType'])){
			$input = $this->data['SettingType'];
			if(isset($input['name'])&& intval($input['name'])>0){
				$this->Session->write('ASettingType.name',$input['name']);
			}
		}
		
		$this->cond = array();
		if($this->Session->check('ASettingType.name')){
			$this->cond['SettingType.name LIKE'] = $this->Session->read('ASetting.setting_type_id').'%';
		}
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SettingType->create();
			if ($this->SettingType->save($this->request->data)) {
				$this->Session->setFlash(__('The setting type has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The setting type could not be saved. Please, try again.'));
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
		$this->SettingType->id = $id;
		if (!$this->SettingType->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SettingType->save($this->request->data)) {
				$this->Session->setFlash(__('The setting type has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The setting type could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->SettingType->read(null, $id);
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
			$this->SettingType->id = $id;
			if (!$this->SettingType->exists()) {
				throw new NotFoundException(__('Invalid setting type'));
			}
			if ($this->SettingType->delete()) {
				$this->Session->setFlash(__('Setting Type deleted'));
			}
			$this->Session->setFlash(__('Setting Type was not deleted'));
		}
		$this->autoRender = false;
	}
}
?>