<?php 

$con = mysqli_connect("127.0.0.1", "NovokmetM", "NovokmetM_2022", "NovokmetM",3306) or die("Connection was not established");

function get_profile(){

    $username = htmlentities($_POST['nameinput']);

    echo"
    <div class='profile'>
    <h1>PROFILE</h1>
    <div class='profile-img-container'><a href='index.php'><img src ='images/profile.png' class='profile-img' alt='profile-picture'></img></a></div>
    <h2>USERNAME: $_SESSION[username]</h2>
    <h3>ABOUT</h3></br>
    <p>Art lover. Movie enjoyer.</p>
    <p id='quote'>Alea iacta est.</p></br>
    <a href='index.php'><img src='images/cherry.ico' id='home-button' alt='home' onclick='window.open('index.php')></img></a>
    </div>
    ";
}

?>