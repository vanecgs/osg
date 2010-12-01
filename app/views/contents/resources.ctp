<!-- Start: Blurb -->
<?php if(!$id): ?>
<div class="blurb">
	<div class="fleft">
		<h1><?php echo $resource['Content']['title']?></h1>
		<p><?php echo $resource['Content']['content']?></p>
	</div>
	
	<hr class="clear" />
	
	<div class="resource_list">
		<ul>
		<?php foreach($resources as $r): ?>
			<li><?php echo $this->Html->link($r['Content']['title'], array('controller' => '', 'action' => 'resources', $r['Content']['id']));?></li>
		<?php endforeach; ?>
		</ul>
	</div

</div>
<?php else:?>
<div>
	<h1><?php echo $resource['Content']['title']?></h1>
	<p><?php echo $resource['Content']['content']?></p>
</div>
<?php endif; ?>
<!-- End: Blurb -->