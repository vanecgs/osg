<?php
class ContentType extends AppModel {
	var $name = 'ContentType';
	var $hasMany = array(
		'Contents' => array(
			'className' => 'Content',
			'foreignKey' => 'ctid',
		)
	);
}
?>
