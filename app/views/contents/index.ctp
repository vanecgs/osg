<!-- Start: Blurb -->

<div class="blurb">
	<div class="fleft">
		<h1>Connecting You With The Right Online School</h1>
		<p>Guide To Online Schools is an online education directory that specializes in online degrees, online schools, and distance learning. We help <strong>thousands of adult students</strong> find the best online schools, online colleges, and online universities with the best degrees and distance learning programs. Please be sure to visit our online school reviews to find feedback from real students at accredited online universities.</p>
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
<h3>Most Popular Schools</h3> 

<!-- Start: School Box -->

<div class="school_box"> 
	<div class="school_box_header">
		<h3>School Title</h3>
		<h5><a href="#">Learn More</a></h5>
	</div>
	<div class="school_box_body">
		<div class="resume">
			<a href="#"><img src="pics/ai_institute.gif" alt="ai_institute" width="90" height="90" /></a>
			<h4>School slogan</h4>
			<ul>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
			</ul>
			<span><a href="#">See More School Programs &raquo;</a></span>
		</div>
		<div class="extract">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			<a href="#">See More School Programs &raquo;</a>
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

<!-- End: School Box -->


<!-- Start: School Box -->

<div class="school_box"> 
	<div class="school_box_header">
		<h3>School Title</h3>
		<h5><a href="#">Learn More</a></h5>
	</div>
	<div class="school_box_body">
		<div class="resume">
			<a href="#"><img src="pics/ai_institute.gif" alt="ai_institute" width="90" height="90" /></a>
			<h4>School slogan</h4>
			<ul>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
			</ul>
			<span><a href="#">See More School Programs &raquo;</a></span>
		</div>
		<div class="extract">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			<a href="#">See More School Programs &raquo;</a>
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

<!-- End: School Box -->


<!-- Start: School Box -->

<div class="school_box"> 
	<div class="school_box_header">
		<h3>School Title</h3>
		<h5><a href="#">Learn More</a></h5>
	</div>
	<div class="school_box_body">
		<div class="resume">
			<a href="#"><img src="pics/ai_institute.gif" alt="ai_institute" width="90" height="90" /></a>
			<h4>School slogan</h4>
			<ul>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
				<li><a href="#">Certificate 1</a></li>
			</ul>
			<span><a href="#">See More School Programs &raquo;</a></span>
		</div>
		<div class="extract">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			<a href="#">See More School Programs &raquo;</a>
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

<!-- End: School Box -->

</div>

<!-- End: Popular Schools module -->
