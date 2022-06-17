<?php
//session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
?>
<div class="container">
<div class="navigation">
	<ul>
		<li>WELCOME <?php echo $_SESSION['username'] ?></li>
		<li><a href="addpost.php">Add Posts</a></li>
		<li><a href="viewpost.php">View Posts</a></li>
		<li><a href="addusers.php">Add Users</a></li>
		<li><a href="viewusers.php">View Users</a></li>
		<li><a href="logout.php">Log Out</a></li>
	</ul>
</div>