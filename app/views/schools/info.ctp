
<div id="content" class="internal">

<!-- Start: Column A -->
 
<div class="col_a">

<h1><?php echo $school['School']['name']?></h1>

<p><?php echo $school['School']['description']?></p>

<?php foreach($degreestype as $degree): ?>

<h3><?php echo $degree['DegreeType']['name'] ?></h3>

<ul>
	<?php foreach($programs as $program): ?>
	<?php if($program['Program']['dtid'] == $degree['DegreeType']['dtid']): ?>
	<li><?php echo $program['Program']['name']?></li>
	<?php endif; endforeach; ?>
</ul>

<?php endforeach;?>

<?php if(!empty($school['School']['accred_by'])): ?>
<h2>Accrediting Agency</h2>
<ul><li><?php echo $school['School']['accred_by']?></li></ul>
<?php endif;?>

</div>

<!-- End: Column A -->


<!-- Start: Column B -->

<div id="dialog" title="Basic dialog">
	<div id="dialog-content"><p>Login or register to load your personal information or close the window and manually fill all the fields in the form.</p></div>
</div>

 
<div class="col_b">
		<?php
			if(!empty($school['School']['image'])):
				echo $html->image($school['School']['image'], array('alt' => $school['School']['name'], 'class' => 'logo', 'width' => 311, 'height' => 80, 'align' => 'middle' ,'url' => $school['School']['url']));			
			endif;
			
			if(!empty($dform)):
		?>
				
		<h2>Request Information Form</h2>
		
		<p>Please fill out the form below to get more information about the programs offered by University of Phoenix - Business.</p>
		
		
		<?php
			echo $this->Form->create(null, array('default' => false)); 
			
			foreach($dform['FormSpec']['FormPages']['FormPage']['Section']['Field'] as $field):
			
				
				
				switch($field['type']) {
					case 'TEXT':
						echo '<label>'.$field['label'].'</label>';
						echo '<input type="text" id="'.$field['name'].'" name="'.$field['name'].'">';
						break;
					case 'SELECT':
						echo '<label>'.$field['label'].'</label>';
						echo '<select style="width:250px" id="'.$field['name'].'" name="'.$field['name'].'">';
						
						if($field['Options']['Option']):
							foreach($field['Options']['Option'] as $option):
								echo '<option value="'.$option['value'].'">'.$option['name'].'</option>';
							endforeach;
						elseif($field['Programs']['Program']):
							foreach($field['Programs']['Program'] as $option):
								echo '<option value="'.$option['programSubmitValue'].'">'.$option['lpProgramName'].'</option>';
							endforeach;
						endif;
						
						echo '</select>';
						break;
					case 'HIDDEN':
						echo '<input type="hidden" id="'.$field['name'].'" name="'.$field['name'].'" value="'.$field['defaultValue'].'">';
						break;
				}	
			
			endforeach;
			echo '<input type="hidden" id="SCHOOL_ID" name="SCHOOL_ID" value="'.$school['School']['sid'].'">';
			echo $this->Form->end(array('label' => 'Request Information','value' => 'Request Information', 'id' => 'post-lead','div' => array('class' => 'button'))); 
			
			endif;
		?>
	</form> 

</div>

<!-- End: Column B -->

<hr class="clear" />

</div>

