<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
	include '../connection.php';
	include 'includes/header.php';
	include 'includes/navigation.php';
?>

<div class="content">
	<table>
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Username</th>
			<th>Password</th>
			<th>Address</th>
			<th>Email</th>
		</thead>
		<tbody>
			<?php
				$query = "select * from users order by username";
				$squery = mysqli_query($con, $query);
				$i = 1;
				while($uquery = mysqli_fetch_array($squery)){;
			?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $uquery[1]; ?></td>
				<td><?php echo $uquery[2]; ?></td>
				<td><?php echo $uquery[3]; ?></td>
				<td><?php echo $uquery[4]; ?></td>
				<td><?php echo $uquery[5]; ?></td>
				<td><?php echo $uquery[6]; ?></td>
				<td><a href="updateusers.php?id=<?php echo $uquery[0];?>">Update</a></td>
				<td><a href="deleteusers.php?id=<?php echo $uquery[0];?>">Delete</a></td>
			</tr><?php } ?>
		</tbody>
	</table>
</div>
