<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
require 'insert.php';
require 'insert_comment.php';
require 'profile.php';
require_once ('functions.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cerise</title>
        <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>" />
        <link rel="stylesheet" href="css/home.css?v=<?php echo time(); ?>" />
        <link rel="stylesheet" href="css/feed.css?v=<?php echo time(); ?>" />
        <link rel="icon" href="images/cherry.ico" />
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner&display=swap" rel="stylesheet"/>
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner&display=swap" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/fbcc69f44a.js"crossorigin="anonymous"></script>
        <template id='card-template'>
          <div class ='right-box'>
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
                <div class='row'>
                  <div class='col-sm-2 card' data-card-id=''>
                  <i class='fa fa-bookmark bookmark-icon clickable-icon'></i><span class='bookmarks'></span>
                  <div class='bookmark-no'></div>
                  </div>
                  <div class='col-sm-6' class='card'>
                  <h4></h4>
                    <p class='posted'></p>
                  </div>
                  <div class='col-sm-4'>
                  </div>
                </div>
                <div class='row'>
                  <div class='card' data-card-id=''>
                    <center><p></p></center>
                    <img id='posts-img' src='' style='height:350px;'>
                    <span><i  class='fa fa-heart heart-icon clickable-icon' aria-hidden='true'></i><span class='number-of-likes'></span>
                  </div>
                </div><br>					
                    <p class = 'com-name'></p><p class = 'com'></p><br> 				
                <form action='insert_comment.php?post_id=<?php echo 46; ?>' method='post'>
                <input type='hidden' value='' name='post_ID'> </input>
                <input type='hidden' value='' name='user'> </input>
                <textarea class='comment-area' name='comment-area'></textarea> 
                <center><button type='submit' class='btn btn-info' name='com'>Comment</button></center><br></form>
                </div>
                <div class='col-sm-3'>
                </div>
              </div><br><br></div>
        </template>
      </head>
      <body style="background-color:#FFE5EE;">

        <div class="insert" >
          <div id="insert_post" class="col-sm-12" style="background-color:#FFE5EE;">
            <center>
            <form action="homepage.php?id=<?php echo $_SESSION['username']; ?>" method="post" id="f" enctype="multipart/form-data">
            <textarea class="form-control" id="content" rows="4" name="content" placeholder="What are you up to, <?php echo $_SESSION['username']; ?>?"></textarea>
            <label class="btn btn-warning" id="upload_image_button">Select Image
            <input type="file" name="upload_image" size="30">
            </label>
            <input type='hidden' value="<?php echo $_SESSION['username'];?>" name='username'> </input>
            <button type="submit" id="btn-post" class="btn btn-success" name="sub">Post</button>            <?php
            require_once('profile.php');
            echo get_profile(); ?>
            </form>
            <button onclick="prompt('Enter image path', 'uploads/2791.jpg');" id="add-post-button">ADD NEW POST</button>
            </center>
          </div>
        </div>

          <?php
          echo get_posts();    
          ?>

        <script src="scripts/main.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="scripts/feed.js" type="text/javascript"></script>
        <script src="scripts/cards.js"></script>  
        </script>
        <footer>
          <p>Copyright Cerise @ 2023 FESB</p>
        </footer>
      </body>
 </html>