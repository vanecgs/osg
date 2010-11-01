<?php
class SchoolsController extends AppController {
	var $name = 'Schools';
	var $scaffold = 'admin';
	var $helpers = array('Javascript');
	
	function info($sid, $subid = null) {
		$this->layout = 'result';
		$this->loadModel('Programs');
		if($subid) {
		}
		
		//Set Menus
		$this->_setSubjectMenu();
		$this->_setSubjectForm();		
		$this->_setDegreeTypeMenu();
		$this->_setDegreeTypeForm();
	}
}
?>
