<div class="box"> 
	<h3>Degree programs</h3> 
	<ul>
		<?php
			$c = 0;
			while($degree = current($degrees)):
				if($c % 2 == 0): echo '<li class="odd">'; else: echo '<li>'; endif;
				echo $this->Html->link($degree['DegreeType']['name'], array('controller' => 'programs', 'action' => 'degree', $degree['DegreeType']['dtid']));
				next($degrees);
				$c++;
				echo '</li>';
			endwhile;
		?>
	</ul> 
</div> 