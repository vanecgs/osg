<div class="programs form">
<?php echo $this->Form->create('Program');?>
	<fieldset>
 		<legend><?php __('Admin Edit Program'); ?></legend>
	<?php
		echo $this->Form->input('pid');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('submit_value');
		echo $this->Form->input('dtid');
		echo $this->Form->input('sid');
		echo $this->Form->input('c_type');
		echo $this->Form->input('nid');
		echo $this->Form->input('ref_id');
		echo $this->Form->input('status');
		echo $this->Form->input('SubjectSubs');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Program.pid')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Program.pid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Degree Types', true), array('controller' => 'degree_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Degree Type', true), array('controller' => 'degree_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools', true), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School', true), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'add')); ?> </li>
	</ul>
</div>