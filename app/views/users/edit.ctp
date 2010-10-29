<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<h1>Edit Post</h1>
<?php
	echo $this->Form->create('User', array('action' => 'edit'));
	echo $form->input('first_name');
	echo $form->input('last_name');
	echo $form->input('address');
	echo $form->input('city');
	echo $form->input('state_code');
	echo $form->input('zip');
	echo $form->input('tel1');
	echo $form->input('tel2');
	echo $form->input('tel3');
	echo $form->input('call_time');
	echo $form->input('email');
	echo $form->input('begin_time');
	echo $this->Form->end('Save Post');
?>


</body>
</html>
