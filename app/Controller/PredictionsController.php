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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Prediction->recursive = 0;
		$this->set('predictions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Prediction->exists($id)) {
			throw new NotFoundException(__('Invalid prediction'));
		}
		$options = array('conditions' => array('Prediction.' . $this->Prediction->primaryKey => $id));
		$this->set('prediction', $this->Prediction->find('first', $options));
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
		$this->Prediction->virtualFields += $this->Prediction->Match->virtualFields;
		
		$users = $this->Prediction->User->find('list', array('fields' => array('User.id', 'User.username')));
		$matches = $this->Prediction->Match->find('list', array('fields' => array('Match.id', 'Match.title')));
		$this->set(compact('users','matches'));
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
