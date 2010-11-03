<?php
class SchoolsController extends AppController {
	var $name = 'Schools';
	var $scaffold = 'admin';
	var $helpers = array('Javascript');
	
	function index() {
		$this->layout = 'result';
		
		$alphabet = array(array('letter' => 'A'),array('letter' => 'B'),array('letter' => 'C'),array('letter' => 'D'),array('letter' => 'E'),array('letter' => 'F'),array('letter' => 'G'),array('letter' => 'H'),array('letter' => 'I'),array('letter' => 'J'),array('letter' => 'K'),array('letter' => 'L'),array('letter' => 'M'),array('letter' => 'N'),array('letter' => 'O'),array('letter' => 'P'),array('letter' => 'Q'),array('letter' => 'R'),array('letter' => 'S'),array('letter' => 'T'),array('letter' => 'U'),array('letter' => 'V'),array('letter' => 'W'),array('letter' => 'X'),array('letter' => 'Y'),array('letter' => 'Z'));
		
		
		
		$c = 0;
		foreach($alphabet as $letter) {
			$schools = $this->School->find('all', array('conditions' => array('substring( School.name, 1, 1 ) = "'.$letter['letter'].'"'),
													'order' => 'School.name ASC'));
			
			array_push($alphabet[$c], $schools);
			$c++;
			
		}
			
		$this->set('alphabet', $alphabet);
		
		//Set Menus
		$this->_setSubjectMenu();
		$this->_setSubjectForm();		
		$this->_setDegreeTypeMenu();
		$this->_setDegreeTypeForm();
	}
	
	function info($sid, $subid = null) {
		$this->layout = 'school';
		
		//This school
		$school = $this->School->find('first', array('conditions' => array('School.sid' => $sid)));
		$this->set('school', $school);
		
		//Programs for this school
		$this->loadModel('Program');
		
		if(!empty($subid)) {
			//Program search by school and subject
			$options['joins'] = array(
				array('table' => 'programs_subjectsubs',
					'alias' => 'ProgramsSubjectSubs',
					'type' => 'LEFT',
					'conditions' => array(
						'Program.pid = ProgramsSubjectSubs.pid',
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
				'Program.sid' => $sid,
				'SubjectSubs.subid' => $subid
			);
		}
		else {
			//Programs search only by school
			$options['conditions'] = array(
				'Program.sid' => $sid,
			);
		}
		
		$programs = $this->Program->find('all', $options);
		$this->set('programs', $programs);
		
		if(!empty($subid)) $this->set('subject', $subid);
				
		//Degrees
		$this->loadModel('DegreeType');
		$degrees = $this->DegreeType->Programs->find('all', array('conditions' => array('Programs.sid' => $sid), 'fields' => array('DISTINCT Programs.dtid', 'DegreeType.*')));
		$this->set('degreestype', $degrees);
		
		//Set Menus
		$this->_setSubjectMenu();
		$this->_setSubjectForm();		
		$this->_setDegreeTypeMenu();
		$this->_setDegreeTypeForm();
	}
}
?>
