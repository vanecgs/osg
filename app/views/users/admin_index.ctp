<div class="users index">
	<h2><?php __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cid');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state_code');?></th>
			<th><?php echo $this->Paginator->sort('zip');?></th>
			<th><?php echo $this->Paginator->sort('tel1');?></th>
			<th><?php echo $this->Paginator->sort('tel2');?></th>
			<th><?php echo $this->Paginator->sort('tel3');?></th>
			<th><?php echo $this->Paginator->sort('call_time');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('begin_time');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('ip_address');?></th>
			<th><?php echo $this->Paginator->sort('ts');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('visit_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['cid']; ?>&nbsp;</td>
		<td><?php echo $user['User']['first_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['last_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['address']; ?>&nbsp;</td>
		<td><?php echo $user['User']['city']; ?>&nbsp;</td>
		<td><?php echo $user['User']['state_code']; ?>&nbsp;</td>
		<td><?php echo $user['User']['zip']; ?>&nbsp;</td>
		<td><?php echo $user['User']['tel1']; ?>&nbsp;</td>
		<td><?php echo $user['User']['tel2']; ?>&nbsp;</td>
		<td><?php echo $user['User']['tel3']; ?>&nbsp;</td>
		<td><?php echo $user['User']['call_time']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['begin_time']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
		<td><?php echo $user['User']['ip_address']; ?>&nbsp;</td>
		<td><?php echo $user['User']['ts']; ?>&nbsp;</td>
		<td><?php echo $user['User']['status']; ?>&nbsp;</td>
		<td><?php echo $user['User']['visit_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['cid'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['cid'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['cid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['cid'])); ?>
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
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
	</ul>
</div>