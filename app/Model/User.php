<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property Prediction $Prediction
 */
class User extends AppModel {

	public $recursive = 4;

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Prediction' => array(
			'className' => 'Prediction',
			'foreignKey' => 'user_id',
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
	
	public function afterFind($results, $primary = false) {
		parent::afterFind($results, $primary);
		if ( $primary ) {
			for ($i = 0; $i < sizeOf($results); $i++) {
				$points = 0;
				$predictions = $this->Prediction->find('all', array( 'conditions' => array( 
						'Prediction.user_id' => $results[$i]['User']['id']
						)));
				foreach ($predictions as $prediction) {
					$points =+ $prediction['Prediction']['score'];
				}
				$results[$i]['User']['points'] = $points;
			}
		}
		return $results;
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	}

}
