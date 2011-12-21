<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 */
class SettingsController extends AppController {

	var $name = 'Settings';
	/*
	function beforeFilter() {
		if($this->Session->read('User.permissions.BLOCKED_SETTINGS')==1){
			switch($this->action){
				case 'admin_index':
				case 'admin_view':
				case 'admin_add':
				case 'admin_delete':
				case 'admin_deleteall':
				case 'admin_update_pair':
				case 'admin_edit':
					$this->redirect('/AdminHome');exit;break;
				default:
					break;
			}
		}
		parent::beforeFilter();
	}
	*/
	/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin';
		$this->set('cur_menuh','Settings');
		$this->set('cur_url', '/admin/settings/index');		
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
			$this->Session->delete('ASetting');
		}else{
			if(isset($this->data['Setting'])){
				$this->Session->delete('ASetting');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit  
		);
		
        $this->Setting->recursive = 0;        
		$this->set('settings', $this->paginate($this->cond));
		
		$settingTypes = $this->Setting->SettingType->find('list',array('order' => array('SettingType.name ASC')));
		$this->set(compact('settingTypes'));
	}
/*
 * admin_filter method
 *
 * @return void
 */

	private function admin_filter() {
		if(isset($this->data['Setting'])){
			$input = $this->data['Setting'];
			if(isset($input['setting_type_id'])&& intval($input['setting_type_id'])>0){
				$this->Session->write('ASetting.setting_type_id',$input['setting_type_id']);
			}
		}
		
		$this->cond = array();
		if($this->Session->check('ASetting.setting_type_id')){
			$this->cond['Setting.setting_type_id'] = $this->Session->read('ASetting.setting_type_id');
		}
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		}
		$settingTypes = $this->Setting->SettingType->find('list');
		$this->set(compact('settingTypes'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->Setting->read(null, $id);
		}
		$settingTypes = $this->Setting->SettingType->find('list');
		$this->set(compact('settingTypes'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if(false){
			$this->Setting->id = $id;
			if (!$this->Setting->exists()) {
				throw new NotFoundException(__('Invalid setting'));
			}
			if ($this->Setting->delete()) {
				$this->Session->setFlash(__('Setting deleted'));
			}
			$this->Session->setFlash(__('Setting was not deleted'));
		}
		$this->autoRender = false;	
	}
	
	
	public function admin_update($id = null, $status = null){
		$this->layout = 'ajax';
		$this->Setting->id = $id;
		$this->Setting->saveField($status,$this->request->data['update_value']);
		$this->set('val', $this->request->data['update_value']);	
	}

}
?>