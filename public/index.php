<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cerise</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>" />
        <link rel="icon" href="images/cherry.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner&display=swap" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      </head>

    <body>
    <div class="login-container">
        <h1 id="login-welcome">Pretty please, tell us your name!</h1> 
          <div class="vertical-center">
                <form id="login-form" method="post">
                        <input type="text" id="name-input" name="nameinput" placeholder="Your name" autofocus="autofocus" value=""></input> <?php
                        $nameinput = $_POST["nameinput"];
                        print $nameinput;
                        ?>
                          </form>
                          </div>
                          <div class="vertical-center">
                           <a href="homepage.php"><button type="submit" id="to-home-btn">Submit</button></a><?php include("homepage.php"); ?>
                          </div>                    
                </form> 
    </div>
 
    <script src="scripts/main.js"></script>
    </body>
</html>