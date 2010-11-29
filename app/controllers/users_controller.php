<?php
class UsersController extends AppController {
	var $name = 'Users';
	var $scaffold = 'admin';
	
	var $components = array('Auth','RequestHandler');

    function beforeFilter() {
		
        $this->Auth->fields = array(
            'username' => 'email', 
			'password' => 'password'
        );
		
		parent::beforeFilter();
		
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'view');
		
		$this->Auth->allow('add','isAuth');
    }

	function login($id = null) {
		if($id) {
			$this->redirect(array('controller' => 'schools', 'action' => 'info', $id));
		}
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
	
	function add() {
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('User has been saved.');
				$this->redirect(array('controller' => 'home', 'action' => 'index'));
			}
		}
	}
	
	function view() {
		$this->set('user', $this->User->read(array('first_name','last_name','cid'),$this->Session->read('Auth.User.cid')));
	}
	
	function edit($id = null) {
		$this->User->id = $id;
		if (empty($this->data)) {
			$this->data = $this->User->read();
		} else {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('User has been updated.');
				$this->redirect(array('action' => 'view'));
			}
		}
	}
	
	function isAuth() {
		$this->layout = 'ajax';
	}

}
?>
