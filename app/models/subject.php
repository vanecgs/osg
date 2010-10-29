<?php
class Subject extends AppModel {
	var $name = 'Subject';
	var $primaryKey = 'subid';
	var $hasMany = array(
		'SubjectSubs' => array(
			'className' => 'SubjectSub',
			'foreignKey' => 'subid',
		)
	);
}
?>
