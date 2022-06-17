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
		$query = "select * from posts where id = $id";
		$squery = mysqli_query($con, $query);
		$uquery = mysqli_fetch_array($squery);
		if(isset($_POST['submit'])){
			$title = $_POST['title'];
			$author = $_POST['author'];
			$keyword = $_POST['keyword'];
			$content = mysqli_escape_string($con, $_POST['content']);
			$date = $_POST['date'];
			$img_tmp = $_FILES['image']['tmp_name'];
			$image = $_FILES['image']['name'];
			$img_size = $_FILES['image']['size'];
			$imgext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg','png','gif','bmp','jpg');
			$userpic = "img_".rand(1000,100000).".".$imgext;
			if($image){
				if(in_array($imgext, $valid_extensions)){
					if($img_size<50000000)
					{
						move_uploaded_file($img_tmp, "../image/$userpic");
						$query ="update posts set title='$title', author = '$author', keyword = '$keyword', image = '$userpic', content='$content', date = '$date' where id = $id";
						echo $query;
						mysqli_query($con, $query);
					}else{
						echo 'The image size is too large';
					}
				}else{
				echo 'Sorry! Only jpeg, jpg, bmp, png and gif extensions supported.';
				}
			}else{
			$sql = "select image from posts where id = $id";
			$res = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($res);
			$userpic = $row[0];
			$query ="update posts set title='$title', author = '$author', keyword = '$keyword', image = '$userpic', content='$content', date = '$date' where id = $id";
			mysqli_query($con, $query);
		}
		header('location:viewpost.php');
	}
}

	
?>
<div class = "content">
<form method = "POST" enctype="multipart/form-data">
	Title:<input type = "text" value="<?php echo $uquery[1]; ?>" name="title"/><br/>
	Author:<input type = "text" value="<?php echo $uquery[2]; ?>"  name="author"/><br/>
	Keyword:<input type = "text" value="<?php echo $uquery[3]; ?>" name="keyword"/><br/>
	Image:<input type="file" name="image"/><br/>
	Content:<textarea name="content" > <?php echo $uquery[5]; ?></textarea><br/>
	Date:<input type="date" name="date" value="<?php echo $uquery[6]; ?>" />
	Submit:<input type="submit" name="submit" value="Submit">
</form>
</div>