<?php
App::uses('Match', 'Model');

/**
 * Match Test Case
 *
 */
class MatchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.match',
		'app.prediction',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Match = ClassRegistry::init('Match');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Match);

		parent::tearDown();
	}

}
