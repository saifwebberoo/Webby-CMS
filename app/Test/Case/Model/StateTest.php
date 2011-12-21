<?php
/* State Test cases generated on: 2011-09-11 09:42:02 : 1315714322*/
App::uses('State', 'Model');

/**
 * State Test Case
 *
 */
class StateTestCase extends CakeTestCase {
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

		$this->State = ClassRegistry::init('State');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->State);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
