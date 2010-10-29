<h1>Add Post</h1>
<?php
	echo $form->create('User');
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
	echo $form->input('password');
	echo $form->end('Save Post');
?>
