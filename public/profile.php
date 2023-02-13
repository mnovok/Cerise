<?php 
error_reporting(0);


$con = mysqli_connect("localhost", "NovokmetM", "NovokmetM_2022", "NovokmetM") or die("Connection was not established");

function get_profile(){

    $username = htmlentities($_POST['nameinput']);

    echo"
    <div class='profile'>
    <h1>PROFILE</h1>
    <div class='profile-img-container'><a href='index.php'><img src ='images/profile.png' class='profile-img' alt='profile-picture'></img></a></div>
    <h2>USERNAME: $_SESSION[username]</h2>
    <h3>ABOUT</h3>
    <p>Art lover. Movie enjoyer.</p>
    <p id='quote'>Alea iacta est.</p>
    <center><a href='index.php'><img src='images/cherry.ico' id='home-button' alt='home' onclick='window.open('index.php')></img></a></center>
    </div>
    ";

}

?>