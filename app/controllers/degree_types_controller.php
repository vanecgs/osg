<?php
class DegreeTypesController extends AppController {

	var $name = 'DegreeTypes';
	var $helpers = array('Javascript');
	var $components = array('Auth');
	
	function beforeFilter() {
		$this->Auth->allow('index');	
    }
	
	function index() {
		$this->layout = 'result';
		
		$alphabet = array(array('letter' => 'A'),array('letter' => 'B'),array('letter' => 'C'),array('letter' => 'D'),array('letter' => 'E'),array('letter' => 'F'),array('letter' => 'G'),array('letter' => 'H'),array('letter' => 'I'),array('letter' => 'J'),array('letter' => 'K'),array('letter' => 'L'),array('letter' => 'M'),array('letter' => 'N'),array('letter' => 'O'),array('letter' => 'P'),array('letter' => 'Q'),array('letter' => 'R'),array('letter' => 'S'),array('letter' => 'T'),array('letter' => 'U'),array('letter' => 'V'),array('letter' => 'W'),array('letter' => 'X'),array('letter' => 'Y'),array('letter' => 'Z'));
		
		$degrees = $this->DegreeType->find('all');
		$this->set('degrees',$degrees);
		
		$this->loadModel('Subject');
		$subjects = $this->Subject->find('all', array('group' => array('Subject.subid')));
		$this->set('subjects', $subjects);
		
		//Set Menus
		$this->_setSubjectMenu();
		$this->_setSubjectForm();		
		$this->_setDegreeTypeMenu();
		$this->_setDegreeTypeForm();
		$this->_setResourceMenu();
	}
	
	function admin_index() {
		if($this->Auth->user('group_id') == 1) {
			$this->DegreeType->recursive = 0;
			$this->set('degreeTypes', $this->paginate());
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_view($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid degree type', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('degreeType', $this->DegreeType->read(null, $id));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_add() {
		if($this->Auth->user('group_id') == 1) {
			if (!empty($this->data)) {
				$this->DegreeType->create();
				if ($this->DegreeType->save($this->data)) {
					$this->Session->setFlash(__('The degree type has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The degree type could not be saved. Please, try again.', true));
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
				$this->Session->setFlash(__('Invalid degree type', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->DegreeType->save($this->data)) {
					$this->Session->setFlash(__('The degree type has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The degree type could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->DegreeType->read(null, $id);
			}
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_delete($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for degree type', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->DegreeType->delete($id)) {
				$this->Session->setFlash(__('Degree type deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Degree type was not deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}
}
?>