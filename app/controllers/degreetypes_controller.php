<?php
class DegreeTypesController extends AppController {
	var $name = 'DegreeTypes';
	var $scaffold = 'admin';
	var $helpers = array('Javascript');
	
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
	}
}
?>
