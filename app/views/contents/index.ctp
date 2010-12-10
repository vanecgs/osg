<!-- Start: Blurb -->

<div class="blurb">
	<div class="fleft">
		<h1><?php echo $content['Content']['title']?></h1>
		<p><?php echo $content['Content']['content']?></p>
	</div>
	<div class="fright">
		<?php
			echo $html->image('pics/001.jpg', array('alt' => '001', 'width' => 200, 'height' => 242));
		?>
	</div>
	
	<hr class="clear" />
	
</div>

<!-- End: Blurb -->


<!-- Start: Search module -->
 
<div id="search"> 
<h2>Search <strong>over 3,000</strong> online degree programs from all <strong>the top online schools</strong> together.</h2> 
	<?php
		echo $form->create('Programs', array('action' => 'search'));
		echo $form->input('subjects', array('type' => 'select', 'label' => 'By Subject', 'div' => '', 'options' => $subject_opts));
		echo $form->input('degrees', array('type' => 'select', 'label' => 'By Degree', 'div' => '', 'options' => $degree_opts));
		echo $form->end(array('div' => array('class' => 'form_button')));
	?>
</div> 

<!-- End: Search module -->


<!-- Start: Program Table -->

<div id="program_table"> 
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
		<?php
			$c = 1;
			while($sub = current($subjects)):
				if($c-1 % 3 == 0) echo '<tr>';
		?>
			<td class="topR" width="33%">
				<div class="table_title">
					<?php echo $this->Html->link($sub['Subject']['name'], array('controller' => 'programs', 'action' => 'subject', $sub['Subject']['subid'])); ?>
				</div>
				<?php foreach($sub['SubjectSubs'] as $subs): ?>
					<?php echo $this->Html->link($subs['name'], array('controller' => 'programs', 'action' => 'subjectsub', $subs['ssid'])); ?>,
				<?php endforeach; ?>
			</td>
			<?php 
				if($c % 3 == 0) echo '</tr>';
				next($subjects); 
				$c++;
			?>
		<?php endwhile; ?>
</tbody>
</table>
</div>

<!-- End: Program Table -->


<!-- Start: Popular Schools module -->

<div id="schools"> 

<?php foreach($set as $s): ?>

<!-- Start: School Box -->

<div class="school_box"> 
	<div class="school_box_header">
		<h3><?php echo $s['School']['name']?></h3>
		<h5><?php echo $this->Html->link('LEARN MORE', array('controller' => 'schools', 
															'action' => 'info', 
															$s['School']['sid']));?></h5>
	</div>
	<div class="school_box_body">
		<div class="resume">
			<?php
				echo $html->image($s['School']['logo'], array('alt' => $s['School']['name'], 'width' => 120, 'height' => 60, 'url' => array('controller' => 'schools', 'action' => 'info', $s['School']['sid'])));
			?>
			<h4><?php echo $s['School']['punch']?></h4>
			<ul>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
			</ul>
			<span><?php echo $this->Html->link('See More School Programs >>', array('controller' => 'schools', 
															'action' => 'info', 
															$s['School']['sid']));?></span>
		</div>
		<div class="extract">
			<p><?php if(empty($s['School']['s_desc'])): echo substr($s['School']['description'],0,200).'...'; else: echo $s['School']['s_desc']; endif; ?></p>
			<?php echo $this->Html->link('See More School Programs >>', array('controller' => 'schools', 
															'action' => 'info', 
															$s['School']['sid']));?>
		</div>
		
		<hr class="clear" />
		
		<div class="school_table">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tbody>
					<!-- Start: File 1 -->
					<tr>
						<td class="topR">
							<h6>Schedule</h6>
						</td>
						<td class="topR">
							<h6>Faculty / Student Ratio</h6>
						</td>
						<td class="topR">
							<h6>Accredited</h6>
						</td>
						<td class="topR">
							<h6>Tuition</h6>
						</td>
						<td class="topR">
							<h6>Book Costs</h6>
						</td>
						<td class="topR">
							<h6>% Receiving Financial Aid</h6>
						</td>
					</tr>
					<!-- End: File 1 -->
					
					<!-- Start: File 2 -->
					<tr>
						<td>
							<p><?php if($s['School']['sched'] == -1): echo 'Unknown'; else: echo $s['School']['sched']; endif;?></p>
						</td>
						<td>
							<p><?php if(empty($s['School']['faculty'])): echo 'Unknown'; else: echo $s['School']['faculty']; endif;?></p>
						</td>
						<td>
							<p><?php echo ucwords($s['School']['accred']) ?></p>
						</td>
						<td>
							<p><?php if(empty($s['School']['tuition'])): echo 'Unknown'; else: echo '$'.$s['School']['tuition']; endif;?></p>
						</td>
						<td>
							<p><?php if(empty($s['School']['books'])): echo 'Unknown'; else: echo '$'.$s['School']['books']; endif;?></p>
						</td>
						<td>
							<p><?php if($s['School']['f_aid'] == -0.99): echo 'Unknown'; else: echo $s['School']['f_aid'].'%'; endif;?></p>
						</td>
					</tr>
					<!-- End: File 2 -->
				</tbody>
		 </table>
		</div>
	</div>
</div>

<!-- End: School Box -->

<?php endforeach; ?>

</div>

<!-- End: Popular Schools module -->
