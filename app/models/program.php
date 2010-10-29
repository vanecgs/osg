<?php
class Program extends AppModel {
	var $name = 'Program';
	var $primaryKey = 'pid';
	var $belongsTo = array(
		'DegreeType' => array(
			'className' => 'DegreeType',
			'foreignKey' => 'dtid'
		),
		'School' => array(
			'className' => 'School',
			'foreignKey' => 'sid'
		)
	);
	var $hasAndBelongsToMany = array(
        'SubjectSubs' =>
            array(
                'className'              => 'SubjectSub',
                'joinTable'              => 'programs_subjectsubs',
                'foreignKey'             => 'pid',
                'associationForeignKey'  => 'ssid',
                'unique'                 => true,
            )
    );
}
?>
