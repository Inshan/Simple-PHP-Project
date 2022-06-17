<div class="content">
	<?php 
		include 'connection.php'; 
		$query = "select * from posts order by author desc";
		$squery = mysqli_query($con, $query);
		$row = mysqli_num_rows($squery);
		$no_of_rows_per_page = 2;
		$total_no_of_pages = ceil($row/$no_of_rows_per_page);
		if(isset($_GET['page_no'])){
			$page_no = $_GET['page_no'];
		}else{
			$page_no = 1;
		}
		
		$range = ($page_no - 1)*$no_of_rows_per_page.",".$no_of_rows_per_page;
		$sql = "select * from posts order by author asc limit $range";
		$res = mysqli_query($con, $sql);
		if(mysqli_num_rows($res)==0){
			echo "no remaining posts to show";
		}
		while($uquery = mysqli_fetch_array($res)){
	?>
<ul style="list-style:none; font-family:'Courier New', Courier, monospace; color:#999999; border:solid 5px #000033;"><?php echo $uquery[6]; ?></li>
	<li><?php echo $uquery[1]; ?></li>
	<li><?php echo $uquery[2]; ?></li>
	<li><?php echo $uquery[3]; ?></li>
	<li><img src = "image/<?php echo $uquery[4]; ?>" height= "100px" width="150px"/></li>
	<li><?php echo substr($uquery[5],0,20); ?><a href="readmoreall.php?id=<?php echo $uquery[0]; ?>">Read More...</a></li>
</ul>
<?php }?>
<div class = "pagination">
	<?php 
		if($page_no>1) {?>
			<a href = "blogs.php?page_no=<?php echo $page_no-1 ?>">Previous</a>
	<?php
	} 
		for($i=1;$i<=$total_no_of_pages;$i++) {?>
			<a href = "blogs.php?page_no=<?php echo $i ?>"><?php echo $i ?></a>
	<?php 
	}
		if($page_no<$total_no_of_pages) {?>
			<a href = "blogs.php?page_no=<?php echo $page_no+1 ?>">Next</a>
	<?php } ?>
</div>
</div>
