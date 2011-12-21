<?php
class AppController extends Controller {
	
	public $helpers = array(
		'Js' => array('Jquery'),
		'Form',
		'Session',
		'Html',
		'Text',
		'Paginator',
		'TinyMce',
		'Minify',
		'Thumbnail'
	);
	
    public $components = array(
		'Security',
		'Auth',
		'RequestHandler',
		'Session',
		'Cookie',
		//,'DebugKit.Toolbar'
	);
	
	 /* Function which read settings from DB and populate them in constants */
	function fetchSettings(){
	   //memcaching need to implemented here
	   //Loading model on the fly
	   if (($global_settings = Cache::read('global_settings', 'unlimited')) === false){
			$settings = ClassRegistry::init('Setting');
			//fetching All settings
			$global_settings = $settings->find('all',array(
				'fields'=>array(
					'key',
					'pair'
				),
				'recursive' => -1
			));
			Cache::write('global_settings', $global_settings, 'unlimited');
	   }
	  
	   foreach($global_settings as $key=>$value){
		  Configure::write("__".$value['Setting']['key'], $value['Setting']['pair']);
	   }
	}

	function beforeFilter(){
		//@$this->response->compress();
	
		$this->Security->blackHoleCallback = '__securityError';

		if($this->request->isAjax()){
			$this->layout = 'ajax';
		}
		
		if(!empty($this->request->params['prefix']) && $this->request->params['prefix']=='admin' && $this->request->params['admin']==1){
			$this->layout = 'admin';
			$this->Auth->allowedActions = array('home','display');
			$this->Auth->autoRedirect = false;
			$this->Auth->loginAction = '/admin';
			$this->Auth->logoutRedirect = '/admin';
			$this->Auth->loginRedirect = '/admin-dashboard';
		}else{
			$this->Auth->allow('*');
		}
		
		if($this->name != 'Settings'){
			$this->fetchSettings();
		}
		
        parent::beforeFilter();
	}
	
	function admin_setPaging($limit){
		$this->Session->write($this->modelClass.'_Paging.limit',$limit);
		$this->set('sel_limit',$limit);
	}

	function admin_getPaging(){
		if($this->Session->check($this->modelClass.'_Paging.limit')){
			$this->set('sel_limit', $this->Session->read($this->modelClass.'_Paging.limit'));
			return $this->Session->read($this->modelClass.'_Paging.limit');
		}
		$this->set('sel_limit', 20);
		return 20;
	}
}
