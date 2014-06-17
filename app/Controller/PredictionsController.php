<?php
App::uses('AppController', 'Controller');
/**
 * Predictions Controller
 *
 * @property Prediction $Prediction
 * @property PaginatorComponent $Paginator
 */
class PredictionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		} elseif ( $this->action == 'index' ) {
			return true;
		} elseif ( $this->action == 'edit' ) {
			return true;
		} elseif ( $this->action == 'add' ) {
			return true;
		} elseif ( $this->action == 'delete' ) {
			return true;
		}
	
		// Default deny
		return false;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$id = $this->Session->read('Auth.User.id');
		$this->Prediction->recursive = 0;
		$this->set('predictions', $this->Paginator->paginate( array( 'User.id' => $id ) ) );
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Prediction->create();
			if ($this->Prediction->save($this->request->data)) {
				$this->Session->setFlash(__('The prediction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prediction could not be saved. Please, try again.'));
			}
		}
		
		$user = $this->Session->read('Auth.User.id');
		$matches_predicted = $this->Prediction->find( 'list', array( 
				'fields' => array( 'Prediction.match_id' ), 
				'conditions' => array( 'Prediction.user_id' => $user ) 
		) );
		$matches = $this->Prediction->Match->find('list', array( 
				'fields' => array('Match.id', 'Match.title'),
				'conditions' => array( 'Match.team1_result' => '', 'NOT' => array( 'Match.id' => $matches_predicted ) ) )
				);
		if ( sizeOf( $matches ) == 0 ) {
			$this->Session->setFlash(__('All matches have been predicted already'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->set(compact('user','matches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Prediction->exists($id)) {
			throw new NotFoundException(__('Invalid prediction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Prediction->save($this->request->data)) {
				$this->Session->setFlash(__('The prediction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prediction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Prediction.' . $this->Prediction->primaryKey => $id));
			$this->request->data = $this->Prediction->find('first', $options);
		}
		$users = $this->Prediction->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Prediction->id = $id;
		if (!$this->Prediction->exists()) {
			throw new NotFoundException(__('Invalid prediction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Prediction->delete()) {
			$this->Session->setFlash(__('The prediction has been deleted.'));
		} else {
			$this->Session->setFlash(__('The prediction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
