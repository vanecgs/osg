<div class="contents view">
<h2><?php  __('Content');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Content Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($content['ContentType']['name'], array('controller' => 'content_types', 'action' => 'view', $content['ContentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $content['Content']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $content['Content']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ctid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $content['Content']['ctid']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Content', true), array('action' => 'edit', $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Content', true), array('action' => 'delete', $content['Content']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Content Types', true), array('controller' => 'content_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Type', true), array('controller' => 'content_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
