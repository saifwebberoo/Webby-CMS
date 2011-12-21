<?php
/* FormDatum Test cases generated on: 2011-11-20 09:54:50 : 1321763090*/
App::uses('FormDatum', 'Model');

/**
 * FormDatum Test Case
 *
 */
class FormDatumTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.form_datum', 'app.form');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->FormDatum = ClassRegistry::init('FormDatum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FormDatum);

		parent::tearDown();
	}

}
