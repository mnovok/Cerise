<?php session_start();
require 'insert.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cerise</title>
        <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>" />
        <link rel="stylesheet" href="css/home.css?v=<?php echo time(); ?>" />
        <link rel="icon" href="images/cherry.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner&display=swap" rel="stylesheet"/>
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
      </head>

      <body style="background-color:#FFE5EE;">

        <div class="insert" >
          <div id="insert_post" class="col-sm-12" style="background-color:#FFE5EE;">
            <center>
            <form action="homepage.php?id=<?php echo $_SESSION['username']; ?>" method="post" id="f" enctype="multipart/form-data">
            <textarea class="form-control" id="content" rows="4" name="content" placeholder="What are you up to, <?php echo $_SESSION['username']; ?>?"></textarea><br>
            <label class="btn btn-warning" id="upload_image_button">Select Image
            <input type="file" name="upload_image" size="30">
            </label>
            <button type="submit" id="btn-post" class="btn btn-success" name="sub">Post</button>
            </form>
            </center>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <center><h2><strong>News Feed</strong></h2><br></center>
            <label>Image : </label><br><img src="uploads/<?php echo $row['path']; ?> " alt="image">
            <p class="img-description"><?php echo $row['description'];?></p>
          </div>
        </div>

        <script src="scripts/main.js"></script>
        <?php print $_SESSION["username"];?>
        <footer>
          <p>Copyright Cerise @ 2023 FESB</p>
        </footer>
      </body>


 </html>