<?php
class SchoolsController extends AppController {
	var $name = 'Schools';
	var $scaffold = 'admin';
	
	function info($sid, $subid = null) {
		$this->layout = 'defaultpage';
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
