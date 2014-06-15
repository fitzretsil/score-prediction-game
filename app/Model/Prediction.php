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
// 			'points' => 'IF(
// 				CONCAT(team1_score, " - ", team2_score) = CONCAT(Match.team1_result, " - ", Match.team2_result), 
// 				3, 
// 				IF(
// 					IF(
// 						team1_score > team2_score, 
// 						"team1", 
// 						IF(
// 							team1_score < team2_score, 
// 							"team2", 
// 							"draw"
// 						)
// 					) = IF(
// 						Match.team1_result > Match.team2_result, 
// 						"team1", 
// 						IF(
// 							Match.team1_result < Match.team2_result, 
// 							"team2", 
// 							"draw"
// 						)
// 					), 
// 					1, 
// 					0
// 				)
// 			)'
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
	
	public function afterFind($results, $primary = false) {
		parent::afterFind($results, $primary);
		if ( $primary ) {
			for ($i = 0; $i < sizeOf($results); $i++) {
				if ( $results[$i]['Prediction']['score'] == $results[$i]['Match']['result'] ) {
					$results[$i]['Prediction']['points'] = 3;
				} elseif( $results[$i]['Prediction']['winner'] == $results[$i]['Match']['winner']) {
					$results[$i]['Prediction']['points'] = 1;
				} else {
					$results[$i]['Prediction']['points'] = 0;
				}
			}
		}
		return $results;
	}
}
