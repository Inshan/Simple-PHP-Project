<?php
	session_start();
	include '../connection.php';
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username!="" && $password!=""){
			$sql = "select * from users where username = '$username' and password = '$password' ";
			echo $sql;
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res)==0){
				echo "incorrect username or password";
			}else{
				$_SESSION['username']=$_POST['username'];
				header('location:dashboard.php');
			}
		}	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="login">
	<form method = "POST">
		Username:<input type="text" name="username">
		Password:<input type="password" name="password">
		<input type="submit" name="submit" value = "Submit">
		<input type="reset" value="Reset">
	</form>
</div>
</body>
</html>
