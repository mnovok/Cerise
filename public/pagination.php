<style>
.pagination a{
	color: black;
	float: left;
	padding: 8px 16px;
	text-decoration: none;
	transition: background-color .3s;
}
.pagination a:hover:not(.active){background-color: #ddd;}
</style>
<?php
	
	$query = "select * from posts";

	$result = mysqli_query($con, $query);

	$total_posts = mysqli_num_rows($result);

	$total_pages = ceil($total_posts / $per_page);

	echo"
		<center>
		<div class='pagination'>
		<a href='home.php?page=1'>First Page</a>
	";

	for ($i=1; $i <= $total_pages ; $i++) { 
		echo"<a href='home.php?page=$i'>$i</a>";
	}

	echo"<a href='home.php?page=$total_pages'>Last Page</a></div>";
?>

<div class="row">
          <div class="col-sm-12">
            <center><h2><strong>News Feed</strong></h2><br></center>
            <label>Image : </label><br><img src="uploads/<?php echo $row['path']; ?> " alt="image">
            <p class="img-description"><?php echo $row['description'];?></p>
          </div>
        </div>