<?php echo $form->create(false, array('type' => 'file')); ?>
<?php echo $form->file('xml'); ?>
<?php echo $form->end('Finish'); ?>

<?php 
foreach($xml as $brand):
	//print_r($brand);
endforeach;
?>

</form>
