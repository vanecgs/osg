<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Start: Head -->

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Online School Go</title>
 <meta name="description" content="" />
 <meta name="keywords" content="" />
 <?php
 	echo $html->meta('icon');
 	echo $html->css('print.css');
 	echo $html->css('reset.css');
	echo $html->css('style.css');
	
	if(!empty($javascript)):
		echo $javascript->link('jquery.js');
		echo $javascript->link('jquery-ui.js');
		echo $javascript->link('custom.js');
	endif;
	Configure::load('osg');
 ?> 
</head>

<!-- End: Head -->


<!-- Start: Body -->

<body>

<!-- Start: Wrapper -->

<div id="wrapper"> 

<!-- Start: Header -->
 
<div id="header"> 
	<?php
		echo $html->image('pics/osg_logo.png', array('alt' => 'Online School Go', 'class' => 'logo', 'width' => 134, 'height' => 64, 'url' => '/'));
	?>
	<h2>Lots of Schools, Find yours!</h2>
</div>

<!-- End: Header -->

<!-- Start: Navigation Bar -->
<?php echo $this->element('topmenu'); ?>
<!-- End: Navigation Bar -->

<!-- Start: Content -->

<div id="content">

<!-- Start: Column A -->
 
<div class="col_a"> 
 
	<h3><a href="/onlineschool/schools/">Online Schools</a></h3> 
	<h3><a href="/onlineschool/degrees/">Online Degrees</a></h3> 
 
	<?php echo $this->element('subjectmenu'); ?>
 
	<?php echo $this->element('degreemenu'); ?>
	
	<?php echo $this->element('resources'); ?>

</div>

<!-- End: Column A -->


<!-- Start: Column B -->
 
<div class="col_b">

<?php echo $content_for_layout ?>

</div>

<!-- End: Column B -->

<hr class="clear" />

</div>

<!-- End: Content -->

<!-- Start: Footer -->

<div id="footer">
	<p>&copy; OnlineSchoolGo.com 2010 <a href="#">Contact Us</a> | <a href="#">Privacy Policy</a></p>
</div>

<!-- End: Footer -->

</div>

<!-- End: Wrapper -->
	<?php echo $this->element('sql_dump'); ?>

</body>

<!-- End: Body -->
 
</html> 