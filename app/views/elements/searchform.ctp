<div id="search" class="minimize">
<h2>Find a School</h2>
	<?php
		echo $form->create('Programs', array('action' => 'search'));
		echo $form->input('subjects', array('type' => 'select', 'label' => 'By Subject', 'div' => '', 'options' => $subject_opts));
		echo $form->input('degrees', array('type' => 'select', 'label' => 'By Degree', 'div' => '', 'options' => $degree_opts));
		echo $form->end(array('div' => array('class' => 'form_button')));
	?>
</div> 
