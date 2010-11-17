<!-- Start: Blurb -->

<div class="blurb">
	<div class="fleft">
		<h1><?php echo $subjectsub['SubjectSub']['name']?></h1>
		<p><?php echo $subjectsub['SubjectSub']['description']?></p>
	</div>
	
	
	<hr class="clear" />
	
</div>

<!-- End: Blurb -->


<!-- Start: Popular Schools module -->

<div id="schools"> 
<h3>Results</h3> 

<!-- Start: School Box -->

<?php if($schools): ?>
<?php foreach($schools as $school): ?>
<div class="school_box"> 
	<div class="school_box_header">
		<h3><?php echo $school['School']['name']?></h3>
		<h5><?php echo $this->Html->link('LEARN MORE', array('controller' => 'schools', 
															'action' => 'info', 
															$school['School']['sid'],
															$subjectsub['Subject']['subid']));?></h5>
	</div>
	<div class="school_box_body">
		<div class="resume">
			<?php
				echo $html->image($school['School']['logo'], array('alt' => $school['School']['name'], 'width' => 120, 'height' => 60, 'url' => array('controller' => 'schools', 'action' => 'info', $school['School']['sid'], $subjectsub['Subject']['subid'])));
			?>
			<h4><?php echo $school['School']['punch']?></h4>
			<ul>
			<?php foreach($programs as $program): 
					if($program['Programs']['sid'] == $school['School']['sid']):
			?>
				<li><a><?php echo $program['Programs']['name']?></a></li>
			<?php endif; endforeach; ?>
			</ul>
			<span><?php echo $this->Html->link('See More School Programs >>', array('controller' => 'schools', 
															'action' => 'info', 
															$school['School']['sid'],
															$subjectsub['Subject']['subid']));?></span>
		</div>
		<div class="extract">
			<p><?php if(empty($school['School']['s_desc'])): echo substr($school['School']['description'],0,200).'...'; else: echo $school['School']['s_desc']; endif; ?></p>
			<?php echo $this->Html->link('See More School Programs >>', array('controller' => 'schools', 
															'action' => 'info', 
															$school['School']['sid'],
															$subjectsub['Subject']['subid']));?>
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
							<p>Quarter</p>
						</td>
						<td>
							<p>Unknown</p>
						</td>
						<td>
							<p>YES</p>
						</td>
						<td>
							<p>$28,380/yr.</p>
						</td>
						<td>
							<p>Unknown</p>
						</td>
						<td>
							<p>80%</p>
						</td>
					</tr>
					<!-- End: File 2 -->
				</tbody>
		 </table>
		</div>
	</div>
</div>

<?php endforeach;?>
<?php else:?>
	<h2>No results found.</h2>
<?php endif;?>
<!-- End: School Box -->


</div>

<!-- End: Popular Schools module -->
