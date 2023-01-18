<?php

$con = mysqli_connect("localhost","root","","cerise") or die("Connection was not established");

function get_posts(){
	global $con;
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

		$user_name = $row_user['username'];

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
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;'>$user_name</a></h3>
							<h4>Post no. $post_id</h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='uploads/$upload_image'>
						</div>
					</div><br>
					<textarea class='comment-area'></textarea> 
					<a href='comments.php?post_id=$post_id' style='float:right;'><button class='btn btn-info' name='com'>Comment</button></a><br>
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
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;'>$user_name</a></h3>
							<h4>Post no. $post_id</h4>
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
					<textarea class='comment-area'></textarea> 
					<a href='comments.php?post_id=$post_id' style='float:right;'><button class='btn btn-info' name='com'>Comment</button></a><br>
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
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' >$user_name</a></h3>
							<h4>Post no. $post_id</h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<textarea class='comment-area'></textarea> 
					<a href='comments.php?post_id=$post_id' style='float:right;'><button class='btn btn-info' name='com'>Comment</button></a><br>
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


		include ("comments.php");

		echo"
		<div class='row'>
			<div class='col-md-6 col-md-offset-3'>
				<div class='panel panel-info'>
				<div class='panel-body'>
					<form action='' method='post' class='form-inline'>
						<textarea class='comment-area pb-cmnt-textarea' name='comment'></textarea> 
						<button class='btn btn-info pull-right' name='reply'>Comment</button><br>
					</form>
				</div>
				</div>
					</div>
				</div>";
	}

		

		}


function get_comments(){
	global $con;

}

?>