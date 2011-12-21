<?php
/* Users Test cases generated on: 2011-09-11 09:02:21 : 1315711941*/
App::uses('Users', 'Controller');

/**
 * TestUsers 
 *
 */
class TestUsers extends Users {
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
 * Users Test Case
 *
 */
class UsersTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Users = new TestUsers();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Users);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
