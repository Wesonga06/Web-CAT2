<?php
$servername = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "nursing_services"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log the error or handle the error silently (you can log the error to a file)
    error_log("Connection failed: " . $conn->connect_error);
    die(); // Optionally, stop the script execution without revealing sensitive information to the user
}
?>


