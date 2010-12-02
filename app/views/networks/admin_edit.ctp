<div class="networks form">
<?php echo $this->Form->create('Network');?>
	<fieldset>
 		<legend><?php __('Admin Edit Network'); ?></legend>
	<?php
		echo $this->Form->input('nid');
		echo $this->Form->input('name');
		echo $this->Form->input('status');
		echo $this->Form->input('Schools');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Network.nid')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Network.nid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Networks', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Schools', true), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schools', true), array('controller' => 'schools', 'action' => 'add')); ?> </li>
	</ul>
</div>