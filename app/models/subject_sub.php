<?php
class SubjectSub extends AppModel {
	var $name = 'SubjectSub';
	var $primaryKey = 'ssid';
	var $belongsTo = array(
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subid'
		)
	);
	var $hasAndBelongsToMany = array(
        'Programs' =>
            array(
                'className'              => 'Program',
                'joinTable'              => 'programs_subjectsubs',
                'foreignKey'             => 'ssid',
                'associationForeignKey'  => 'pid',
                'unique'                 => true,
            )
    );
}
?>
