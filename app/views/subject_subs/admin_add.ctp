<div class="subjectsubs form">
<?php echo $this->Form->create('SubjectSub');?>
	<fieldset>
 		<legend><?php __('Admin Add Subjectsub'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('ws_id');
		echo $this->Form->input('status');
		echo $this->Form->input('subid');
		echo $this->Form->input('Programs');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Subjectsubs', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject', true), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programs', true), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>