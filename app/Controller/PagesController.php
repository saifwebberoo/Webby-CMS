<?php
App::uses('AppController', 'Controller');
/**
 * Pages Controller
 *
 * @property Page $Page
 */
class PagesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin_tinymce';
		$this->set('cur_menuh','CMS');
		$this->set('cur_url', '/admin/pages/index');		
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
			$this->Session->delete('APage');
		}else{
			if(isset($this->data['Page'])){
				$this->Session->delete('APage');
			}
			$this->admin_filter();
		}
     
		$this->paginate = array(
			'limit' => $limit  
		);
		
        $this->Page->recursive = 0;        
		$this->set('pages', $this->paginate($this->cond));
		
		$menus = $this->Page->Menu->find('list');
		$this->set(compact('menus'));
	}
/*
 * admin_filter method
 *
 * @return void
 */

	private function admin_filter() {
		if(isset($this->data['Page'])){
			$input = $this->data['Page'];
			if(isset($input['menu_id']) && intval($input['menu_id'])>0){
				$this->Session->write('APage.menu_id',$input['menu_id']);
			}
			if(isset($input['title']) && strlen(trim($input['title']))>0){
				$this->Session->write('APage.title',$input['title']);
			}			
			if(isset($input['page_id']) && intval($input['page_id'])>0){
				$this->Session->write('APage.page_id',$input['page_id']);
			}
			if(isset($input['link_type']) && intval($input['link_type'])>0){
				$this->Session->write('APage.link_type',$input['link_type']);
			}
			if(isset($input['islink']) && intval($input['islink'])>0){
				$this->Session->write('APage.islink',$input['islink']);
			}
			if(isset($input['published']) && intval($input['published'])>0){
				$this->Session->write('APage.published',$input['published']);
			}
			if(isset($input['modified']) && intval($input['modified'])>0){
				$this->Session->write('APage.modified',$input['modified']);
			}
			if(isset($input['porder']) && intval($input['porder'])>0){
				$this->Session->write('APage.porder',$input['porder']);
			}
		}
		
		$this->cond = array();
		if($this->Session->check('APage.menu_id')){
			$this->cond['Page.menu_id'] = $this->Session->read('APage.menu_id');
		}
		if($this->Session->check('APage.title')){
			$this->cond['Page.title LIKE'] = '%'.$this->Session->read('APage.title').'%';
		}
		if($this->Session->check('APage.page_id')){
			$this->cond['Page.page_id'] = $this->Session->read('APage.page_id');
		}
		if($this->Session->check('APage.link_type')){
			$this->cond['Page.link_type'] = $this->Session->read('APage.link_type');
		}
		if($this->Session->check('APage.islink')){
			$this->cond['Page.islink'] = $this->Session->read('APage.islink');
		}
		if($this->Session->check('APage.published')){
			$this->cond['Page.published'] = $this->Session->read('APage.published');
		}
		if($this->Session->check('APage.modified')){
			$this->cond[] = "Page.modified BETWEEN '".$this->Session->read('APage.modified')." 00:00:00' AND '".$this->Session->read('APage.modified')." 23:59:59'";
		}
		if($this->Session->check('APage.porder')){
			$this->cond['Page.porder'] = $this->Session->read('APage.porder');
		}
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->set('page', $this->Page->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		}
		$menus = $this->Page->Menu->find('list');
		$parentPages = $this->Page->ParentPage->find('list',array('fields'=>array('id', 'title')));
		$widgets = $this->Page->Widget->find('list');
		$this->set(compact('menus', 'parentPages', 'widgets'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved'));
				$this->set('saved',true);
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
				$this->set('saved',false);
			}
		} else {
			$this->request->data = $this->Page->read(null, $id);
		}
		$menus = $this->Page->Menu->find('list');
		$parentPages = $this->Page->ParentPage->find('list',array('fields'=>array('id', 'title')));
		$widgets = $this->Page->Widget->find('list');
		$this->set(compact('menus', 'parentPages', 'widgets'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if((int)$id>99){
			$this->Page->id = $id;
			if (!$this->Page->exists()) {
				throw new NotFoundException(__('Invalid page'));
			}
			if ($this->Page->delete()) {
				$this->Session->setFlash(__('Page deleted'));
			}
			$this->Session->setFlash(__('Page was not deleted'));
			$this->autoRender = false;
		}
	}
	
	public function display($url = null,$layout = 'default'){

		if(isset($this->request->params['page_name']))
		    $url = $this->request->params['page_name'];
		
		/* Get Page Content */
		if (($page = Cache::read($url.'_html', 'unlimited')) === false){
			$page = $this->Page->find('first',array(
				'conditions'=>array(
					'Page.pageurl LIKE' =>$url.'.html'
				),
				'contain'=>array(
					'Widget'=>array(
						'order'=>array(
							'worder ASC'
						)
					)
				)
			));
			
			foreach($page['Widget'] as $key => $widget){
				if((int)$widget['published']==0){
					unset($page['Widget'][$key]);
				}
			}
			
			Cache::write($url.'_html', $page, 'unlimited');
		}

		/* Page Not Found */
		if(!isset($page['Page']['title'])){
			$page['Page']['title'] = 'Page Not Found';
			$page['Page']['pageurl'] = 'page-not_found';
			$page['Page']['content'] = '<div id="slider"><div id="col2">&nbsp;<h2 style="color:red;margin-top:143px;
text-align:center;">Page Not Found</h2></div></div>';
		}			
				
		/* Setting Page Title */		
		$this->set('title_for_layout', $page['Page']['title']);		

		/* Layout Selection */		
		$this->layout = 'default';

		if($layout!='default'){
			$this->layout = $layout;
		}

		$this->set('page',$page);
	}
	
	public function admin_update($id = null, $status = null){
		if($id && $status){
			$this->layout = 'ajax';
			$this->Page->id = $id;
			$this->Page->saveField($status,$this->request->data['update_value']);
			if($status=='published'){
				$this->set('val', ($this->request->data['update_value']==1?'Yes':'No'));	
			}else{
				$this->set('val', $this->request->data['update_value']);	
			}
		}else{
			$this->set('val', 0);	
		}
	}
	
}
?>