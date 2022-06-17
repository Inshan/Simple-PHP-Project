<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
	include 'includes/header.php';
	include 'includes/navigation.php';?>
	
	<div class="content">
		This is Admin's Panel. You have entered in the backend zone.
	</div>
	</div>
	
	<?php
	include 'includes/footer.php';
	
?>
