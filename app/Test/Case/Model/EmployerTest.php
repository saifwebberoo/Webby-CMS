<?php
/* Employer Test cases generated on: 2011-09-11 09:53:51 : 1315715031*/
App::uses('Employer', 'Model');

/**
 * Employer Test Case
 *
 */
class EmployerTestCase extends CakeTestCase {
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

		$this->Employer = ClassRegistry::init('Employer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Employer);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
