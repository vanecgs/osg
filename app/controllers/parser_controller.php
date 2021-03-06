<?php
class ParserController extends AppController {
	var $name = 'Parser';
	var $uses = array (); 
	var $components = array('RequestHandler');
	
	function beforeFilter () {
        if ($this->RequestHandler->accepts('html')) {
            // Execute code only if client accepts an HTML (text/html) response
        } elseif ($this->RequestHandler->accepts('xml')) {
            // Execute XML-only code
        }
        if ($this->RequestHandler->accepts(array('xml', 'rss', 'atom'))) {
            // Executes if the client accepts any of the above: XML, RSS or Atom
        }
    }

	
	
	function xml($brand = false) {
		App::import('Core', 'Xml');
		
		if($this->RequestHandler->isPost()) {
			if(!empty($this->data['xml']['tmp_name'])) {
				//Upload XML via post using a form
				$inp = fopen($this->data['xml']['tmp_name'], 'r');
				$content = '';
				
	
				while (!feof($inp)) {
					$content .= fread($inp, 8192);
				}
				
				fclose($inp);
			
				$xml = new Xml($content);
				$xmlAsArray = Set::reverse($xml);
				$xmlAsArray = $xml->toArray();
				
				if($xmlAsArray['FormSpec']) {
					$str = preg_replace('/\s+/', '', $xmlAsArray['FormSpec']['masterBrandName']);
					file_put_contents('xml/form-'.$str.'.txt', $content);
				}
				elseif($xmlAsArray['Brand']) {
					file_put_contents('xml/brand-'.$brand.'.txt', $content);
				}
				elseif($xmlAsArray['Buyer']) {
					file_put_contents('xml/buyer-'.$xmlAsArray['Buyer']['id'].'.txt', $content);
				}
				else {
					file_put_contents('xml/osg-'.$brand.'.txt', $content);
				}
				
			
			}
			else {
				//Get XML data via post
				$xml = new Xml($this->data);
				$xmlAsArray = Set::reverse($xml);
				$xmlAsArray = $xml->toArray();
				
				$string = json_encode($xmlAsArray);
				
				if($xmlAsArray['FormSpec']) {
					$str = preg_replace('/\s+/', '', $xmlAsArray['FormSpec']['masterBrandName']);
					file_put_contents('xml/form-'.$str.'.txt', $string);
				}
				elseif($xmlAsArray['Brand']) {
					file_put_contents('xml/brand-'.$brand.'.txt', $string);
				}
				elseif($xmlAsArray['Buyer']) {
					file_put_contents('xml/buyer-'.$xmlAsArray['Buyer']['id'].'.txt', $string);
				}
				else {
					file_put_contents('xml/osg-'.$brand.'.txt', $string);
				}
			}			
		}
		elseif($this->RequestHandler->isXml()) {
			//Get XML data via post, not sure if this one is used.			
			$xml = new Xml($this->data);
			$xmlAsArray = Set::reverse($xml);
			$xmlAsArray = $xml->toArray();
			
			$string = json_encode($xmlAsArray);
			
			if($xmlAsArray['FormSpec']) {
				$str = preg_replace('/\s+/', '', $xmlAsArray['FormSpec']['masterBrandName']);
				file_put_contents('xml/form-'.$str.'.txt', $string);
			}
			elseif($xmlAsArray['Brand']) {
				file_put_contents('xml/brand-'.$brand.'.txt', $string);
			}
			elseif($xmlAsArray['Buyer']) {
				file_put_contents('xml/buyer-'.$xmlAsArray['Buyer']['id'].'.txt', $string);
			}
			else {
				file_put_contents('xml/osg-'.$brand.'.txt', $string);
			}
	
		}
		
		$this->set('xml', $xmlAsArray);
		
		if(!empty($xmlAsArray) && !empty($xmlAsArray['Brand'])) $this->_saveXml($xmlAsArray, $brand);
		
		if(!empty($xmlAsArray) && !empty($xmlAsArray['Buyer'])) $this->_saveCap($xmlAsArray);

	}
	
	function _saveXml($xml, $brand  = false) {
		$this->loadModel('School');
		$this->loadModel('NetworksSchools');
		$this->loadModel('Program');
		$this->loadModel('DegreeType');
		$this->loadModel('SubjectSubs');
		$this->loadModel('ProgramsSubjectsubs');
		
		if(!empty($brand)) {
			$school = $this->School->find('first', array('conditions' => array('ws_id' => $brand)));
			
			$sid = $this->_saveSchool($school, $xml);	
		}
		else {
			$school = array();
			if($xml['Brand']['id']) $school = $this->School->find('first', array('conditions' => array('ws_id' => $xml['Brand']['id'])));
			
			$sid = $this->_saveSchool($school, $xml);		
		}
		
		if($xml['Brand']['Programs']['Program']) {
			foreach($xml['Brand']['Programs']['Program'] as $program) {
				$p = $this->Program->find('first', array('conditions' => array('ref_id' => $program['id'])));
				
				if($program['degree_level']) {
					$degree = $this->DegreeType->find('first',array('conditions' => array('DegreeType.name' => $program['degree_level']), 'fields' => array('DegreeType.dtid')));
				}
				
				if($program['subSubject']) {
					$subject = $this->SubjectSubs->find('first', array('conditions' => array('SubjectSubs.ws_id' => $program['subSubject']), 'fields' => array('SubjectSubs.ssid')));
				}
				
				if(empty($p)) {
					//Create new program
					$array = array();
					
					if($program['name']) $array['Program']['name'] = $program['name'];
					if($degree['DegreeType']['dtid']) $array['Program']['dtid'] = $degree['DegreeType']['dtid'];
					if($sid) $array['Program']['sid'] = $sid;
					$array['Program']['nid'] = 1;
					if($program['id']) $array['Program']['ref_id'] = $program['id'];
					if($program['description']) $array['Program']['description'] = $program['description'];
					
					$this->Program->create();
					$this->Program->save($array);
					
				}
				else {
					//Update a program
					$this->Program->pid = $p['Program']['pid'];
					
					if($program['name']) $p['Program']['name'] = $program['name'];
					if($degree['DegreeType']['dtid']) $p['Program']['dtid'] = $degree['DegreeType']['dtid'];
					if($sid) $p['Program']['sid'] = $sid;
					if($program['id']) $p['Program']['ref_id'] = $program['id'];
					if($program['description']) $p['Program']['description'] = $program['description'];
										
					$this->Program->save($p);
				}
				
				$pss = $this->ProgramsSubjectsubs->find('first', array('conditions' => array('ProgramsSubjectsubs.pid' => $this->Program->id)));
				
				if($pss) {
					$this->ProgramsSubjectsubs->read(null, $pss['ProgramsSubjectsubs']['id']);
					$this->ProgramsSubjectsubs->set('ssid', $subject['SubjectSubs']['ssid']);
					$this->ProgramsSubjectsubs->save();
				}
				else {
					$array = array('ProgramsSubjectsubs' => array('pid' => $this->Program->id,
																  'ssid' => $subject['SubjectSubs']['ssid']));
					$this->ProgramsSubjectsubs->create();
					$this->ProgramsSubjectsubs->save($array);
				}
			}
		}
	}
	
	function _saveSchool($school = null, $xml = null) {
		$this->loadModel('School');
		$this->loadModel('NetworksSchools');
		
		if(!empty($xml)) {
			if(empty($school)) {
				//Create new school
				
				$array = array();

				if($xml['Brand']['name']) $array['School']['name'] =  $xml['Brand']['name'];
				if($xml['Brand']['logo']) $array['School']['logo'] =  $xml['Brand']['logo'];
				if($xml['Brand']['id']) $array['School']['ws_id'] =  $xml['Brand']['id'];
				if($xml['Brand']['url']) $array['School']['url'] =  $xml['Brand']['url'];
				if($xml['Brand']['tagline']) $array['School']['punch'] =  $xml['Brand']['tagline'];
				if($xml['Brand']['tuition_assit']) $array['School']['financial_aid'] =  $xml['Brand']['financial_aid'];
				if($xml['Brand']['accreditation']): 
					$array['School']['accred_by'] =  $xml['Brand']['accreditation'];
					$array['School']['accred'] = 'yes';
				endif;
				if($xml['Brand']['campusType']) $array['School']['campus_type'] =  $xml['Brand']['campusType'];
				if($xml['Brand']['corpDescription']) $array['School']['description'] =  $xml['Brand']['corpDescription'];
				if($xml['Brand']['parentBrandName']) $array['School']['parent_brand'] = $xml['Brand']['parentBrandName'];
				
				$this->School->create();
				$this->School->save($array);
								
				$array = array('NetworksSchools' => array('nid' => 1,
														  'sid' => $this->School->id,
														  'status' => 1));
				
				$this->NetworksSchools->create();
				$this->NetworksSchools->save($array);
			}
			else {
				//Update school
				
				$this->School->sid = $school['School']['sid'];
				
				if($xml['Brand']['name']) $school['School']['name'] =  $xml['Brand']['name'];
				if($xml['Brand']['logo']) $school['School']['logo'] =  $xml['Brand']['logo'];
				if($xml['Brand']['id']) $school['School']['ws_id'] =  $xml['Brand']['id'];
				if($xml['Brand']['url']) $school['School']['url'] =  $xml['Brand']['url'];
				if($xml['Brand']['tagline']) $school['School']['punch'] =  $xml['Brand']['tagline'];
				if($xml['Brand']['tuition_assit']) $school['School']['financial_aid'] =  $xml['Brand']['financial_aid'];
				if($xml['Brand']['accreditation']): 
					$school['School']['accred_by'] =  $xml['Brand']['accreditation'];
					$school['School']['accred'] = 'yes';
				endif;
				if($xml['Brand']['campusType']) $school['School']['campus_type'] =  $xml['Brand']['campusType'];
				if($xml['Brand']['corpDescription']) $school['School']['description'] =  $xml['Brand']['corpDescription'];
				if($xml['Brand']['parentBrandName']) $school['School']['parent_brand'] = $xml['Brand']['parentBrandName'];
				
				$this->School->save($school);
				
			}
			
			return $this->School->id;
		}
	}
	
	function _saveCap($xml = null) {
		if(!empty($xml)) {
			foreach($xml['Buyer']['OrderSet']['Order'] as $order) {
				$brand = $order['OrderChange']['Brand']['id'];
				$leadWeekday = $order['OrderChange']['Caps']['maxLeadsPerWeekday'];
				$leadWeekend = $order['OrderChange']['Caps']['maxLeadsPerWeekendDay'];
				
				if(!empty($brand)) {
					$this->loadModel('NetworksSchools');
					$this->loadModel('School');
					$school = $this->School->find('first', array('conditions' => array('School.ws_id' => $brand)));
					if(!empty($school)) {
						$ns = $this->NetworksSchools->find('first', array('conditions' => array('NetworksSchools.sid' => $school['School']['sid'], 'NetworksSchools.nid' => 1)));
						$ns['NetworksSchools']['cap_weekday'] = $leadWeekday;
						$ns['NetworksSchools']['cap_weekend'] = $leadWeekend;
						$this->NetworksSchools->save($ns);
					}
				}
			}
		}
	}
}
	
?>
