<?php
class ProgramsController extends AppController {
	var $name = 'Programs';
	var $scaffold = 'admin';
	var $helpers = array('Javascript');
	
	function subject($subject) {
		$this->layout = 'result';
		
		//This Subject
		$this->loadModel('Subject');
		$this->Subject->id = $subject;
		$sub = $this->Subject->read();
		$this->set('subject', $sub);
		
		//Schools with $subject in their programs
		$this->loadModel('Program');
		$programs = $this->Program->SubjectSubs->find('threaded', array('conditions' => array('SubjectSubs.subid' => $subject)));
		$this->set('programs', $programs);
		
		$array = array();
		
		foreach($programs as $program) {
			foreach($program['Programs'] as $pid) {
				array_push($array, $pid['sid']);
			}
		}
		
		$this->loadModel('School');
		$schools = $this->School->Programs->find('threaded', array('conditions' => array('School.sid' => $array)));
		$this->set('schools', $schools);
		
		$this->_setSubjectMenu();
		
		//Subject Options for Search form
		$subject_opts = array_merge(array(0=> 'Select a Subject'), $this->Subject->find('list'));
		$this->set('subject_opts', $subject_opts);
		
		$this->_setDegreeTypeMenu();		
		
		//DegreeType Options for Search form
		$degree_opts = array_merge(array(0=> 'Select a Degree'),  $this->DegreeType->find('list'));
		$this->set('degree_opts', $degree_opts);
	}
	
	function degree($degree) {
		$this->layout = 'result';
		
		//This Degree
		$this->loadModel('DegreeType');
		$this->DegreeType->id = $degree;
		$dtype = $this->DegreeType->read();
		$this->set('degree', $dtype);
		
		//Schools with $degree in their programs
		$this->loadModel('School');
		$schools = $this->School->Programs->find('threaded', array('conditions' => array('Programs.dtid' => $degree)));
		$this->set('schools', $schools);
		
		
		$dtschools = $this->School->Programs->find('threaded', array('conditions' => array('Programs.dtid' => $degree)));
		$this->set('dtschools', $dtschools);
		
		$this->_setSubjectMenu();
		
		//Subject Options for Search form
		$subject_opts = array_merge(array(0=> 'Select a Subject'), $this->Subject->find('list'));
		$this->set('subject_opts', $subject_opts);
		
		$this->_setDegreeTypeMenu();
		
		//DegreeType Options for Search form
		$degree_opts = array_merge(array(0=> 'Select a Degree'),  $this->DegreeType->find('list'));
		$this->set('degree_opts', $degree_opts);
	}
	
	function search() {
		if($this->data['Programs']['subjects'] > 0 && $this->data['Programs']['degrees'] <= 0) {
			$this->subject($this->data['Programs']['subjects']);
		}
		else {
			echo 'Falta';
		}
	}
	
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
}
?>
