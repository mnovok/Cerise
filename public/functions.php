<?php

$con = mysqli_connect("localhost","root","","cerise") or die("Connection was not established");

function get_posts(){
	global $con;

	//get comments
    $get_id = $_GET['post_id'];

    $get_com = "SELECT * FROM comments WHERE post_ID = '$get_id' ORDER BY 1 DESC";

    $run_com = mysqli_query($con, $get_com);

    while($row = mysqli_fetch_array($run_com)){
        $com = $row['text'];
        $com_name = $row['user'];
	}

	$per_page = 100;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from POSTS ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);


	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['ID'];
		$content = substr($row_posts['description'], 0,40);
		$upload_image = $row_posts['path'];

		$user = "select * from posts";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_posts['username'];

		//now displaying posts from database

		if($content=="" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p></p>
						</div>
						<div class='col-sm-6'>
							<h4>Post no. $post_id</h4>
							<p>Posted by $user_name</p>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='uploads/$upload_image'>
						</div>
					</div><br>
					<p>$user_name commented: </p>
					<form action='insert_comment.php' method='post'>
					<input type='hidden' value='$post_id' name='post_ID'> </input>
					<textarea class='comment-area' name='comment-area'></textarea> 
					<center><button type='submit' class='btn btn-info' name='com'>Comment</button></center><br></form>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p></p>
						</div>
						<div class='col-sm-6'>
							<h4>Post no. $post_id</h4>
							<p>Posted by $user_name</p>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='uploads/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<form action='insert_comment.php?post_id=<?php echo $post_id; ?>' method='post'>
					<input type='hidden' value='$post_id' name='post_ID'> </input>
					<textarea class='comment-area' name='comment-area'></textarea> 
					<center><button type='submit' class='btn btn-info' name='com'>Comment</button></center><br></form>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}
	


		
		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p></p>
						</div>
						<div class='col-sm-6'>
							<h4>Post no. $post_id</h4>
							<p>Posted by $user_name</p>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<form action='insert_comment.php?post_id=<?php echo $post_id; ?>' method='post'>
					<input type='hidden' value='$post_id' name='post_ID'> </input>
					<textarea class='comment-area' name='comment-area'></textarea> 
					<center><button type='submit' class='btn btn-info' name='com'>Comment</button></center><br></form>
					<div class='row'>
					<div class='col-sm-12'>
						<h3><p>$content</p></h3>
					</div>
				</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}
		}



?>