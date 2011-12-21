<?php
/* States Test cases generated on: 2011-09-11 09:42:15 : 1315714335*/
App::uses('States', 'Controller');

/**
 * TestStates 
 *
 */
class TestStates extends States {
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
 * States Test Case
 *
 */
class StatesTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.state', 'app.country', 'app.job_seeker', 'app.district', 'app.employer', 'app.job', 'app.category', 'app.jobs_category', 'app.skill', 'app.job_seekers_skill', 'app.jobs_skill', 'app.employers_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->States = new TestStates();
		$this->St->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->States);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
