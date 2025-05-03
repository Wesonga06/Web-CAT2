<?php
session_start();
require_once 'dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'loginafya.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_type = $_POST['order_type'];
    $order_details = $_POST['order_details'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, order_type, order_details) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $_SESSION['user_id'], $order_type, $order_details);

    if ($stmt->execute()) {
        echo "<script>alert('Your request has been placed successfully!'); window.location.href = 'afya.php';</script>";
    } else {
        echo "<script>alert('Failed to place request! Please try again.'); window.location.href = 'order.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Request Nursing Services</title>
    <link rel="icon" type="text/css" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png">
     <div class="nav">
         <a href="afya.php" target="blank">Home</a>
        <a href="aboutus.html" target="blank">About us</a>
        <a href="patient.php" target="blank"> Patient Form</a>
        <a href="order.php" target="blank">Order</a>
        <a href="profile.php" target="blank">Profile</a>
        <a href="logout.php" target="blank">Log Out</a>
    </div>
   <style>
    /* Reset and Center Everything */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
}

/* Navigation Bar Styling */
.nav {
    width: 100%;
    background-color: #444;
    padding: 10px 0;
    text-align: center;
}

.nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    display: inline-block;
    margin: 0 10px;
}

.nav a:hover {
    background-color: #555;
}

/* Form Container Styling */
form {
    width: 90%;
    max-width: 450px;
    background-color: #d4af79; /* Custom color for the background */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 20px 0;
}

/* Heading Styling */
form h2 {
    color: #333;
    margin-bottom: 20px;
}

/* Label Styling */
label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

/* Input Fields Styling */
select, textarea {
    width: 80%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

/* Focused Input Fields */
select:focus, textarea:focus {
    border-color: #007bff;
    outline: none;
}

/* Button Styling */
button[type="submit"] {
    width: 80%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #333;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #555;
}

/* Responsive Design for smaller screens */
@media (max-width: 600px) {
    form {
        width: 90%;
        padding: 20px;
    }

    select, textarea, button[type="submit"] {
        width: 100%;
    }
}

   </style>       
</head>
<body>
<form action="order.php" method="post">
    <label for="request">Request nurse:</label>
    <select name="order_type" required>
        <option value="Nurse Request">Request for a Nurse</option>
        <option value="Other">Other Request</option>
    </select>
    <label for="details">Order Details:</label>
    <textarea name="order_details" placeholder="Enter details" required></textarea>
    <button type="submit">Place Order</button>
</form>
</body>
</html>