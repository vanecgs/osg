<?php
class SchoolsController extends AppController {

	var $name = 'Schools';
	var $helpers = array('Javascript');
	var $components = array('Auth','RequestHandler');

	function beforeFilter() {
        $this->Auth->allow('index','info','lead','random');
	}
	
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
		$this->_setResourceMenu();
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
		
		if($school['School']['parent_brand']) {
			$str = preg_replace('/\s+/', '', $school['School']['parent_brand']);
			
			if(file_exists('xml/form-'.$str.'.txt')) {
				$inp = fopen('xml/form-'.$str.'.txt', 'r');
				$content = '';
				
				while (!feof($inp)) {
					$content .= fread($inp, 8192);
				}
				
				fclose($inp);
				
				$form = json_decode($content, true);
				
				$this->set('dform', $form);
			}
			
		}
				
		//Degrees
		$this->loadModel('DegreeType');
		$degrees = $this->DegreeType->Programs->find('all', array('conditions' => array('Programs.sid' => $sid), 'fields' => array('DISTINCT Programs.dtid', 'DegreeType.*')));
		$this->set('degreestype', $degrees);
		
		//Set Menus
		$this->_setSubjectMenu();
		$this->_setSubjectForm();		
		$this->_setDegreeTypeMenu();
		$this->_setDegreeTypeForm();
		$this->_setResourceMenu();
	}
	
	function lead() {
		App::import('Core', 'Xml');
		
		$data = array(//'LEAD_ID' => $this->params['form']['lead_id'],
					  'AID' => 1923,
					  'ZIP' => $this->params['form']['zip'],
					  'BID_STATE' => $this->params['form']['bid_state'],
					  'PRI_PHONE' => $this->params['form']['pri_phone'],
					  //'SID' => $this->params['form']['sid'],
					  //'CID' => $this->params['form']['cid'],
					  //'MID' => $this->params['form']['mid'],
					  //'TID' => $this->params['form']['tid'],
					  'PROGRAM_TYPE' => $this->params['form']['program_type'],
					  'IP_ADDRESS' => getenv('REMOTE_ADDR'),
					  'SEC_PHONE' => $this->params['form']['sec_phone'],
					  //'ONLINE_PHYSICAL' => $this->params['form']['online_physical'],
					  'CAPTURE_TIME' => date('d/m/Y G:i', time()),
					  'PRODUCT' => 'PP_EDU_US',
					  'FNAME' => $this->params['form']['fname'],
					  'ADDRESS' => $this->params['form']['address'],
					  'LNAME' => $this->params['form']['lname'],
					  'HS_GRAD_YEAR' => $this->params['form']['hs_grad_year'],
					  'COUNTRY_RESIDENCE' => $this->params['form']['country_residence'],
					  //'WORK_XP' => $this->params['form']['work_xp'],
					  'HIGHEST_LEVEL' => $this->params['form']['highest_level'],
					  'CITY' => $this->params['form']['city'],
					  //'CURRENT_AGE' => $this->params['form']['current_age'],
					  'EMAIL' => $this->params['form']['email'],
					  'MASTER_BRAND' => $this->params['form']['master_brand']
		);
		
		//$url = "https://www.leadpointdelivery.com/13944/direct.ilp?AID=".urlencode($data['AID'])."&ZIP=".urlencode($data['ZIP'])."&BID_STATE=".urlencode($data['BID_STATE'])."&PRI_PHONE=".urlencode($data['PRI_PHONE'])."&PROGRAM_TYPE=".urlencode($data['PROGRAM_TYPE'])."&IP_ADDRESS=".urlencode($data['IP_ADDRESS'])."&SEC_PHONE=".urlencode($data['SEC_PHONE'])."&CAPTURE_TIME=".urlencode($data['CAPTURE_TIME'])."&PRODUCT=".urlencode($data['PRODUCT'])."&FNAME=".urlencode($data['FNAME'])."&ADDRESS=".urlencode($data['ADDRESS'])."&LNAME=".urlencode($data['LNAME'])."&HS_GRAD_YEAR=".urlencode($data['HS_GRAD_YEAR'])."&COUNTRY_RESIDENCE=".urlencode($data['COUNTRY_RESIDENCE'])."&HIGHEST_LEVEL=".urlencode($data['HIGHEST_LEVEL'])."&CITY=".urlencode($data['CITY'])."&EMAIL=".urlencode($data['EMAIL'])."&MASTER_BRAND=".urlencode($data['MASTER_BRAND']);
		
		$url = "https://www.leadpointdelivery.com/13944/direct.ilp?AID=".urlencode($data['AID'])."&ZIP=".urlencode($data['ZIP'])."&BID_STATE=".urlencode($data['BID_STATE'])."&PRI_PHONE=".urlencode($data['PRI_PHONE'])."&PROGRAM_TYPE=".urlencode($data['PROGRAM_TYPE'])."&IP_ADDRESS=127.0.0.1&SEC_PHONE=".urlencode($data['SEC_PHONE'])."&CAPTURE_TIME=".urlencode($data['CAPTURE_TIME'])."&PRODUCT=".urlencode($data['PRODUCT'])."&FNAME=".urlencode($data['FNAME'])."&ADDRESS=".urlencode($data['ADDRESS'])."&LNAME=".urlencode($data['LNAME'])."&HS_GRAD_YEAR=".urlencode($data['HS_GRAD_YEAR'])."&COUNTRY_RESIDENCE=".urlencode($data['COUNTRY_RESIDENCE'])."&HIGHEST_LEVEL=".urlencode($data['HIGHEST_LEVEL'])."&CITY=".urlencode($data['CITY'])."&EMAIL=".urlencode($data['EMAIL'])."&MASTER_BRAND=".urlencode($data['MASTER_BRAND']);
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    $output = curl_exec($ch);
	    curl_close($ch);   
		
		$xml = new Xml($output);
		$xmlAsArray = Set::reverse($xml);
		$xmlAsArray = $xml->toArray();
		
		$this->set('response', $xmlAsArray);

		//if($xmlAsArray['Response']['sm'] == 'OK') {
//			$this->loadModel('NetworksSchools');
//			$ns = $this->NetworksSchools->find('first', array('conditions' => array('sid' => $this->params['form']['school_id'])));
//			$ns['NetworksSchools']['cap'] = $ns['NetworksSchools']['cap'] - 1;
//			$this->NetworksSchools->save($ns);
//		}
		
		$this->layout = 'ajax';
	}
	
	function random() {
		$c = $this->School->find('count');
		$c1 = rand(1, $c);
		$c2 = rand(1, $c);
		$c3 = rand(1, $c);
		
		$set1 = $this->School->find('first',array('conditions' => array('School.sid' => $c1)));
		$set2 = $this->School->find('first',array('conditions' => array('School.sid' => $c2)));
		$set3 = $this->School->find('first',array('conditions' => array('School.sid' => $c3)));
		
		$set = array();
		
		array_push($set, $set1, $set2, $set3);
		
		$this->set('set', $set);
		$this->layout = 'ajax';
	}

	function admin_index() {
		if($this->Auth->user('group_id') == 1) {
			$this->School->recursive = 0;
			$this->set('schools', $this->paginate());
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_view($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid school', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('school', $this->School->read(null, $id));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_add() {
		if($this->Auth->user('group_id') == 1) {
			if (!empty($this->data)) {
				$this->School->create();
				if ($this->School->save($this->data)) {
					$this->Session->setFlash(__('The school has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The school could not be saved. Please, try again.', true));
				}
			}
			$networks = $this->School->Networks->find('list');
			$this->set(compact('networks'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_edit($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid school', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->School->save($this->data)) {
					$this->Session->setFlash(__('The school has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The school could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->School->read(null, $id);
			}
			$networks = $this->School->Networks->find('list');
			$this->set(compact('networks'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}

	function admin_delete($id = null) {
		if($this->Auth->user('group_id') == 1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for school', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->School->delete($id)) {
				$this->Session->setFlash(__('School deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('School was not deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->redirect('/users/view/'.$this->Auth->user('cid'));
		}
	}
}
?>