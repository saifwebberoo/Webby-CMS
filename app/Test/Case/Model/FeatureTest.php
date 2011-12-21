<?php
/* Feature Test cases generated on: 2011-11-15 11:42:04 : 1321337524*/
App::uses('Feature', 'Model');

/**
 * Feature Test Case
 *
 */
class FeatureTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.feature', 'app.package', 'app.packages_feature');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Feature = ClassRegistry::init('Feature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Feature);

		parent::tearDown();
	}

}
