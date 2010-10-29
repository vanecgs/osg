<div class="box"> 
	<h3>Related Schools</h3> 
	<ul>
		<?php 
		$c = 0;
		foreach($subject['SubjectSubs'] as $sub) {
			if($c % 2 == 0): echo '<li class="odd">'; else: echo '<li>'; endif;
			echo $this->Html->link($sub['name'], array('controller' => 'programs', 'action' => 'subject', $sub['subid']));
			$c++;
			echo '</li>';
		}
		?>
	</ul> 
</div> 
