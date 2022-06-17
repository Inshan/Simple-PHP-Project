<?php
session_start();
if(!isset($_SESSION['username'])){
	header ('location:index.php');
}
	include '../connection.php';
	include 'includes/header.php';
	include 'includes/navigation.php';
	if(isset($_POST['submit'])){
		$title= $_POST['title'];
		$author = $_POST['author'];
		$keyword = $_POST['keyword'];
		$content = $_POST['content'];
		$date = $_POST['date'];
		$img_tmp = $_FILES['image']['tmp_name'];		
		$image = $_FILES['image']['name'];				
		$img_size = $_FILES['image']['size'];			
		$imgext = strtolower(pathinfo($image, PATHINFO_EXTENSION));		
	$valid_extensions = array('jpeg','jpg','bmp','png','gif');	
	$userpic = "img_".rand(1000,1000000).".".$imgext;		
	if($image){
		if(in_array($imgext,$valid_extensions))		
		{	
			if($img_size<50000000)
			{
				move_uploaded_file($img_tmp,"../image/$userpic"); 	
				$query = "insert into posts(title, author, keyword, image, content, date) values ('$title','$author','$keyword','$userpic', '$content','$date')";
			mysqli_query($con, $query);
			header('location:viewpost.php');
			}else{
				echo 'The image size too large.';
			}
		}else{
			echo 'Sorry! Only jpeg, jpg, bmp, png and gif extensions supported.';
		}
	}else{
		$query = "insert into posts(title, author, keyword, image, content, date) values ('$title','$author','$keyword','$userpic', '$content','$date')";
	echo $query;
	$storequery = mysqli_query($con, $query);
	/*if($storequery){
		echo "Data was inserted!";
	}else{
		echo "Data was not inserted!";
		}
	}*/
	header('location:viewpost.php');
	}
}
?>
<div class="content">
<form method = "POST" enctype="multipart/form-data">
	Title:<input type = "text" name="title"/><br/>
	Author:<input type = "text" name="author"/><br/>
	Keyword:<input type = "text" name="keyword"/><br/>
	Image:<input type="file" name="image"/><br/>
	Content:<textarea name="content"></textarea><br/>
	Date:<input type="date" name="date"/>
	Submit:<input type="submit" name="submit" value="Submit">
</form>
</div>
<?php include 'includes/footer.php';?>