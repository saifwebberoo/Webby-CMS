<?php
/* Form Test cases generated on: 2011-11-20 09:53:58 : 1321763038*/
App::uses('Form', 'Model');

/**
 * Form Test Case
 *
 */
class FormTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.form', 'app.form_datum');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Form = ClassRegistry::init('Form');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Form);

		parent::tearDown();
	}

}
