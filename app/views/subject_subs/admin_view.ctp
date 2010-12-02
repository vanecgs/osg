<div class="subjectsubs view">
<h2><?php  __('Subjectsub');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ssid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subjectSub['SubjectSub']['ssid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subjectSub['SubjectSub']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subjectSub['SubjectSub']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ws Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subjectSub['SubjectSub']['ws_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subjectSub['SubjectSub']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subject'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($subjectSub['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectSub['Subject']['subid'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subjectsub', true), array('action' => 'edit', $subjectSub['SubjectSub']['ssid'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Subjectsub', true), array('action' => 'delete', $subjectSub['SubjectSub']['ssid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subjectSub['SubjectSub']['ssid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjectsubs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subjectsub', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects', true), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject', true), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programs', true), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Programs');?></h3>
	<?php if (!empty($subjectSub['Programs'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Pid'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Submit Value'); ?></th>
		<th><?php __('Dtid'); ?></th>
		<th><?php __('Sid'); ?></th>
		<th><?php __('C Type'); ?></th>
		<th><?php __('Nid'); ?></th>
		<th><?php __('Ref Id'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subjectSub['Programs'] as $programs):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $programs['pid'];?></td>
			<td><?php echo $programs['name'];?></td>
			<td><?php echo $programs['description'];?></td>
			<td><?php echo $programs['submit_value'];?></td>
			<td><?php echo $programs['dtid'];?></td>
			<td><?php echo $programs['sid'];?></td>
			<td><?php echo $programs['c_type'];?></td>
			<td><?php echo $programs['nid'];?></td>
			<td><?php echo $programs['ref_id'];?></td>
			<td><?php echo $programs['status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'programs', 'action' => 'view', $programs['pid'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'programs', 'action' => 'edit', $programs['pid'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'programs', 'action' => 'delete', $programs['pid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $programs['pid'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Programs', true), array('controller' => 'programs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
