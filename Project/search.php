<?php
include('connection.php');
	include 'includes/frontend_header.php';
	?>
	<div class="content">
	<?php
	if(isset($_GET['search'])){
		$search_author = $_GET['search'];
		$search_title=$_GET['search'];
		$search_query = "Select * from posts where author like '%$search_author%' or title like '%$search_title%' ";
		$search_result = mysqli_query($con, $search_query);
		while($row = mysqli_fetch_array($search_result)){	
	?>

	<ul style="list-style:none; font-family:'Courier New', Courier, monospace; color:#999999; border:solid 5px #000033;"><?php echo $row[6]; ?></li>
	<li><?php echo $row[1]; ?></li>
	<li><?php echo $row[2]; ?></li>
	<li><?php echo $row[3]; ?></li>
	<li><img src = "image/<?php echo $row[4]; ?>" height= "100px" width="150px"/></li>
	<li><?php echo $row[5]; ?></li>
	</ul>
	
	<?php
	}
	}
	?>
	</div>
	
	<?php
	include 'includes/frontend_navigation.php';	
	include 'includes/frontend_footer.php';
?>