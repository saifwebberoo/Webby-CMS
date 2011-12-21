<?php
/* EmailLogs Test cases generated on: 2011-11-20 09:57:04 : 1321763224*/
App::uses('EmailLogsController', 'Controller');

/**
 * TestEmailLogsController *
 */
class TestEmailLogsController extends EmailLogsController {
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
 * EmailLogsController Test Case
 *
 */
class EmailLogsControllerTestCase extends CakeTestCase {
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

		$this->EmailLogs = new TestEmailLogsController();
		$this->EmailLogs->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmailLogs);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {

	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {

	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {

	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {

	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {

	}

}
