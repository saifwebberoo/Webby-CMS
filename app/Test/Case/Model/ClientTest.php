<?php
/* Client Test cases generated on: 2011-09-11 09:56:56 : 1315715216*/
App::uses('Client', 'Model');

/**
 * Client Test Case
 *
 */
class ClientTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.client', 'app.client_type', 'app.employer', 'app.district', 'app.state', 'app.country', 'app.job_seeker', 'app.skill', 'app.category', 'app.job_seekers_skill', 'app.job', 'app.jobs_category', 'app.jobs_skill', 'app.employers_category');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Client = ClassRegistry::init('Client');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Client);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
