<?php
session_start();
require_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $email;

            echo "<script>alert('Successfully logged in!'); window.location.href = 'afya.php';</script>";
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href = 'loginafya.php';</script>";
        }
    } else {
        echo "<script>alert('Account not found!'); window.location.href = 'loginafya.php';</script>";
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
    <title>Log In - Nursing Services</title>
    <link rel="icon" type="image/png" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png">
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

/* Login Form Container */
.login-container {
    width: 90%;
    max-width: 450px;
    background-color: #d4af79; /* Custom color for the background */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 20px 0;
}

/* Form Styling */
.login-form h2 {
    color: #333;
    margin-bottom: 20px;
}

/* Form Elements */
.login-form label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
}

/* Input Fields Styling */
input[type="email"], input[type="password"], input[type="text"] {
    width: 80%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Focused Input Fields */
input[type="email"]:focus, input[type="password"]:focus, input[type="text"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Remember Me Checkbox */
.remember-me {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
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

/* Register Link Styling */
.register-link {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
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
}

.nav a:hover {
    background-color: #555;
}

/* Responsive Design for smaller screens */
@media (max-width: 600px) {
    .login-container {
        width: 90%;
        padding: 20px;
    }

    button[type="submit"], input[type="email"], input[type="password"] {
        width: 100%;
    }
}
</style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Log In</h2>
            <form action="loginafya.php" method="post" onsubmit="return validateForm()">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <div class="remember-me">
                    <label for="remember_me">
                        <input type="checkbox" id="remember_me" name="remember_me">Remember Me
                    </label>
                </div>
                
                <button type="submit" class="btn">Log In</button>
            </form>
            <p class="register-link">Don't have an account? <a href="registerafya.php">Register here</a></p>
        </div>
    </div>

    <script>
        // Basic client-side validation example
        function validateForm() {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            if (!email || !password) {
                alert("Please fill in all required fields.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

