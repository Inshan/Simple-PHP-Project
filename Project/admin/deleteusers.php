<?php
include '../connection.php';
include 'includes/header.php';
include 'includes/navigation.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "delete from users where id = $id";
	mysqli_query($con, $query);
	header('location:viewusers.php');
}
?>