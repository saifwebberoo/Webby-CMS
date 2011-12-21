<?php
/* Groups Test cases generated on: 2011-09-11 09:03:01 : 1315711981*/
App::uses('Groups', 'Controller');

/**
 * TestGroups 
 *
 */
class TestGroups extends Groups {
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
 * Groups Test Case
 *
 */
class GroupsTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.group', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Groups = new TestGroups();
		$this->Gr->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Groups);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
