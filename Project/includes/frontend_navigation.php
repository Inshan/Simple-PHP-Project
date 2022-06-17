<div class="navigation">
<div class="search">
<form method="get" action="search.php">
	<input type="text" name="search" placeholder="search" style="border-radius:5px; height:30px;width:200px;">
	<input type="submit" value="OK" style="border-radius:5px;height:35px;"/>
</form>
</div>
<?php
	include 'connection.php';
	$query = "Select * from posts order by id desc limit 2";
	$squery = mysqli_query($con, $query);
	while ($uquery = mysqli_fetch_array($squery)){
?>
<ul style="list-style:none; font-family:'Courier New', Courier, monospace; color:#999999; border:solid 5px #000033;"><?php echo $uquery[6]; ?></li>
	<li><?php echo $uquery[1]; ?></li>
	<li><?php echo $uquery[2]; ?></li>
	<li><img src = "image/<?php echo $uquery[4]; ?>" height= "100px" width="150px"/></li>
	<li><?php echo $uquery[5]; ?></li>
</ul>
<?php }?>
</div>
