<?php
class SubjectsController extends AppController {
	var $name = 'Subjects';
	var $scaffold = 'admin';
	
	function programs($subject) {
		$this->set('programs', $this->Subject->find('list', array(
								'conditions' => array('Subject.subid' => $subject))));
	}
}
?>
