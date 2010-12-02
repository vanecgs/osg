<div class="subjects form">
<?php echo $this->Form->create('Subject');?>
	<fieldset>
 		<legend><?php __('Admin Edit Subject'); ?></legend>
	<?php
		echo $this->Form->input('subid');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('ws_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Subject.subid')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Subject.subid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'add')); ?> </li>
	</ul>
</div>