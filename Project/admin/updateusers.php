<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
	include '../connection.php';
	include 'includes/header.php';
	include 'includes/navigation.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "select * from users where id = $id";
	$squery = mysqli_query($con, $query);
	$uquery = mysqli_fetch_array($squery);
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$query ="update users set name='$name', gender = '$gender', username = '$username', password = '$password', address='$address', email = '$email' where id = $id";
			mysqli_query($con, $query);
			header('location:viewusers.php');
	
		}
	
}		
?>
<div class = "content">
<form method = "POST">
	Name:<input type = "text" value="<?php echo $uquery[1]; ?>" name="name"/><br/>
	Gender:<input type = "text" value="<?php echo $uquery[2]; ?>"  name="gender"/><br/>
	Username:<input type = "text" value="<?php echo $uquery[3]; ?>" name="username"/><br/>
	Password:<input type="text" value = "<?php echo $uquery[4]; ?>" name="password"/><br/>
	Address:<input type="text" value = "<?php echo $uquery[5]; ?>" name="address"/><br/>
	Email:<input type="date" name="date" value="<?php echo $uquery[6]; ?>" />
	Submit:<input type="submit" name="submit" value="submit">
</form>
</div>
<?php include 'includes/footer.php' ?>