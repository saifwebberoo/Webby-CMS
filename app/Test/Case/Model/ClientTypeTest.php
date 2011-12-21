<?php
/* ClientType Test cases generated on: 2011-09-11 09:55:44 : 1315715144*/
App::uses('ClientType', 'Model');

/**
 * ClientType Test Case
 *
 */
class ClientTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.client_type', 'app.client');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ClientType = ClassRegistry::init('ClientType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClientType);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
