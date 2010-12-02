<div class="contentTypes form">
<?php echo $this->Form->create('ContentType');?>
	<fieldset>
 		<legend><?php __('Admin Add Content Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Content Types', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contents', true), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contents', true), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>