<?php
include '../connection.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "select * from posts where id = $id";
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($res);
	$query = "delete from posts where id = $id";
	echo $query;
	mysqli_query($con, $query);
		unlink("../image/$row[5]");
	header('location:viewpost.php');
}
?>