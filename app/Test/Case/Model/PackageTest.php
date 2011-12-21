<?php
/* Package Test cases generated on: 2011-11-15 11:40:32 : 1321337432*/
App::uses('Package', 'Model');

/**
 * Package Test Case
 *
 */
class PackageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.package', 'app.feature', 'app.packages_feature');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Package = ClassRegistry::init('Package');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Package);

		parent::tearDown();
	}

}
