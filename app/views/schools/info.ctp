
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
 
<div class="col_b">
	<form action="" method="post">
		<?php
			if(!empty($school['School']['image'])):
				echo $html->image($school['School']['image'], array('alt' => $school['School']['name'], 'class' => 'logo', 'width' => 311, 'height' => 80, 'align' => 'middle' ,'url' => $school['School']['url']));
			endif;
		?>
				
		<h2>Request Information Form</h2>
		
		<p>Please fill out the form below to get more information about the programs offered by University of Phoenix - Business.</p>
		
		<label>Label</label>
		<input type="text" name="" />
		<label>Label</label>
		<input type="hidden" name="" />
			<select name="program"> 
				<option value=""> - Select - </option> 
				<option value="">Option 1</option> 
				<option value="">Option 2</option>  
 				<option value="">Option 3</option>
 				<option value="">etc.</option> 
 			</select> 
		<label>Label</label>
		<input type="hidden" name="" />
			<select name="degree">
				<option value=""> - Select - </option> 
				<option value="">Option 1</option> 
				<option value="">Option 2</option>  
 				<option value="">Option 3</option>
 				<option value="">etc.</option> 
 			</select>
 		<label>Label</label>
		<input type="text" name="" />
 		<label>Label</label>
 		<textarea cols="60">Message here</textarea>
 		<input type="submit" name="Submit" value="Request information &raquo;" />
	</form> 

</div>

<!-- End: Column B -->

<hr class="clear" />

</div>

