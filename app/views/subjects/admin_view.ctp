<div class="subjects view">
<h2><?php  __('Subject');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['subid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ws Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['ws_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subject', true), array('action' => 'edit', $subject['Subject']['subid'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Subject', true), array('action' => 'delete', $subject['Subject']['subid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subject['Subject']['subid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject Subs', true), array('controller' => 'subject_subs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Subject Subs');?></h3>
	<?php if (!empty($subject['SubjectSubs'])):?>
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
		foreach ($subject['SubjectSubs'] as $subjectSubs):
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
