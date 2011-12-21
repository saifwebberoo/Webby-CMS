<?php
/* Page Test cases generated on: 2011-11-19 10:52:42 : 1321680162*/
App::uses('Page', 'Model');

/**
 * Page Test Case
 *
 */
class PageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.page', 'app.menu', 'app.tmenu', 'app.widget', 'app.pages_widget');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Page = ClassRegistry::init('Page');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Page);

		parent::tearDown();
	}

}
