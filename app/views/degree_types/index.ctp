<div class="blurb">
	<div class="fleft">
		<h1>Degrees and Degree Programs</h1>
<p>To see a list of schools offering the online degree you are interested in, click on the subject you would like to pursue. Not sure what online degree program you're interested in? Each page has the resources you need to discover if that online college degree path is right for you. Not only will this facilitate your online schools search, but it will expose you to other jobs in your field of interest.</p>
	</div>
	
	<hr class="clear" />
	
</div>


<div id="online_schools"> 

	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
		<tr>
			<td width="" valign="top" background="#A" class="intro">
      			<div id="listings">
					<!-- Start: List A -->
					
					<div class="ltitle"><strong><a href="#">Degree Programs</a></strong></div>
						<table width="100%" cellspacing="0" cellpadding="3" border="0">
							<tbody>
								<?php foreach($degrees as $degree): ?>
									<tr>
										<td width="25%">
										<?php echo $this->Html->link($degree['DegreeType']['name'], array('controller' => 'programs', 'action' => 'degree', $degree['DegreeType']['dtid']));?>
										</td>
										<td><?php 
											echo substr($degree['DegreeType']['description'], 0, 200)."...\t"; 
											echo $this->Html->link('Read More', array('controller' => 'programs', 'action' => 'degree', $degree['DegreeType']['dtid']));
										?></td>
									</tr
								<?php endforeach; ?>			  
							</tbody>
						</table>
						
					<!-- End: List A -->
					
					<?php foreach($subjects as $subject): ?>
						<!-- Start: List A -->
						
						<div class="ltitle"><strong><a href="#"><?php echo $subject['Subject']['name']?></a></strong></div>
							<table width="100%" cellspacing="0" cellpadding="3" border="0">
								<tbody>
									<?php foreach($subject['SubjectSubs'] as $subjectsub): ?>
										<tr>
											<td width="25%">
											<?php echo $this->Html->link($subjectsub['name'], array('controller' => 'programs', 'action' => 'subjectsub', $subjectsub['ssid']));?>
											</td>
											<td><?php 
												echo substr($subjectsub['description'], 0, 150)."...\t"; 
												echo $this->Html->link('Read More', array('controller' => 'programs', 'action' => 'subjectsub', $subjectsub['ssid']));
											?></td>
										</tr
									<?php endforeach; ?>			  
								</tbody>
							</table>
							
						<!-- End: List A -->
					<?php endforeach;?>
					
				</div>
        	</td>
		</tr>
	</tbody>
</table>

	
</div>