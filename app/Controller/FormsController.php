<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Forms Controller
 *
 * @property Form $Form
 */
class FormsController extends AppController {
	public function addtodb(){
	
		$form_details = explode('###',base64_decode($this->data['formname']));
		$redirect = $this->request->data['redirect'];
		$formdetails = $this->Form->read(null,$form_details[1]);
		
		if($formdetails['Form']['savetodb']==1){
			$data['FormDatum']['value'] = base64_encode(serialize($this->request->data));
			$data['FormDatum']['form_id'] = $form_details[1];
			$this->Form->FormDatum->create();
			if($this->Form->FormDatum->save($data)){
				$this->Session->write($form_details[0].'_message',$formdetails['Form']['successmsg']);
			}
		}
		
		if(strlen(trim($formdetails['Form']['email']))>5){
			$this->sendformemail($formdetails['Form']['email'],$formdetails['Form']['ccemail'],$formdetails['Form']['name']);
			$this->Session->write($form_details[0].'_message',$formdetails['Form']['successmsg']);
		}
		
		if(intval($formdetails['Form']['response_email'])==1){
			$this->sendemailresponds($formdetails['Form']['response_from'],$formdetails['Form']['response_subject'],$formdetails['Form']['response_content']);
		}
		
		$this->redirect($redirect);
		exit;
	}
	
	function sendemailresponds($from_email, $subject, $response_content){
		unset($this->request->data['formname']);
		unset($this->request->data['redirect']);
		
		$to_email = '';
		foreach($this->data as $key=>$val){
			if(strtolower($key)=='email' || strtolower($key)=='email_address'){
				$to_email = $val;
				break;
			}
		}

		if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $to_email)) {
			/* Mailing Password */
			$emailObj = new CakeEmail();
			$emailObj->reset();
			$emailObj->from(array($from_email=>'You'))
			->emailFormat('html')
			->to(trim($to_email))
			->subject($subject)
			->send($content);
			
		}
	}
	
	function sendformemail($emails='',$ccemails='',$formname=''){
		unset($this->request->data['formname']);
		unset($this->request->data['redirect']);
		
		if($emails==''){
			$emails = Configure::read('__ADMIN_EMAIL');
		}

		$arr_ccemails = explode(',',$ccemails);
		
		
		$content = '<table border="0" cellpadding="0" cellspacing="0">';
		foreach($this->request->data as $key=>$val){
			$content .= '<tr><td>'.ucfirst(str_replace('_',' ',$key)).':</td><td>'.ucfirst($val).'</td></tr>';
		}
		$content .= '</table>';
		
		/* Mailing Password */
    	$emailObj = new CakeEmail();
		$emailObj->reset();
    	$emailObj->from(array(Configure::read('__ADMIN_EMAIL') => Configure::read('__ADMIN_EMAIL_NAME')))
    	->emailFormat('html')
    	->to($emails)
		->cc($arr_ccemails)
    	->subject($formname)
    	->send($content);
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin_ckeditor';
		$this->set('include_tinymce', true);
		$this->set('cur_menuh','CMS');
		$this->set('cur_url', '/admin/forms/index');	
	}
/*
 * admin_filter method
 *
 * @return void
 */
	private function admin_filter() {
		if(isset($this->data['Form'])){
			$input = $this->data['Form'];
			if(isset($input['name']) && strlen(trim($input['name']))>0){
				$this->Session->write('AForm.name',$input['name']);
			}

			if(isset($input['modified']) && strlen(trim($input['modified']))>0){
				$this->Session->write('AForm.modified',$input['modified']);
			}
		}
		
		$this->cond = array();
		if($this->Session->check('AForm.name')){
			$this->cond['Form.name LIKE'] = $this->Session->read('AForm.name').'%';
		}
		if($this->Session->check('AForm.modified')){
			$this->cond[] = "Form.modified BETWEEN '".$this->Session->read('AForm.modified')." 00:00:00' AND '".$this->Session->read('AForm.modified')." 23:59:59'";
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
			$this->Session->delete('AForm');
		}else{
			if(isset($this->data['Form'])){
				$this->Session->delete('AForm');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit 
		);
		
        $this->Form->recursive = 0;        
		$this->set('forms', $this->paginate($this->cond));
	}	
	
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Form->id = $id;
		if (!$this->Form->exists()) {
			throw new NotFoundException(__('Invalid form'));
		}
		$this->set('form', $this->Form->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Form->create();
			if ($this->Form->save($this->request->data)) {
				$this->Session->setFlash(__('The form has been saved'));
				$this->set('saved',true);
			} else {
				$this->set('saved',false);
				$this->Session->setFlash(__('The form could not be saved. Please, try again.'));
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
		$this->Form->id = $id;
		if (!$this->Form->exists()) {
			throw new NotFoundException(__('Invalid form'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Form->save($this->request->data)) {
				$this->Session->setFlash(__('The form has been saved'));
				$this->set('saved',true);
			} else {
				$this->set('saved',false);
				$this->Session->setFlash(__('The form could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Form->read(null, $id);
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
		$this->Form->id = $id;
		if (!$this->Form->exists()) {
			throw new NotFoundException(__('Invalid form'));
		}
		if ($this->Form->delete()) {
			$this->Session->setFlash(__('Form deleted'));
		}
		$this->Session->setFlash(__('Form was not deleted'));
		$this->autoRender = false;
	}
}
