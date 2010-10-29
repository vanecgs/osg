<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<h1>Edit Post</h1>
<?php
	echo $this->Form->create('Post', array('action' => 'edit'));
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('id', array('type' => 'hidden')); 
	echo $this->Form->end('Save Post');
?>


</body>
</html>
