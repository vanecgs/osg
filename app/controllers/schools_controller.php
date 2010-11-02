<?php
class SchoolsController extends AppController {
	var $name = 'Schools';
	var $scaffold = 'admin';
	var $helpers = array('Javascript');
	
	function info($sid, $subid = null) {
		$this->layout = 'school';
		
		//This school
		$school = $this->School->find('first', array('conditions' => array('School.sid' => $sid)));
		$this->set('school', $school);
		
		//Programs for this school
		$this->loadModel('Program');
		$programs = $this->Program->find('all', array('conditions' => array('Program.sid' => $sid)));
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
