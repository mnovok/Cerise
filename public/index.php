<?php 
session_start();
$_SESSION['username'] = "";
?>
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
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner&display=swap" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Edu+VIC+WA+NT+Beginner&display=swap" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/fbcc69f44a.js"crossorigin="anonymous"></script>
        <script src="cards.js"></script>
      </head>
      

    <body id="index">
    <div class="login-container">
        <h1 id="login-welcome">Pretty please, tell us your name!</h1>
          <div class="vertical-center">
                <form id="login-form" method="post">
                      <input type="text" id="name-input" name="nameinput" placeholder="Your name" autofocus="autofocus" value=""  @onkeypress="Enter"></input> 
                        <input type="submit" hidden >
                        <?php 
                         if(isset($_POST['nameinput']))
                            {$_SESSION['username'] = $_POST['nameinput'];}
                         else
                          {$_SESSION['username'] = "CeriseGuest";} ?>
                          </form></div>
                          <div class="vertical-center"> 
                          <a href="homepage.php"><button type="submit" id="to-home-btn">Submit</button></a>
                          </div>                    
                </form> 
    </div>
 
    <script src="scripts/main.js"></script>

    <footer>
      <p>Copyright Cerise @ 2023 FESB</p>
    </footer>

    </body>

</html>