<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('cid');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('state_code');
		echo $this->Form->input('zip');
		echo $this->Form->input('tel1');
		echo $this->Form->input('tel2');
		echo $this->Form->input('tel3');
		echo $this->Form->input('call_time');
		echo $this->Form->input('email');
		echo $this->Form->input('begin_time');
		echo $this->Form->input('password');
		echo $this->Form->input('ip_address');
		echo $this->Form->input('ts');
		echo $this->Form->input('status');
		echo $this->Form->input('visit_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.cid')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.cid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
	</ul>
</div>