<div class="networks view">
<h2><?php  __('Network');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $network['Network']['nid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $network['Network']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $network['Network']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Network', true), array('action' => 'edit', $network['Network']['nid'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Network', true), array('action' => 'delete', $network['Network']['nid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $network['Network']['nid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Networks', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Network', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools', true), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schools', true), array('controller' => 'schools', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Schools');?></h3>
	<?php if (!empty($network['Schools'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Sid'); ?></th>
		<th><?php __('Ws Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Logo'); ?></th>
		<th><?php __('Image'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('S Desc'); ?></th>
		<th><?php __('Punch'); ?></th>
		<th><?php __('Parent Brand'); ?></th>
		<th><?php __('Programs'); ?></th>
		<th><?php __('How It Works'); ?></th>
		<th><?php __('Financial Aid'); ?></th>
		<th><?php __('Accreditation'); ?></th>
		<th><?php __('Campus Type'); ?></th>
		<th><?php __('Sched'); ?></th>
		<th><?php __('Faculty'); ?></th>
		<th><?php __('Tuition'); ?></th>
		<th><?php __('Books'); ?></th>
		<th><?php __('F Aid'); ?></th>
		<th><?php __('Accred'); ?></th>
		<th><?php __('Accred By'); ?></th>
		<th><?php __('Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($network['Schools'] as $schools):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $schools['sid'];?></td>
			<td><?php echo $schools['ws_id'];?></td>
			<td><?php echo $schools['name'];?></td>
			<td><?php echo $schools['url'];?></td>
			<td><?php echo $schools['logo'];?></td>
			<td><?php echo $schools['image'];?></td>
			<td><?php echo $schools['description'];?></td>
			<td><?php echo $schools['s_desc'];?></td>
			<td><?php echo $schools['punch'];?></td>
			<td><?php echo $schools['parent_brand'];?></td>
			<td><?php echo $schools['programs'];?></td>
			<td><?php echo $schools['how_it_works'];?></td>
			<td><?php echo $schools['financial_aid'];?></td>
			<td><?php echo $schools['accreditation'];?></td>
			<td><?php echo $schools['campus_type'];?></td>
			<td><?php echo $schools['sched'];?></td>
			<td><?php echo $schools['faculty'];?></td>
			<td><?php echo $schools['tuition'];?></td>
			<td><?php echo $schools['books'];?></td>
			<td><?php echo $schools['f_aid'];?></td>
			<td><?php echo $schools['accred'];?></td>
			<td><?php echo $schools['accred_by'];?></td>
			<td><?php echo $schools['status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'schools', 'action' => 'view', $schools['sid'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'schools', 'action' => 'edit', $schools['sid'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'schools', 'action' => 'delete', $schools['sid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $schools['sid'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Schools', true), array('controller' => 'schools', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
