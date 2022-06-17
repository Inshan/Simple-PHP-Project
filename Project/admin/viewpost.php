<?php
session_start();
if(!isset($_SESSION['username'])){
	header ('location:index.php');
}
	include '../connection.php';
	include 'includes/header.php';
	include 'includes/navigation.php';
?>	
<div class="content">
	<table cellspacing="20" border ="2 px" cellpadding="1">
		<thead>
			<th>Id</th>
			<th>Title</th>
			<th>Author</th>
			<th>Keyword</th>
			<th>Image</th>
			<th>Content</th>
			<th>Date</th>
		</thead>
		<?php 
				$query = "select * from posts order by author";
				$squery = mysqli_query($con, $query);
				$i = 1;
				while($loop = mysqli_fetch_array($squery)){
						
		?>
		<tbody>
			<tr>
				<td>
					<?php echo $i++; ?>
				</td>
				<td>
					<?php echo $loop[1]; ?>
				</td>
				<td>
					<?php echo $loop[2]; ?>
				</td>
				<td>
					<?php echo $loop[3]; ?>
				</td>
			
				<td>
					<img src="../image/<?php echo $loop[4]; ?>" height = "100" width="100"/>
				</td>
				<td>
					<?php echo $loop[5]; ?>
				</td>
				<td>
					<?php echo $loop[6]; ?>
				</td>
				<td>
					<a href="updateposts.php?id=<?php echo $loop[0]; ?>">Update</a>
				</td>
				<td>
					<a href="deletepost.php?id=<?php echo $loop[0] ?>">Delete</a>
				</td>
			</tr>
		</tbody>
		<?php } ?>
	</table>
</div>