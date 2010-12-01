<?php
class AppController extends Controller {
	function _setSubjectMenu() {
		//Set Subject list for menu
		$this->loadModel('Subject');
		$subjects = $this->Subject->find('threaded');
		$this->set('subjects', $subjects);
	}
	
	function _setDegreeTypeMenu() {
		//Set Degree Type list for menu
		$this->loadModel('DegreeType');
		$degrees = $this->DegreeType->find('threaded');
		$this->set('degrees', $degrees);
	}
	
	function _setSubjectForm() {
		//Subject Options for Search form
		$this->loadModel('Subject');
		$subject_opts = array_merge(array(0=> 'Select a Subject'), $this->Subject->find('list'));
		$this->set('subject_opts', $subject_opts);
	}
	
	function _setDegreeTypeForm() {
		//DegreeType Options for Search form
		$this->loadModel('DegreeType');
		$degree_opts = array_merge(array(0=> 'Select a Degree'),  $this->DegreeType->find('list'));
		$this->set('degree_opts', $degree_opts);
	}
	
	function _setResourceMenu() {
		//Set Resource list for menu
		$this->loadModel('Content');
		$resources = $this->Content->find('all', array('conditions' => array('ctid' => 3), 'limit' => 10));
		$this->set('resource_list', $resources);
	}
}
?>
