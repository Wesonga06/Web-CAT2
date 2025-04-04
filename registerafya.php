<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'dbconnection.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, address, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $address, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Successfully signed up!'); window.location.href = 'afya.html';</script>";
    } else {
        echo "<script>alert('Signup failed! Email may already exist. Please try again.'); window.location.href = 'registerafya.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Nursing Services</title>
    <link rel="icon" type="text/css" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png">
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

/* Sign-Up Form Container */
.container {
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
.container h2 {
    color: #333;
    margin-bottom: 20px;
}

/* Form Elements */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Label Styling */
label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
}

/* Input Fields Styling */
input[type="text"], input[type="email"], input[type="tel"], input[type="password"] {
    width: 80%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Focused Input Fields */
input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, input[type="password"]:focus {
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

/* Link Styling */
.login-link {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

.login-link a {
    color: #007bff;
    text-decoration: none;
}

.login-link a:hover {
    text-decoration: underline;
}

/* Responsive Design for smaller screens */
@media (max-width: 600px) {
    .container {
        width: 90%;
        padding: 20px;
    }

    button[type="submit"], input[type="text"], input[type="email"], input[type="tel"], input[type="password"] {
        width: 100%;
    }
}

        </style>

</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="registerafya.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" required>
    
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    
    <button type="submit">Sign Up</button>
</form>
 <p class="login-link">Already have an account? <a href="loginafya.php">Login here</a></p>
    </div>
</body>
</html>