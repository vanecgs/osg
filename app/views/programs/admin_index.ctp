<div class="programs index">
	<h2><?php __('Programs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('pid');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('dtid');?></th>
			<th><?php echo $this->Paginator->sort('sid');?></th>
			<th><?php echo $this->Paginator->sort('c_type');?></th>
			<th><?php echo $this->Paginator->sort('nid');?></th>
			<th><?php echo $this->Paginator->sort('ref_id');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($programs as $program):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $program['Program']['pid']; ?>&nbsp;</td>
		<td><?php echo $program['Program']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($program['DegreeType']['name'], array('controller' => 'degree_types', 'action' => 'view', $program['DegreeType']['dtid'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($program['School']['name'], array('controller' => 'schools', 'action' => 'view', $program['School']['sid'])); ?>
		</td>
		<td><?php echo $program['Program']['c_type']; ?>&nbsp;</td>
		<td><?php echo $program['Program']['nid']; ?>&nbsp;</td>
		<td><?php echo $program['Program']['ref_id']; ?>&nbsp;</td>
		<td><?php echo $program['Program']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $program['Program']['pid'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $program['Program']['pid'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $program['Program']['pid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $program['Program']['pid'])); ?>
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
		<li><?php echo $this->Html->link(__('New Program', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Degree Types', true), array('controller' => 'degree_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Degree Type', true), array('controller' => 'degree_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools', true), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School', true), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'add')); ?> </li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('List Content Types', true), array('controller' => 'content_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Content', true), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Networks', true), array('controller' => 'networks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Log Out', true), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>