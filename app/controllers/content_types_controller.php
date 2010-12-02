<?php
class ContentTypesController extends AppController {

	var $name = 'ContentTypes';

	function admin_index() {
		$this->ContentType->recursive = 0;
		$this->set('contentTypes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid content type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contentType', $this->ContentType->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ContentType->create();
			if ($this->ContentType->save($this->data)) {
				$this->Session->setFlash(__('The content type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content type could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid content type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ContentType->save($this->data)) {
				$this->Session->setFlash(__('The content type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ContentType->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for content type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ContentType->delete($id)) {
			$this->Session->setFlash(__('Content type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Content type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>