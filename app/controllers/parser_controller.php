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
				$inp = fopen($this->data['xml']['tmp_name'], 'r');
				$content = '';
				
	
				while (!feof($inp)) {
					$content .= fread($inp, 8192);
				}
				
				fclose($inp);
			
				$xml = new Xml($content);
				$xmlAsArray = Set::reverse($xml);
				$xmlAsArray = $xml->toArray();
			
			}
			else {
				$xml = new Xml($this->data);
				$xmlAsArray = Set::reverse($xml);
				$xmlAsArray = $xml->toArray();
				
				$string = json_encode($xmlAsArray);
				
				file_put_contents('test.txt', $string);
			}			
		}
		elseif($this->RequestHandler->isXml()) {
			$xml = new Xml($this->data);
			$xmlAsArray = Set::reverse($xml);
			$xmlAsArray = $xml->toArray();
			
			$string = json_encode($xmlAsArray);
			
			file_put_contents('test.txt', $string);
	
		}
		
		$this->set('xml', $xmlAsArray);
		
		if(!empty($xmlAsArray)) $this->_saveXml($xmlAsArray, $brand);

	}
	
	function _saveXml($xml, $brand  = false) {
		$this->loadModel('School');
		$this->loadModel('NetworksSchools');
		$this->loadModel('Program');
		$this->loadModel('DegreeType');
		$this->loadModel('SubjectSubs');
		
		if(!empty($brand)) {
			$school = $this->School->find('first', array('conditions' => array('ws_id' => $brand)));
			
			if(empty($school)) {
				$school['School']['name'] =  $xml['Brand']['name'];
				$school['School']['ws_id'] =  $xml['Brand']['id'];
				$this->School->save($school);
			}
			else {
				$array = array('School' => array('name' => $xml['Brand']['name'],
											 'ws_id' => $xml['Brand']['id'],
											 //'logo' => $xml['Brand']['logo'],
											 //'description' => $xml['Brand']['corpDescription'],
											 's_desc' => '',
											 //'punch' => $xml['Brand']['tagline'],
											 'programs' => '',
											 'how_it_works' => '',
											 'financial_aid' => '',
											 //'accreditation' => $xml['Brand']['accreditation'],
											 'sched' => -1,
											 'faculty' => -1,
											 'tuition' => -1,
											 'books' => -1,
											 'f_aid' => -0.99,
											 'accred' => 'no',
											 'accred_by' => ''));
				$this->School->save($array);
				
				$array = array('NetworksSchools' => array('nid' => 1,
														  'sid' => $this->School->id,
														  'status' => 1));
				$this->NetworksSchools->save($array);
			}
			
			
		}
		else {
			$array = array('School' => array('name' => $xml['Brand']['name'],
											 'ws_id' => $xml['Brand']['id'],
											 //'logo' => $xml['Brand']['logo'],
											 //'description' => $xml['Brand']['corpDescription'],
											 's_desc' => '',
											 //'punch' => $xml['Brand']['tagline'],
											 'programs' => '',
											 'how_it_works' => '',
											 'financial_aid' => '',
											 //'accreditation' => $xml['Brand']['accreditation'],
											 'sched' => -1,
											 'faculty' => -1,
											 'tuition' => -1,
											 'books' => -1,
											 'f_aid' => -0.99,
											 'accred' => 'no',
											 'accred_by' => ''));
			$this->School->save($array);
			
			$array = array('NetworksSchools' => array('nid' => 1,
													  'sid' => $this->School->id,
													  'status' => 1));
			$this->NetworksSchools->save($array);
		}
	}
}
		//foreach($xml as $school){
//			//Verificar si la escuela ya existe
//			$array = array('School' =>array('name' => $school['name'],
//									 'logo' => $school['logo'],
//									 'description' => $school['corpDescription'],
//									 's_desc' => '',
//									 'punch' => $school['tagline'],
//									 'programs' => '',
//									 'how_it_works' => '',
//									 'financial_aid' => '',
//									 'accreditation' => $school['accreditation'],
//									 'sched' => -1,
//									 'faculty' => -1,
//									 'tuition' => -1,
//									 'books' => -1,
//									 'f_aid' => -0.99,
//									 'accred' => 'no',
//									 'accred_by' => ''),
//					   		'Networks' => array('Networks' => array(1)));
//			$this->School->saveAll($array);
//			
//			//echo "<pre>";
//			//print_r($school);
//			//echo "</pre>";
//			$i = 0;
//			foreach($school['Programs'] as $program) {
//				//Si el degree_type no existe, crearlo
//				//Si el SubjecSubs no existe crearlo
//				$this->DegreeType->find('first',array('conditions' => array('DegreeType.name' => $program[$i]['degree_level']),
//																			'fields' => array('DegreeType.dtid')));
//				
//				$this->SubjectSubs->find('first', array('conditions' => array('SubjectSubs.name' => $program[$i]['subSubject']),
//																			  'fields' => array('SubjectSubs.ssid')));
//
//				$array = array('Program' => array('name' => $program[$i]['name'],
//											'dtid' => $this->DegreeType->id,
//											'sid' => $this->School->id,
//											'c_type' => 0,
//											'nid' => 1,
//											'ref_id' => ''),
//								'SubjectSubs' => array('SubjectSubs' => array($this->SubjectSubs->id)));
//				$i++;
//				$this->Program->saveAll($array);
//			}
//			
//			//print_r($this->School->Networks);
//			
//		}		
	
?>
