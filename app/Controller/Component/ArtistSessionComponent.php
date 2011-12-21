<?php

/*
 *  This component is used for checking the context of the current controller, for use by
 *  admin elements such as menus and submenus. It also checks sessions whether the user is logged on.
*/

class ArtistSessionComponent extends Component {

    var $components = array('RequestHandler');
    var $controller = null;
	var $session 	= '';
	var $name 		= '';
	var $method 	= '';
	
    function initialize(&$Controller) {
        $this->controller = $Controller;
		$this->session=$this->controller->Session->check('Artist');
    }
	
	function checkSession(&$controller) {
		if(!$this->session) {
			$this->controller->Session->write('lastRD',$this->controller->here);
			$this->controller->redirect('/artist-login');
			exit();
		}
		if($this->controller->RequestHandler->isAjax())
			$this->controller->layout='ajax';	
	}

	function currentcontroller($id) {
		if ($id==$this->name) {
			return 'current';
		}
	}

	function currentmethod($id) {
		if ($id==$this->method) {
			return 'current';
		}
	}

}
?>