<?php

$con = mysqli_connect("127.0.0.1", "NovokmetM", "NovokmetM_2022", "NovokmetM",  3306) or die("Connection was not established");

function get_posts(){
	global $con;

	//get comments
    $get_id = $_GET['post_id'];

	$per_page = 100;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "SELECT * FROM posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['ID'];
		$content = substr($row_posts['description'], 0,40);
		$upload_image = $row_posts['path'];
		$liked = $row_posts['liked'];
		$likes = $row_posts['likes'];
		$bookmarked = $row_posts['bookmarked'];
		$bookmarks = $row_posts['bookmarks'];

		$heartClass = $liked == '1' ? "fa-heart" : "fa-heart-o";
		$bookmarkClass = $bookmarked == '1' ? "fa-bookmark" : "fa-bookmark-o";

		$user = "SELECT * from posts";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_posts['username'];

		//now displaying posts from database

		if($content=="" && strlen($upload_image) >= 1){
			echo"
			<div class ='right-box'>
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2 card' data-card-id='$post_id'>
						<i onclick='toggleBookmark(this)' class='fa $bookmarkClass bookmark-icon clickable-icon'></i><span class='bookmarks'>$bookmarks</span>
						<div class='bookmark-no'></div>
						</div>
						<div class='col-sm-6'>
							<h4>Post no. $post_id</h4>
							<p class='posted'>Posted by $user_name</p>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='card' data-card-id='$post_id'>
							<img id='posts-img' src='uploads/$upload_image'>
							<i onclick='toggleHeart(this)' class='fa $heartClass heart-icon clickable-icon' aria-hidden='true'></i><span class='number-of-likes'>$likes</span>
						</div>
					</div><br> " ?>
					<?php  
					
						$get_comments = "SELECT * FROM comments inner join posts WHERE comments.post_ID = posts.ID";
						$run_comments = mysqli_query($con, $get_comments);

						while($row_comments = mysqli_fetch_array($run_comments)){

							$com = $row_comments['text'];
							$com_name = $row_comments['user'];
							$com_id = $row_comments['post_ID'];

						if($post_id == $com_id )
						{
							echo"
							<p class = 'com-name'>$com_name</p><p class = 'com'> $com </p><br>";
						}

							}
					?>
					<?php 
					echo"
					<form action='insert_comment.php' method='post'>
					<input type='hidden' value='$post_id' name='post_ID'> </input>
					<input type='hidden' value='$_SESSION[username]' name='user_name'> </input>
					<textarea class='comment-area' name='comment-area'></textarea> 
					<center><button type='submit' class='btn btn-info' name='com'>Comment</button></center><br></form>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br> </div>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class ='right-box'>
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2 card' data-card-id='$post_id'>
						<i onclick='toggleBookmark(this)' class='fa $bookmarkClass bookmark-icon clickable-icon'></i><span class='bookmarks'>$bookmarks</span>
						<div class='bookmark-no'></div>
						</div>
						<div class='col-sm-6' class='card'>
						<h4>Post no. $post_id</h4>
							<p class='posted'>Posted by $user_name</p>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='card' data-card-id='$post_id'>
							<center><p>$content</p></center>
							<img id='posts-img' src='uploads/$upload_image' style='height:350px;'>
							<span><i onclick='toggleHeart(this)' class='fa $heartClass heart-icon clickable-icon' aria-hidden='true'></i><span class='number-of-likes'>$likes</span>
						</div>
					</div><br>" ?>
					<?php  
						$get_comments = "SELECT * FROM comments inner join posts WHERE comments.post_ID = posts.ID";
						$run_comments = mysqli_query($con, $get_comments);

						while($row_comments = mysqli_fetch_array($run_comments)){

							$com = $row_comments['text'];
							$com_name = $row_comments['user'];
							$com_id = $row_comments['post_ID'];

						if($post_id == $com_id )
						{
							echo"
							<p class = 'com-name'>$com_name</p><p class = 'com'> $com </p><br> ";
						}
							}
					?>
					<?php echo"
					<form action='insert_comment.php?post_id=<?php echo $post_id; ?>' method='post'>
					<input type='hidden' value='$post_id' name='post_ID'> </input>
					<input type='hidden' value='$user_name' name='user'> </input>
					<textarea class='comment-area' name='comment-area'></textarea> 
					<center><button type='submit' class='btn btn-info' name='com'>Comment</button></center><br></form>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br></div>
				";
			}
	
		else{
			echo"
			<div class ='right-box'>
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2 card' data-card-id='$post_id'>
						<i onclick='toggleBookmark(this)' class='fa $bookmarkClass bookmark-icon clickable-icon'></i><span class='bookmarks'>$bookmarks</span>
						<div class='bookmark-no'></div>
						</div>
						<div class='col-sm-6'>
							<h4>Post no. $post_id</h4>
							<p class='posted'>Posted by $user_name</p>
						</div>
						<div class='card' data-card-id='$post_id'>
						<i onclick='toggleHeart(this)' class='fa $heartClass heart-icon clickable-icon' aria-hidden='true'></i><span class='number-of-likes'>$likes</span>
						</div>
					</div>" ?>
					<?php  
						$get_comments = "SELECT * FROM comments inner join posts WHERE comments.post_ID = posts.ID";
						$run_comments = mysqli_query($con, $get_comments);

						while($row_comments = mysqli_fetch_array($run_comments)){

							$com = $row_comments['text'];
							$com_name = $row_comments['user'];
							$com_id = $row_comments['post_ID'];

						if($post_id == $com_id )
						{
							echo"
							<p class = 'com-name'>$com_name</p><p class = 'com'> $com </p><br> ";
						}
							}
					?>
					<?php echo"
					<form action='insert_comment.php?post_id=<?php echo $post_id; ?>' method='post'>
					<input type='hidden' value='$post_id' name='post_ID'> </input>
					<input type='hidden' value='$user_name' name='user'> </input>
					<textarea class='comment-area' name='comment-area'></textarea> 
					<center><button type='submit' class='btn btn-info' name='com'>Comment</button></center><br></form>
					<div class='row'>
					<div class='col-sm-12'>
					<center><p>$content</p></center>
					</div>
				</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br></div>
			";
		}
		
	}
}

function toggleCardLike($post_id, $liked, $likes){
	$setLiked = "UPDATE posts SET liked='$liked' likes='$likes' WHERE ID='$post_id';";
	$con = mysqli_connect("localhost","root","","cerise");
	$run_likes = mysqli_query($con, $setLiked);
		}
function toggleCardBookmark($post_id, $bookmarked){
	getDbAccess()->executeQuery("UPDATE posts SET bookmarked='$bookmarked' WHERE ID='$post_id';");
		}	
function addPost($imageUrl, $user_name, $description){
			getDbAccess()->executeInsertQuery("INSERT INTO posts values ('0', '$user_name', '$imageUrl', '', '', '', '', '$description');");
		}
?>

