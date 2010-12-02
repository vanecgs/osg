<?php
class SubjectSubsController extends AppController {

	var $name = 'SubjectSubs';
	var $components = array('Auth');
	
	function beforeFilter() {
		$this->Auth->allow('search');	
    }

	function search($id) {
		$this->set('subsubjects', $this->SubjectSub->find('list', array(
								'fields' => array('SubjectSub.ssid', 'SubjectSub.name'),
								'conditions' => array('SubjectSub.subid' => $id)
								))
		);
		$this->layout = 'ajax';
	}

	function admin_index() {
		if($this->Auth->user('group_id') == 1) {
			$this->SubjectSub->recursive = 0;
			$this->set('subjectSubs', $this->paginate());
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_view($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid subject sub', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('subjectSub', $this->SubjectSub->read(null, $id));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_add() {
		if($this->Auth->user('group_id') == 1) {
			if (!empty($this->data)) {
				$this->SubjectSub->create();
				if ($this->SubjectSub->save($this->data)) {
					$this->Session->setFlash(__('The subject sub has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The subject sub could not be saved. Please, try again.', true));
				}
			}
			$subjects = $this->SubjectSub->Subject->find('list');
			$programs = $this->SubjectSub->Programs->find('list');
			$this->set(compact('subjects', 'programs'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_edit($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid subject sub', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->SubjectSub->save($this->data)) {
					$this->Session->setFlash(__('The subject sub has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The subject sub could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->SubjectSub->read(null, $id);
			}
			$subjects = $this->SubjectSub->Subject->find('list');
			$programs = $this->SubjectSub->Programs->find('list');
			$this->set(compact('subjects', 'programs'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_delete($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for subject sub', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->SubjectSub->delete($id)) {
				$this->Session->setFlash(__('Subject sub deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Subject sub was not deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}
}
?>