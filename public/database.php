<?php
 
$hostname     = "localhost"; // Enter your hostname
$username     = "root";      // Enter your table username
$password     = "";          // Enter your table password
$databasename = "cerise"; // Enter your Database name
// Create connection 
$conn = new mysqli($hostname, $username, $password, $databasename);
 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
 }
?>