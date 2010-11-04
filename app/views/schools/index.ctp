<div class="blurb">
	<div class="fleft">
		<h1>Colleges and Universities</h1>
<p>The reputation of the school you choose to attend is paramount. Every school on our site can be investigated by clicking on the links below. You can find information on the history and programs of each school as well as request free information packets from the online university or online college of your choice. We also have links to student reviews on the right so you can see what students have been saying about their experience with online colleges.</p>
	</div>
	
	<hr class="clear" />
	
</div>


<div id="online_schools"> 

	<div class="alphabetical">
		<a href="#A">A</a> | <a href="#B">B</a> | <a href="#C">C</a> | <a href="#D">D</a> | <a href="#E">E</a> | <a href="#F">F</a> | <a href="#G">G</a> | <a href="#H">H</a> | <a href="#I">I</a> | <a href="#J">J</a> | <a href="#K">K</a> | <a href="#L">L</a> | <a href="#M">M</a> | <a href="#N">N</a> | <a href="#O">O</a> | <a href="#P">P</a> | <a href="#Q">Q</a> | <a href="#R">R</a> | <a href="#S">S</a> | <a href="#T">T</a> | <a href="#U">U</a> | <a href="#V">V</a> | <a href="#W">W</a> | <a href="#X">X</a> | <a href="#Y">Y</a> | <a href="#Z">Z</a>
	</div>


	
	
	
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tbody>
		<tr>
			<td width="" valign="top" background="#A" class="intro">
      			<div id="listings">
				
					<?php foreach($alphabet as $letter):?>
					
						<!-- Start: List A -->
						
						<div class="ltitle"><strong><a id="<?php echo $letter['letter'];?>" name="<?php echo $letter['letter'];?>"/><?php echo $letter['letter'];?></a></strong></div>
							<table width="100%" cellspacing="0" cellpadding="3" border="0">
								<tbody>
									<?php foreach($letter[0] as $school): ?>
										<tr><td>
											<?php echo $this->Html->link($school['School']['name'], array('controller' => 'schools', 'action' => 'info', $school['School']['sid']));?>
										</tr></td>
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