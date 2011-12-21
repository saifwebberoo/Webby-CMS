<?php
/* Employers Test cases generated on: 2011-09-11 09:54:15 : 1315715055*/
App::uses('Employers', 'Controller');

/**
 * TestEmployers 
 *
 */
class TestEmployers extends Employers {
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
 * Employers Test Case
 *
 */
class EmployersTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.employer', 'app.district', 'app.state', 'app.country', 'app.job_seeker', 'app.skill', 'app.category', 'app.job_seekers_skill', 'app.job', 'app.jobs_category', 'app.jobs_skill', 'app.employers_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Employers = new TestEmployers();
		$this->Employer->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Employers);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
