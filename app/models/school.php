<?php
class School extends AppModel {
	var $name = 'School';
	var $primaryKey = 'sid';
	var $hasAndBelongsToMany = array(
        'Networks' =>
            array(
                'className'              => 'Network',
                'joinTable'              => 'networks_schools',
                'foreignKey'             => 'nid',
                'associationForeignKey'  => 'sid',
                'unique'                 => true,
            )
    );
	
	var $hasMany = array(
		'Programs' => array(
			'className' => 'Program',
			'foreignKey' => 'pid',
		)
	);

}
?>
