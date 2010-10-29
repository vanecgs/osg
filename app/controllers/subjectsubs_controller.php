<?php
class SubjectSubsController extends AppController {
	var $name = 'SubjectSubs';
	var $scaffold = 'admin';
	
	function search($id) {
		$this->set('subsubjects', $this->SubjectSub->find('list', array(
								'fields' => array('SubjectSub.ssid', 'SubjectSub.name'),
								'conditions' => array('SubjectSub.subid' => $id)
								))
		);
		$this->layout = 'ajax';
	}
	
	function index($id) {
	}
}
?>
