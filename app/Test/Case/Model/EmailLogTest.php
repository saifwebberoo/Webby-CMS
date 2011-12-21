<?php
/* EmailLog Test cases generated on: 2011-11-20 09:55:49 : 1321763149*/
App::uses('EmailLog', 'Model');

/**
 * EmailLog Test Case
 *
 */
class EmailLogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.email_log', 'app.member', 'app.height', 'app.complexion', 'app.physical_status', 'app.blood_group', 'app.language', 'app.martial_status', 'app.children_living_status', 'app.religion', 'app.caste', 'app.eating_habit', 'app.drinking_habit', 'app.smoking_habit', 'app.education', 'app.occupation', 'app.income', 'app.agent', 'app.location', 'app.country', 'app.employer', 'app.district', 'app.state', 'app.job_seeker', 'app.client', 'app.client_type', 'app.skill', 'app.category', 'app.employers_category', 'app.job', 'app.jobs_category', 'app.jobs_skill', 'app.job_seekers_skill', 'app.members_image');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->EmailLog = ClassRegistry::init('EmailLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmailLog);

		parent::tearDown();
	}

}
