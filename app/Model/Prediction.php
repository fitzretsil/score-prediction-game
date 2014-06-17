<?php
App::uses('AppModel', 'Model');
/**
 * Prediction Model
 *
 * @property User $User
 * @property Match $Match
 */
class Prediction extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'match_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public $virtualFields = array(
			'winner' => 'IF(team1_score > team2_score, "team1", IF(team1_score < team2_score, "team2", "draw"))',
			'score' => 'CONCAT(team1_score, " - ", team2_score)',
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function updatePoints( $match_id = null ) {
		if ( $match_id == null ) {
			return;
		}
		
		$predictions = $this->find( 'all', array( 'conditions' => array( 'Match.id' => $match_id ) ) );
				
		foreach ( $predictions as $prediction ) {
			if ( $prediction['Prediction']['score'] == $prediction['Match']['result'] ) {
				$prediction['Prediction']['points'] = 3;
			} elseif ( $prediction['Prediction']['winner'] == $prediction['Match']['winner'] ) {
				$prediction['Prediction']['points'] = 1;
			} else {
				$prediction['Prediction']['points'] = 0;
			}
			
			$this->id = $prediction['Prediction']['id'];
			$this->save( $prediction );
		}
	}
}
