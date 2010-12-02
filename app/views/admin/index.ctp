<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Content Types', true), array('controller' => 'admin', 'action' => 'content_types')); ?> </li>
		<li><?php echo $this->Html->link(__('List Content', true), array('controller' => 'admin', 'action' => 'contents')); ?> </li>
		<li><?php echo $this->Html->link(__('List Degree Types', true), array('controller' => 'admin', 'action' => 'degree_types')); ?> </li>
		<li><?php echo $this->Html->link(__('List Networks', true), array('controller' => 'admin', 'action' => 'networks')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'admin', 'action' => 'programs')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools', true), array('controller' => 'admin', 'action' => 'schools')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subject Subs', true), array('controller' => 'admin', 'action' => 'subject_subs')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('controller' => 'admin', 'action' => 'subjects')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'admin', 'action' => 'users')); ?> </li>
		<li><?php echo $this->Html->link(__('Log Out', true), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>