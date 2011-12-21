<?php
/* Widget Test cases generated on: 2011-11-19 10:50:59 : 1321680059*/
App::uses('Widget', 'Model');

/**
 * Widget Test Case
 *
 */
class WidgetTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.widget', 'app.page', 'app.pages_widget');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Widget = ClassRegistry::init('Widget');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Widget);

		parent::tearDown();
	}

}
