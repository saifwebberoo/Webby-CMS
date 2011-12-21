<?php
/* Skills Test cases generated on: 2011-09-11 09:41:29 : 1315714289*/
App::uses('Skills', 'Controller');

/**
 * TestSkills 
 *
 */
class TestSkills extends Skills {
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
 * Skills Test Case
 *
 */
class SkillsTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.skill', 'app.category', 'app.job_seeker', 'app.district', 'app.state', 'app.country', 'app.employer', 'app.job', 'app.jobs_category', 'app.jobs_skill', 'app.employers_category', 'app.job_seekers_skill');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Skills = new TestSkills();
		$this->Sk->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Skills);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
