<div class="schools index">
	<h2><?php __('Schools');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('sid');?></th>
			<th><?php echo $this->Paginator->sort('ws_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('campus_type');?></th>
			<th><?php echo $this->Paginator->sort('sched');?></th>
			<th><?php echo $this->Paginator->sort('faculty');?></th>
			<th><?php echo $this->Paginator->sort('f_aid');?></th>
			<th><?php echo $this->Paginator->sort('accred');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($schools as $school):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $school['School']['sid']; ?>&nbsp;</td>
		<td><?php echo $school['School']['ws_id']; ?>&nbsp;</td>
		<td><?php echo $school['School']['name']; ?>&nbsp;</td>
		<td><?php echo $school['School']['campus_type']; ?>&nbsp;</td>
		<td><?php echo $school['School']['sched']; ?>&nbsp;</td>
		<td><?php echo $school['School']['faculty']; ?>&nbsp;</td>
		<td><?php echo $school['School']['f_aid']; ?>&nbsp;</td>
		<td><?php echo $school['School']['accred']; ?>&nbsp;</td>
		<td><?php echo $school['School']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $school['School']['sid'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $school['School']['sid'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $school['School']['sid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $school['School']['sid'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New School', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programs', true), array('controller' => 'programs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Networks', true), array('controller' => 'networks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Networks', true), array('controller' => 'networks', 'action' => 'add')); ?> </li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('List Content Types', true), array('controller' => 'content_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Content', true), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Degree Types', true), array('controller' => 'degree_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools', true), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Log Out', true), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>