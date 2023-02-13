<?php

$con = mysqli_connect("localhost", "NovokmetM", "NovokmetM_2022", "NovokmetM") or die("Error " . mysqli_error($con));

$msg = ""; 

// check if the user has clicked the button "UPLOAD" 


if(isset($_POST['sub']))
{

    $imgFile = $_FILES['upload_image']['name'];
    $tmp_dir = $_FILES['upload_image']['tmp_name'];
    $imgSize = $_FILES['upload_image']['size']; 
    $content = htmlentities($_POST['content']); 
    $username = htmlentities($_POST['username']);

    if(!empty($imgFile))
    {
     if(strlen($content) > 250){
		echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
		echo "<script>window.open('homepage.php', '_self')</script>";
	}

    else {
        //$_SERVER["DOCUMENT_ROOT"].

    $upload_dir = 'uploads/'; // upload directory
    
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
    // rename uploading image
    $coverpic = random_int(1, 10000).".".$imgExt;


    
    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){ 
    // Check file size '5MB'
        if($imgSize < 5000000) {
        move_uploaded_file($tmp_dir, $upload_dir.$coverpic);
        }
        else{
        $errMSG = "Sorry, your file is too large.";
        }
    }
    else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
    }

//For Database Insertion
 // if no error occured, continue ....
 if(!isset($errMSG))
 {
    $que = "INSERT INTO posts(path, description, username) VALUES('" . $coverpic . "', '" . $content . "' , '" . $username ."')";

    if(mysqli_query($con, $que))
    {
        echo "<script type='text/javascript'>alert('Posted succesfully. Your Feed has just updated a moment ago!');</script>";
        echo "<script>window.open('homepage.php', '_self')</script>";
    }
    
    else
    {
        echo "<script type='text/javascript'>alert('error while inserting....');</script>";
    }
 }
 } }
}
 
 //Get Last Inserted Id
 $lastId = mysqli_insert_id($con);

 //Fetch Qquery
 $que = "SELECT * FROM posts ORDER BY ID desc";
 $result = mysqli_query($con, $que);
$row=mysqli_fetch_assoc($result);



           
?>
