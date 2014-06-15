<?php
App::uses('Prediction', 'Model');

/**
 * Prediction Test Case
 *
 */
class PredictionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Prediction = ClassRegistry::init('Prediction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prediction);

		parent::tearDown();
	}

}
