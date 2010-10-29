<?php
class DegreeType extends AppModel {
	var $name = 'DegreeType';
	var $primaryKey = 'dtid';
	var $hasMany = array(
		'Programs' => array(
			'className' => 'Program',
			'foreignKey' => 'pid',
		)
	);
}
?>
