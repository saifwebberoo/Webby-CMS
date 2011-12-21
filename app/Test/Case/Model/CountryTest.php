<?php
/* Country Test cases generated on: 2011-09-11 09:34:38 : 1315713878*/
App::uses('Country', 'Model');

/**
 * Country Test Case
 *
 */
class CountryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.country', 'app.job_seeker', 'app.state');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Country = ClassRegistry::init('Country');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Country);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
