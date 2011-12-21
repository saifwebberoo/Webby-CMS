<?php
/* JobSeeker Test cases generated on: 2011-09-11 09:55:00 : 1315715100*/
App::uses('JobSeeker', 'Model');

/**
 * JobSeeker Test Case
 *
 */
class JobSeekerTestCase extends CakeTestCase {
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

		$this->JobSeeker = ClassRegistry::init('JobSeeker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JobSeeker);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
