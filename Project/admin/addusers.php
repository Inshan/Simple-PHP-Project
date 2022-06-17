<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
	include '../connection.php';
	include 'includes/header.php';
	include 'includes/navigation.php';
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$query = "insert into users (name, gender, username, password, address, email) values ('$name', '$gender', '$username', '$password', '$address', '$email')";
	$squery = mysqli_query($con, $query);
	header('location:viewusers.php');	
}
?>
<div class= "content">
	<form method = "POST">
		Name:<input type="text" name="name"><br/>
		Gender:<input type="text" name="gender"><br/>
		Username:<input type="text" name="username"><br/>
		Password:<input type="text" name="password"><br/>
		Address:<input type="text" name="address"><br/>
		Email:<input type="text" name="email"><br/>
		<input type="submit" name="submit" value="submit">
	</form>
</div>	
<?php
	include 'includes/footer.php';
?>