<?php
    session_start();
    $con = mysqli_connect("127.0.0.1", "NovokmetM", "NovokmetM_2022", "NovokmetM", 3306) or die("Error " . mysqli_error($con));

    $post_ID = $_POST['post_ID'];
    $user_name = $_SESSION['username'];

    if(isset($_POST['com'])){

        $comment = htmlentities($_POST['comment-area']); 
        
        if(!empty($comment))
        {
         if(strlen($comment) > 250){
            echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
            echo "<script>window.open('homepage.php', '_self')</script>";
        }

        
    else{
        $que = "INSERT INTO comments(text, post_ID, user) VALUES('" . $comment . "' , '" . $post_ID."' , '" . $user_name . "')";

        if(mysqli_query($con, $que))
        {
            echo "<script type='text/javascript'>alert('Comment posted succesfully. Your Feed has just updated a moment ago!');</script>";
            echo "<script>window.open('homepage.php', '_self')</script>";
        }
        
        else
        {
            echo "<script type='text/javascript'>alert('error while inserting....');</script>";
        }
        
        }
    }
}
?>