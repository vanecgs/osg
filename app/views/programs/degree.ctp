<!-- Start: Blurb -->

<div class="blurb">
	<div class="fleft">
		<h1><?php echo $degree['DegreeType']['name']?></h1>
		<p><?php echo $degree['DegreeType']['description']?></p>
	</div>
	<div class="fright">
		
		<?php //echo $this->element('relschools'); ?>
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
															$school['School']['sid']));?></h5>
	</div>
	<div class="school_box_body">
		<div class="resume">
			<?php
				echo $html->image($school['School']['logo'], array('alt' => $school['School']['name'], 'width' => 120, 'height' => 60, 'url' => array('controller' => 'schools', 'action' => 'info', $school['School']['sid'])));
			?>
			<h4><?php echo $school['School']['punch']?></h4>
			<ul>
				<?php foreach($dtschools as $dt):?>
					<?php if($dt['Programs']['sid'] == $school['School']['sid']):?>
						<?php foreach($dt['SubjectSubs'] as $p): ?>
							<li><a><?php echo $p['name']?></a></li>
						<?php endforeach;?>
					<?php endif;?>
				<?php endforeach;?>
			</ul>
			<span><?php echo $this->Html->link('See More School Programs >>', array('controller' => 'schools', 
															'action' => 'info', 
															$school['School']['sid']));?></span>
		</div>
		<div class="extract">
			<p><?php if(empty($school['School']['s_desc'])): echo substr($school['School']['description'],0,200).'...'; else: echo $school['School']['s_desc']; endif; ?></p>
			<?php echo $this->Html->link('See More School Programs >>', array('controller' => 'schools', 
															'action' => 'info', 
															$school['School']['sid']));?>
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
							<p><?php if($school['School']['sched'] == -1): echo 'Unknown'; else: echo $school['School']['sched']; endif;?></p>
						</td>
						<td>
							<p><?php if(empty($school['School']['faculty'])): echo 'Unknown'; else: echo $school['School']['faculty']; endif;?></p>
						</td>
						<td>
							<p><?php echo ucwords($school['School']['accred']) ?></p>
						</td>
						<td>
							<p><?php if(empty($school['School']['tuition'])): echo 'Unknown'; else: echo '$'.$school['School']['tuition']; endif;?></p>
						</td>
						<td>
							<p><?php if(empty($school['School']['books'])): echo 'Unknown'; else: echo '$'.$school['School']['books']; endif;?></p>
						</td>
						<td>
							<p><?php if($school['School']['f_aid'] == -0.99): echo 'Unknown'; else: echo $school['School']['f_aid'].'%'; endif;?></p>
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
