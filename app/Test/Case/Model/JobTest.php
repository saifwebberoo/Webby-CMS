<?php
/* Job Test cases generated on: 2011-09-11 09:40:10 : 1315714210*/
App::uses('Job', 'Model');

/**
 * Job Test Case
 *
 */
class JobTestCase extends CakeTestCase {
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

		$this->Job = ClassRegistry::init('Job');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Job);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
