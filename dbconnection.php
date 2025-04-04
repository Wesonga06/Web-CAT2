<?php
$servername = "127.0.0.1"; // Use '127.0.0.1' instead of 'localhost' for reliability
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "nursing_services"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>
