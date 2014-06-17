<?php
App::uses('AppModel', 'Model');
/**
 * Match Model
 *
 * @property Prediction $Prediction
 */
class Match extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'team1' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'team2' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'team1_result' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'team2_result' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public $virtualFields = array(
			'title' => 'CONCAT(Match.team1, " v ", Match.team2)',
			'winner' => 'IF(team1_result > team2_result, "team1", IF(team1_result < team2_result, "team2", "draw"))',
			'result' => 'CONCAT(team1_result, " - ", team2_result)'
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Prediction' => array(
			'className' => 'Prediction',
			'foreignKey' => 'match_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function afterSave( $created, $options = array() ) {
		if ( $this->data['Match']['team1_result'] >= 0 && $this->data['Match']['team2_result'] >= 0 ) {
			$this->Prediction->updatePoints( $this->data['Match']['id'] );
		}
	}

}
