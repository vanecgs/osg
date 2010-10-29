<div class="box"> 
    <h3>Subjects</h3> 
    <ul> 
		<?php
			$c = 0;
			while($sub = current($subjects)):
				if($c % 2 == 0): echo '<li class="odd">'; else: echo '<li>'; endif;
				echo $this->Html->link($sub['Subject']['name'], array('controller' => 'programs', 'action' => 'subject', $sub['Subject']['subid']));
				next($subjects);
				$c++;
				echo '</li>';
			endwhile;
		?>
    </ul> 
</div> 