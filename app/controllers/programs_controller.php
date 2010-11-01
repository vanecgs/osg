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
		$sub = $this->Subject->read(array('subid','name','description','value','status'));
		$this->set('subject', $sub);
		
		//Schools with $subject in their programs
		$programs = $this->Program->SubjectSubs->find('threaded', array('conditions' => array('SubjectSubs.subid' => $subject)));
		$this->set('programs', $programs);
		
		$array = array();
		
		foreach($programs as $program) {
			foreach($program['Programs'] as $pid) {
				if(!in_array($pid['sid'], $array)) array_push($array, $pid['sid']);
			}
		}
		
		$this->loadModel('School');
		$schools = $this->School->find('threaded', array('conditions' => array('School.sid' => $array)));
		$this->set('schools', $schools);
		
		$this->_setSubjectMenu();
		$this->_setSubjectForm();
		
		$this->_setDegreeTypeMenu();		
		$this->_setDegreeTypeForm();		
	}
	
	function degree($degree) {
		$this->layout = 'result';
		
		//This Degree
		$this->loadModel('DegreeType');
		$this->DegreeType->id = $degree;
		$dtype = $this->DegreeType->read(array('dtid','name','description','status'));
		$this->set('degree', $dtype);
		
		//Schools with $degree in their programs
		$this->loadModel('School');
		$schools = $this->School->Programs->find('threaded', array('conditions' => array('Programs.dtid' => $degree)));
		$this->set('schools', $schools);
		
		
		$dtschools = $this->School->Programs->find('threaded', array('conditions' => array('Programs.dtid' => $degree)));
		$this->set('dtschools', $dtschools);
		
		$this->_setSubjectMenu();
		$this->_setSubjectForm();
		
		$this->_setDegreeTypeMenu();
		$this->_setDegreeTypeForm();		
	}
	
	function search() {
		$this->layout = 'result';
		if($this->data['Programs']['subjects'] > 0 && $this->data['Programs']['degrees'] <= 0) {
			$this->subject($this->data['Programs']['subjects']);
		}
		else {
			$this->set('search_degree', true);
			
			//This Subject
			$this->loadModel('Subject');
			$this->Subject->id = $this->data['Programs']['subjects'];
			$sub = $this->Subject->read(array('subid','name','description','value','status'));
			$this->set('subject', $sub);
			
			$programs = $this->Program->SubjectSubs->find('threaded', array('conditions' => array('SubjectSubs.subid' => $this->data['Programs']['subjects'])));
			
			$array = array();
			
			foreach($programs as $program) {
				if($program['Programs']) {
					foreach($program['Programs'] as $p) {
						array_push($array, $p['pid']);
					}
				}
			}
			
			
			$this->loadModel('School');
			$schoolsid = $this->Program->find('all', array('conditions' => array('Program.pid' => $array, 'Program.dtid' => $this->data['Programs']['degrees']),
																	'fields' => array('DISTINCT Program.sid', 'School.*')));
			
			
			$schools = $this->School->Programs->find('threaded', array('conditions' => array('Programs.pid' => $array, 'Programs.dtid' => $this->data['Programs']['degrees'])));
						
			$this->set('schools', $schools);
			$this->set('schoolsid', $schoolsid);
			
			$this->loadModel('DegreeType');
			$degree = $this->DegreeType->find('first', array('conditions' => array('DegreeType.dtid' => $this->data['Programs']['degrees'])));
			
			$this->set('degree', $degree);
			
			$this->_setSubjectMenu();
			$this->_setSubjectForm();
			
			$this->_setDegreeTypeMenu();
			$this->_setDegreeTypeForm();
		}
	}
	
	function degreeBySubjects($subject) {
		$this->layout = 'ajax';
		
		//Pograms under Subject equals $subject
		$programs = $this->Program->SubjectSubs->find('threaded', array('conditions' => array('SubjectSubs.subid' => $subject)));
		
		$array = array();
		foreach($programs as $p) {
			if($p['Programs']) {
				foreach($p['Programs'] as $prog) {
					if(!in_array($prog['dtid'],$array)) {
						array_push($array, $prog['dtid']);
					}
				}
			}
		}
		
		//DegreeTypes of those Program
		$degrees = array(0 => 'Select a Degree');
		$this->loadModel('DegreeType');
		$degrees = array_merge($degrees, $this->DegreeType->find('list', array('conditions' => array('dtid' => $array))));
		
		$this->set('degrees', $degrees);

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
}
?>
