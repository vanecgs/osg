<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Register'); ?></legend>
	<?php
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
		echo $this->Form->input('group_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>