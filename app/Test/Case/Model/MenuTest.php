<?php
/* Menu Test cases generated on: 2011-11-19 10:53:13 : 1321680193*/
App::uses('Menu', 'Model');

/**
 * Menu Test Case
 *
 */
class MenuTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.menu', 'app.page', 'app.tmenu', 'app.widget', 'app.pages_widget');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Menu = ClassRegistry::init('Menu');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Menu);

		parent::tearDown();
	}

}
