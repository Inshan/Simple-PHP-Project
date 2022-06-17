<?php
	include 'includes/frontend_header.php';
	
	?>
	<div class="content">
	<?php 
		include 'connection.php'; 
		if(isset($_GET['id'])){
		$id= $_GET['id'];
		$query = "Select * from posts where id=$id";
		$squery = mysqli_query($con, $query);
		$uquery = mysqli_fetch_array($squery);
	?>
			<ul style="list-style:none; font-family:'Courier New', Courier, monospace; color:#999999; border:solid 5px #000033;"><?php echo $uquery[6]; ?></li>
				<li><?php echo $uquery[1]; ?></li>
				<li><?php echo $uquery[2]; ?></li>
				<li><?php echo $uquery[3]; ?></li>
				<li><img src = "image/<?php echo $uquery[4]; ?>" height= "100px" width="150px"/></li>
				<li><?php echo $uquery[5]; ?></li>
			</ul>
		<?php }?>
</div>

	<?php

	include 'includes/frontend_navigation.php';
	include 'includes/frontend_footer.php';
?>