<?php
class SchoolsController extends AppController {
	var $name = 'Schools';
	var $scaffold = 'admin';
	
	function info($sid, $subid) {
		echo $sid;
	}
}
?>
