
<div id="content" class="internal">

<!-- Start: Column A -->
 
<div class="col_a">

<h1><?php echo $school['School']['name']?></h1>

<p><?php echo $school['School']['description']?></p>

<?php foreach($degreestype as $degree): ?>

<h3><?php echo $degree['DegreeType']['name'] ?></h3>

<ul>
	<li>List item 1</li>
	<li>List item 2</li>
	<li>List item 3</li>
	<li>List item 4</li>
	<li>List item 5</li>
</ul>

<?php endforeach;?>


<h2>Accrediting Agency</h2>

<h4>Main title Heading 4</h4>

<ul>
	<li><a href="#">link 1</a></li>
	<li><a href="#">link 1</a></li>
	<li><a href="#">link 1</a></li>
	<li><a href="#">link 1</a></li>
	<li><a href="#">link 1</a></li>
</ul>

<h5>Main title Heading 5</h5>

<p>Lorem ipsum dolor <em>sit amet</em>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <a href="#">quis nostrud exercitation ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint <strong>occaecat cupidatat non proident</strong>, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<h6>Main title Heading 6</h6>

<p>Lorem ipsum dolor <em>sit amet</em>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <a href="#">quis nostrud exercitation ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint <strong>occaecat cupidatat non proident</strong>, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


</div>

<!-- End: Column A -->


<!-- Start: Column B -->
 
<div class="col_b">
	<form action="" method="post">
		
		<img src="pics/uop.gif" alt="uop" width="311" height="80" align="middle" />
		
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

