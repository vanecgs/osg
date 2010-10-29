<?php
class ContentsController extends AppController {
	var $name = 'Contents';
	var $helpers = array('Javascript');
	var $scaffold = 'admin';

	function index() {
		//Subject Menu
		$this->loadModel('Subject');
		$subjects = $this->Subject->find('threaded');
		$this->set('subjects', $subjects);
		
		//Subject Options for Search form
		$subject_opts = array_merge(array(0=> 'Select a Subject'), $this->Subject->find('list'));
		$this->set('subject_opts', $subject_opts);
		
		//DegreeType Menu
		$this->loadModel('DegreeType');
		$degrees = $this->DegreeType->find('threaded');
		$this->set('degrees', $degrees);
		
		//DegreeType Options for Search form
		$degree_opts = array_merge(array(0=> 'Select a Degree'),  $this->DegreeType->find('list'));
		$this->set('degree_opts', $degree_opts);
		
		//Set layout
		$this->layout = 'defaultpage';
	}
}
?>
