<?php
/* District Test cases generated on: 2011-09-11 09:36:25 : 1315713985*/
App::uses('District', 'Model');

/**
 * District Test Case
 *
 */
class DistrictTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.district', 'app.state', 'app.country', 'app.job_seeker', 'app.employer');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->District = ClassRegistry::init('District');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->District);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
