<?php
/* Countries Test cases generated on: 2011-09-11 09:34:48 : 1315713888*/
App::uses('Countries', 'Controller');

/**
 * TestCountries 
 *
 */
class TestCountries extends Countries {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * Countries Test Case
 *
 */
class CountriesTestCase extends CakeTestCase {
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

		$this->Countries = new TestCountries();
		$this->Countrie->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Countries);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
