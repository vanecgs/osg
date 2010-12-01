<?php
class ContentsController extends AppController {
	var $name = 'Contents';
	var $helpers = array('Javascript');
	var $scaffold = 'admin';

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
}
?>
