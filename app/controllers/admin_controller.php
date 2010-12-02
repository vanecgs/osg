<?php
class AdminController extends AppController {

	var $name = 'Admin';
	var $uses = array();
	var $components = array('Auth');
	
	function index() {
		if($this->Auth->user('group_id') != 1) {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}
}
?>