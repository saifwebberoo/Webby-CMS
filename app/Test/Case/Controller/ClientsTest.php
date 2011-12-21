<?php
/* Clients Test cases generated on: 2011-09-11 09:57:07 : 1315715227*/
App::uses('Clients', 'Controller');

/**
 * TestClients 
 *
 */
class TestClients extends Clients {
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
 * Clients Test Case
 *
 */
class ClientsTestCase extends CakeTestCase {
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

		$this->Clients = new TestClients();
		$this->Clie->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clients);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
