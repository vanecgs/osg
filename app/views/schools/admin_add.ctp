<div class="schools form">
<?php echo $this->Form->create('School');?>
	<fieldset>
 		<legend><?php __('Admin Add School'); ?></legend>
	<?php
		echo $this->Form->input('ws_id');
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('logo');
		echo $this->Form->input('image');
		echo $this->Form->input('description');
		echo $this->Form->input('s_desc');
		echo $this->Form->input('punch');
		echo $this->Form->input('parent_brand');
		echo $this->Form->input('programs');
		echo $this->Form->input('how_it_works');
		echo $this->Form->input('financial_aid');
		echo $this->Form->input('accreditation');
		echo $this->Form->input('campus_type');
		echo $this->Form->input('sched');
		echo $this->Form->input('faculty');
		echo $this->Form->input('tuition');
		echo $this->Form->input('books');
		echo $this->Form->input('f_aid');
		echo $this->Form->input('accred');
		echo $this->Form->input('accred_by');
		echo $this->Form->input('status');
		echo $this->Form->input('Networks');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Schools', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programs', true), array('controller' => 'programs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Networks', true), array('controller' => 'networks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Networks', true), array('controller' => 'networks', 'action' => 'add')); ?> </li>
	</ul>
</div>