<div class="degreetypes view">
<h2><?php  __('Degreetype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dtid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $degreeType['DegreeType']['dtid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $degreeType['DegreeType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $degreeType['DegreeType']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ws Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $degreeType['DegreeType']['ws_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $degreeType['DegreeType']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Degreetype', true), array('action' => 'edit', $degreeType['DegreeType']['dtid'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Degreetype', true), array('action' => 'delete', $degreeType['DegreeType']['dtid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $degreeType['DegreeType']['dtid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Degreetypes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Degreetype', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Programs', true), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Programs');?></h3>
	<?php if (!empty($degreeType['Programs'])):?>
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
		foreach ($degreeType['Programs'] as $programs):
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
