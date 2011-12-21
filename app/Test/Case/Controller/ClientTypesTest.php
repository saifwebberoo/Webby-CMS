<?php
/* ClientTypes Test cases generated on: 2011-09-11 09:55:59 : 1315715159*/
App::uses('ClientTypes', 'Controller');

/**
 * TestClientTypes 
 *
 */
class TestClientTypes extends ClientTypes {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * ClientTypes Test Case
 *
 */
class ClientTypesTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.client_type', 'app.client');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ClientTypes = new TestClientTypes();
		$this->C->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClientTypes);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
