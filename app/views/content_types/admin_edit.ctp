<div class="contentTypes form">
<?php echo $this->Form->create('ContentType');?>
	<fieldset>
 		<legend><?php __('Admin Edit Content Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ContentType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ContentType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Content Types', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contents', true), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contents', true), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>