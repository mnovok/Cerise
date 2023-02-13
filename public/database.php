<?php
 
$hostname     = "localhost"; // Enter your hostname
$username     = "NovokmetM";      // Enter your table username
$password     = "NovokmetM_2022";          // Enter your table password
$databasename = "NovokmetM"; // Enter your Database name
// Create connection 
$conn = new mysqli($hostname, $username, $password, $databasename);
 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
 }
?>