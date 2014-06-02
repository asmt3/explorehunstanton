<?php
App::uses('AppController', 'Controller');
/**
 * Sponsors Controller
 *
 * @property Sponsor $Sponsor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SponsorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $uses = array('Sponsor', 'Event');

	public function rotate() {

		$this->layout = 'skin';

		$sponsor = $this->Sponsor->getSponsorOnRotation();

		$events = $this->Event->getUpcoming();

		$this->set(compact('sponsor', 'events'));
	}

	public function view($sponsor_id =  null) {

		$this->layout = 'skin';

		$sponsor = $this->Sponsor->findById($sponsor_id);

		$events = $this->Event->getUpcoming();

		$this->set(compact('sponsor', 'events'));

		$this->render('rotate');
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Sponsor->recursive = 0;
		$this->set('sponsors', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Sponsor->exists($id)) {
			throw new NotFoundException(__('Invalid sponsor'));
		}
		$options = array('conditions' => array('Sponsor.' . $this->Sponsor->primaryKey => $id));
		$this->set('sponsor', $this->Sponsor->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Sponsor->create();
			if ($this->Sponsor->save($this->request->data)) {
				$this->Session->setFlash(__('The sponsor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sponsor could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Sponsor->exists($id)) {
			throw new NotFoundException(__('Invalid sponsor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sponsor->save($this->request->data)) {
				$this->Session->setFlash(__('The sponsor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sponsor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sponsor.' . $this->Sponsor->primaryKey => $id));
			$this->request->data = $this->Sponsor->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Sponsor->id = $id;
		if (!$this->Sponsor->exists()) {
			throw new NotFoundException(__('Invalid sponsor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sponsor->delete()) {
			$this->Session->setFlash(__('The sponsor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sponsor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
