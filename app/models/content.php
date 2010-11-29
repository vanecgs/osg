<?php
class Content extends AppModel {
	var $name = 'Content';
	
	var $belongsTo = array(
		'ContentType' => array(
			'className' => 'ContentType',
			'foreignKey' => 'id'
		)
	);
}
?>
