<?php
/* JobSeekers Test cases generated on: 2011-09-11 09:55:14 : 1315715114*/
App::uses('JobSeekers', 'Controller');

/**
 * TestJobSeekers 
 *
 */
class TestJobSeekers extends JobSeekers {
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
 * JobSeekers Test Case
 *
 */
class JobSeekersTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.job_seeker', 'app.district', 'app.state', 'app.country', 'app.employer', 'app.job', 'app.category', 'app.jobs_category', 'app.skill', 'app.job_seekers_skill', 'app.jobs_skill', 'app.employers_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->JobSeekers = new TestJobSeekers();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JobSeekers);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
