<div class="contentTypes view">
<h2><?php  __('Content Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contentType['ContentType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contentType['ContentType']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Content Type', true), array('action' => 'edit', $contentType['ContentType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Content Type', true), array('action' => 'delete', $contentType['ContentType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contentType['ContentType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Content Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Type', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents', true), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contents', true), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Contents');?></h3>
	<?php if (!empty($contentType['Contents'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Ctid'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contentType['Contents'] as $contents):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $contents['id'];?></td>
			<td><?php echo $contents['title'];?></td>
			<td><?php echo $contents['content'];?></td>
			<td><?php echo $contents['ctid'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'contents', 'action' => 'view', $contents['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'contents', 'action' => 'edit', $contents['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'contents', 'action' => 'delete', $contents['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contents['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contents', true), array('controller' => 'contents', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
