<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'dbconnection.php';

    $name = $_POST['name'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "<script>alert('Passwords do not match!'); window.location.href = 'registerafya.php';</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.location.href = 'registerafya.php';</script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, address, password) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssss", $name, $email, $phone, $address, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Successfully signed up!'); window.location.href = 'afya.php';</script>";
    } else {
        if ($conn->errno == 1062) {
            echo "<script>alert('Signup failed! Email already exists.'); window.location.href = 'registerafya.php';</script>";
        } else {
            echo "<script>alert('Signup failed! Error: " . $stmt->error . "'); window.location.href = 'registerafya.php';</script>";
        }
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
    <title>Sign Up - Afya Bora Nursing Services</title>
    <link rel="icon" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="afya.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="afya.php">
                <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png" alt="Afya Bora Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="afya.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patient.php">Patient Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <img src="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png" alt="Afya Bora Logo" style="width: 100px; margin-bottom: 20px;">
        <h2 class="text-center">Sign Up</h2>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>