<?php
class SubjectsController extends AppController {

	var $name = 'Subjects';
	var $components = array('Auth');
	
	function beforeFilter() {
		$this->Auth->allow('programs');
    }

	function programs($subject) {
		$this->set('programs', $this->Subject->find('list', array(
								'conditions' => array('Subject.subid' => $subject))));
	}

	function admin_index() {
		if($this->Auth->user('group_id') == 1) {
			$this->Subject->recursive = 0;
			$this->set('subjects', $this->paginate());
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_view($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid subject', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('subject', $this->Subject->read(null, $id));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_add() {
		if($this->Auth->user('group_id') == 1) {
			if (!empty($this->data)) {
				$this->Subject->create();
				if ($this->Subject->save($this->data)) {
					$this->Session->setFlash(__('The subject has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
				}
			}
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_edit($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid subject', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Subject->save($this->data)) {
					$this->Session->setFlash(__('The subject has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Subject->read(null, $id);
			}
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_delete($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for subject', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Subject->delete($id)) {
				$this->Session->setFlash(__('Subject deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Subject was not deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}
}
?>