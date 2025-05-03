<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Services - Afya Bora Nursing Services</title>
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
                        <a class="nav-link active" href="order.php">Order</a>
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
        <h2 class="text-center">Order Services</h2>
        <form action="order.php" method="post">
            <label for="service">Select Service:</label>
            <select id="service" name="service" style="width: 80%; padding: 12px; border: 1px solid #ced4da; border-radius: 8px;" required>
                <option value="Home Care">Home Care</option>
                <option value="Medication Management">Medication Management</option>
                <option value="Wound Care">Wound Care</option>
                <option value="Diabetes Management">Diabetes Management</option>
                <option value="Geriatric Management">Geriatric Management</option>
            </select>

            <label for="order_details">Order Details:</label>
            <textarea id="order_details" name="order_details" rows="4" style="width: 80%; padding: 12px; border: 1px solid #ced4da; border-radius: 8px;"></textarea>

            <button type="submit">Place Order</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>