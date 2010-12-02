<div class="degreetypes form">
<?php echo $this->Form->create('DegreeType');?>
	<fieldset>
 		<legend><?php __('Admin Edit Degreetype'); ?></legend>
	<?php
		echo $this->Form->input('dtid');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('DegreeType.dtid')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('DegreeType.dtid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Degreetypes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programs', true), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>