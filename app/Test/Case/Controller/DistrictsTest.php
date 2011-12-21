<?php
/* Districts Test cases generated on: 2011-09-11 09:36:33 : 1315713993*/
App::uses('Districts', 'Controller');

/**
 * TestDistricts 
 *
 */
class TestDistricts extends Districts {
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
 * Districts Test Case
 *
 */
class DistrictsTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.district', 'app.state', 'app.country', 'app.job_seeker', 'app.employer');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Districts = new TestDistricts();
		$this->District->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Districts);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
