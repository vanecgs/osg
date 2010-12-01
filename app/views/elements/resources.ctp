<div class="box"> 
	<h3>Resources</h3> 
	<ul> 
		<?php
			$c = 0;
			while($sub = current($resource_list)):
				if($c % 2 == 0): echo '<li class="odd">'; else: echo '<li>'; endif;
				echo $this->Html->link($sub['Content']['title'], array('controller' => '', 'action' => 'resources', $sub['Content']['id']));
				next($resource_list);
				$c++;
				echo '</li>';
			endwhile;
		?>
	</ul> 
</div> 