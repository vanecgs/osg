<?php
class ParserController extends AppController {
	var $name = 'Parser';
	var $uses = array (); 
	var $components = array('RequestHandler');
	
	function index() {
		App::import('Core', 'Xml');
		
		if($this->RequestHandler->isPost()) {
			$inp = fopen($this->data['xml']['tmp_name'], 'r');
			$content = '';
			

			while (!feof($inp)) {
				$content .= fread($inp, 8192);
			}
			
			fclose($inp);

			$xml = new Xml($content);
			$xmlAsArray = Set::reverse($xml);
			$xmlAsArray = $xml->toArray();
			
			if(!empty($xml)) $this->_saveXml($xmlAsArray);
			
			$this->set('xml', $xmlAsArray);

			
		}
		elseif($this->RequestHandler->isXml()) {
			$xml = new Xml($this->data);
			$xmlAsArray = Set::reverse($xml);
			$xmlAsArray = $xml->toArray();
		}
	}
	
	function _saveXml($xml) {
		$this->loadModel('School');
		$this->loadModel('Program');
		$this->loadModel('DegreeType');
		$this->loadModel('SubjectSubs');
				
		foreach($xml as $school){
			//Verificar si la escuela ya existe
			$array = array('School' =>array('name' => $school['name'],
									 'logo' => $school['logo'],
									 'description' => $school['corpDescription'],
									 's_desc' => '',
									 'punch' => $school['tagline'],
									 'programs' => '',
									 'how_it_works' => '',
									 'financial_aid' => '',
									 'accreditation' => $school['accreditation'],
									 'sched' => -1,
									 'faculty' => -1,
									 'tuition' => -1,
									 'books' => -1,
									 'f_aid' => -0.99,
									 'accred' => 'no',
									 'accred_by' => ''),
					   		'Networks' => array('Networks' => array(1)));
			$this->School->saveAll($array);
			
			//echo "<pre>";
			//print_r($school);
			//echo "</pre>";
			$i = 0;
			foreach($school['Programs'] as $program) {
				//Si el degree_type no existe, crearlo
				//Si el SubjecSubs no existe crearlo
				$this->DegreeType->find('first',array('conditions' => array('DegreeType.name' => $program[$i]['degree_level']),
																			'fields' => array('DegreeType.dtid')));
				
				$this->SubjectSubs->find('first', array('conditions' => array('SubjectSubs.name' => $program[$i]['subSubject']),
																			  'fields' => array('SubjectSubs.ssid')));

				$array = array('Program' => array('name' => $program[$i]['name'],
											'dtid' => $this->DegreeType->id,
											'sid' => $this->School->id,
											'c_type' => 0,
											'nid' => 1,
											'ref_id' => ''),
								'SubjectSubs' => array('SubjectSubs' => array($this->SubjectSubs->id)));
				$i++;
				$this->Program->saveAll($array);
			}
			
			//print_r($this->School->Networks);
			
		}		
	}
}
?>
