<div class="programs view">
<h2><?php  __('Program');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['pid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Submit Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['submit_value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Degree Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($program['DegreeType']['name'], array('controller' => 'degree_types', 'action' => 'view', $program['DegreeType']['dtid'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('School'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($program['School']['name'], array('controller' => 'schools', 'action' => 'view', $program['School']['sid'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('C Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['c_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['nid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ref Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['ref_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $program['Program']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Program', true), array('action' => 'edit', $program['Program']['pid'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Program', true), array('action' => 'delete', $program['Program']['pid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $program['Program']['pid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Degree Types', true), array('controller' => 'degree_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Degree Type', true), array('controller' => 'degree_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools', true), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School', true), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Subject Subs');?></h3>
	<?php if (!empty($program['SubjectSubs'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Ssid'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Ws Id'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Subid'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($program['SubjectSubs'] as $subjectSubs):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $subjectSubs['ssid'];?></td>
			<td><?php echo $subjectSubs['name'];?></td>
			<td><?php echo $subjectSubs['description'];?></td>
			<td><?php echo $subjectSubs['ws_id'];?></td>
			<td><?php echo $subjectSubs['status'];?></td>
			<td><?php echo $subjectSubs['subid'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'subject_subs', 'action' => 'view', $subjectSubs['ssid'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'subject_subs', 'action' => 'edit', $subjectSubs['ssid'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'subject_subs', 'action' => 'delete', $subjectSubs['ssid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subjectSubs['ssid'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
