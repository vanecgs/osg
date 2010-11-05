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
		
		//Set Menus
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
		$schools = $this->School->Programs->find('all', array('conditions' => array('Programs.dtid' => $degree), 'fields' => array('DISTINCT Programs.sid','School.*')));
		$this->set('schools', $schools);
		
		$dtschools = $this->School->Programs->find('threaded', array('conditions' => array('Programs.dtid' => $degree)));
		$this->set('dtschools', $dtschools);
		
		//Set Menus
		$this->_setSubjectMenu();
		$this->_setSubjectForm();		
		$this->_setDegreeTypeMenu();
		$this->_setDegreeTypeForm();		
	}
	
	function subjectsub($subjectsub) {
		$this->layout = 'result';
		
		$this->loadModel('School');
		//Schools in $subjectsub
		$options['joins'] = array(
			array('table' => 'programs',
				'alias' => 'Programs',
				'type' => 'LEFT',
				'conditions' => array(
					'School.sid = Programs.sid',
				)
			),
			array('table' => 'programs_subjectsubs',
				'alias' => 'ProgramsSubjectSubs',
				'type' => 'LEFT',
				'conditions' => array(
					'Programs.pid = ProgramsSubjectSubs.pid',
				)
			),
			array('table' => 'subject_subs',
				'alias' => 'SubjectSubs',
				'type' => 'LEFT',
				'conditions' => array(
					'ProgramsSubjectSubs.ssid = SubjectSubs.ssid',
				)
			)
		);
		
		$options['conditions'] = array(
			'SubjectSubs.ssid' => $subjectsub
		);
		
		$options['fields'] = array(
			'School.*','Programs.*', 'SubjectSubs.*'
		);
		
		
		$programs = $this->School->find('threaded',$options);
		
		$options['group'] = array(
			'School.sid'
		);
		
		$schools = $this->School->find('threaded',$options);
		
		$this->loadModel('SubjectSub');
		$subjectsub = $this->SubjectSub->find('first', array('conditions' => array('SubjectSub.ssid' => $subjectsub)));
		
		$this->set('schools', $schools);
		$this->set('programs', $programs);
		$this->set('subjectsub', $subjectsub);
		
		//Set Menus
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
			
			//Set Menus
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
}
?>
