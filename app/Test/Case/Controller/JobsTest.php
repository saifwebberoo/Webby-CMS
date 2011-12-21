<?php
/* Jobs Test cases generated on: 2011-09-11 09:40:20 : 1315714220*/
App::uses('Jobs', 'Controller');

/**
 * TestJobs 
 *
 */
class TestJobs extends Jobs {
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
 * Jobs Test Case
 *
 */
class JobsTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.job', 'app.employer', 'app.district', 'app.state', 'app.country', 'app.job_seeker', 'app.skill', 'app.job_seekers_skill', 'app.category', 'app.employers_category', 'app.jobs_category', 'app.jobs_skill');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Jobs = new TestJobs();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Jobs);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
