<?php
class Network extends AppModel {
	var $name = 'Network';
	var $primaryKey = 'nid';
	var $hasAndBelongsToMany = array(
        'Schools' =>
            array(
                'className'              => 'School',
                'joinTable'              => 'networks_schools',
                'foreignKey'             => 'sid',
                'associationForeignKey'  => 'nid',
                'unique'                 => true,
            )
    );
}
?>
