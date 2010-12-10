<?php
class ContentsController extends AppController {

	var $name = 'Contents';
	var $helpers = array('Javascript');
	var $components = array('Auth');
	
	function beforeFilter() {
		$this->Auth->allow('index','resources');	
    }

	function index() {
		//Home content
		$content = $this->Content->find('first', array('conditions' => array('ctid' => 1)));
		$this->set('content', $content);
		
		//Subject Menu
		$this->_setSubjectMenu();
		
		//Subject Options for Search form
		$this->_setSubjectForm();
		
		//DegreeType Menu
		$this->_setDegreeTypeMenu();
		
		//DegreeType Options for Search form
		$this->_setDegreeTypeForm();
		
		//Resource Menu
		$this->_setResourceMenu();
		
		//Random Schools
		$this->loadModel('School');
		$c = $this->School->find('count');
		$c1 = rand(1, $c);
		$c2 = rand(1, $c);
		$c3 = rand(1, $c);
		
		$set1 = $this->School->find('first',array('conditions' => array('School.sid' => $c1)));
		$set2 = $this->School->find('first',array('conditions' => array('School.sid' => $c2)));
		$set3 = $this->School->find('first',array('conditions' => array('School.sid' => $c3)));
		
		$set = array();
		
		array_push($set, $set1, $set2, $set3);
		
		$this->set('set', $set);
		
		//Set layout
		$this->layout = 'defaultpage';
	}
	
	function resources($id = null) {
		if(!$id) {
			//Resource content
			$resource = $this->Content->find('first', array('conditions' => array('ctid' => 2)));
			$this->set('resource', $resource);
			
			//Resources list
			$resources = $this->Content->find('all', array('conditions' => array('ctid' => 3)));
			$this->set('resources', $resources);
			
			
		}
		else {
			//Resource content
			$this->id = $id;
			
			$this->set('resource', $this->Content->read());
		}
		
		$this->set('id', $id);
		
		//Subject Menu
		$this->_setSubjectMenu();
		
		//Subject Options for Search form
		$this->_setSubjectForm();
		
		//DegreeType Menu
		$this->_setDegreeTypeMenu();
		
		//DegreeType Options for Search form
		$this->_setDegreeTypeForm();
		
		//Resource Menu
		$this->_setResourceMenu();
		
		//Set layout
		$this->layout = 'defaultpage';
	}

	function admin_index() {
		if($this->Auth->user('group_id') == 1) {
			$this->Content->recursive = 0;
			$this->set('contents', $this->paginate());
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_view($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid content', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('content', $this->Content->read(null, $id));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_add() {
		if($this->Auth->user('group_id') == 1) {
			if (!empty($this->data)) {
				$this->Content->create();
				if ($this->Content->save($this->data)) {
					$this->Session->setFlash(__('The content has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The content could not be saved. Please, try again.', true));
				}
			}
			$contentTypes = $this->Content->ContentType->find('list');
			$this->set(compact('contentTypes'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_edit($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid content', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Content->save($this->data)) {
					$this->Session->setFlash(__('The content has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The content could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Content->read(null, $id);
			}
			$contentTypes = $this->Content->ContentType->find('list');
			$this->set(compact('contentTypes'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_delete($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for content', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Content->delete($id)) {
				$this->Session->setFlash(__('Content deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Content was not deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}
}
?>