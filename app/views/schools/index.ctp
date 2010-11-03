<h1>Colleges and Universities</h1>
<p>The reputation of the school you choose to attend is paramount. Every school on our site can be investigated by clicking on the links below. You can find information on the history and programs of each school as well as request free information packets from the online university or online college of your choice. We also have links to student reviews on the right so you can see what students have been saying about their experience with online colleges.</p>

<div class="box">
	<?php foreach($alphabet as $letter):?>
	<h3><?php echo $letter['letter'];?></h3>
	<ul>
		<?php foreach($letter[0] as $school): ?>
			<li><?php echo $school['School']['name'] ?></li>
		<?php endforeach; ?>
	</ul>
	<?php endforeach;?>
</div>