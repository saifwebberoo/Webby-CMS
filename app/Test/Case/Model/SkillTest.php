<?php
/* Skill Test cases generated on: 2011-09-11 09:41:19 : 1315714279*/
App::uses('Skill', 'Model');

/**
 * Skill Test Case
 *
 */
class SkillTestCase extends CakeTestCase {
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

		$this->Skill = ClassRegistry::init('Skill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Skill);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
