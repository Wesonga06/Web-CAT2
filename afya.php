<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afya Bora Nursing Services</title>
    <link rel="icon" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                        <a class="nav-link active" href="afya.php">Home</a>
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
        <?php
        if (isset($_SESSION['name'])) {
            echo "<h2 class='text-center'>Welcome, " . htmlspecialchars($_SESSION['name']) . "!</h2>";
        } else {
            echo "<h2 class='text-center'>Afya Bora Nursing Services</h2>";
        }
        ?>
        <p class="lead">Expert care, Best living. The Afya Bora Nursing Services provide comprehensive and specialized care to patients, ensuring high-quality medical attention and support. Their services include administering medication, wound care, foot care, catheter management, ventilator and respiratory care, as well as monitoring vital signs and managing pain and symptoms.</p>
        <p>The nursing team is dedicated to delivering compassionate and personalized care, addressing the unique needs of each patient to promote optimal health outcomes. This holistic approach ensures that patients receive not only medical treatment but also emotional and psychological support, enhancing their overall well-being.</p>
    </div>

    <hr>

    <div class="container text-center my-4">
        <img src="https://th.bing.com/th/id/R.42e65aa5e00322f938552b33f3c7ae43?rik=Y%2fYgFfCXjm6jAg&pid=ImgRaw&r=0" class="img-fluid" alt="Healthcare Team">
        <img src="https://th.bing.com/th/id/OIP.I2gPBvbCYROj5vea_3_AewHaEK?rs=1&pid=ImgDetMain" class="img-fluid" alt="Medical Equipment">
    </div>

    <div class="container my-4">
        <h2 class="text-center">Services Offered</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>Service</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Home Care</td>
                    <td>Personalized care done in the comfort of your home</td>
                </tr>
                <tr>
                    <td>Medication Management</td>
                    <td>Assistance with medication schedules and management</td>
                </tr>
                <tr>
                    <td>Wound Care</td>
                    <td>Professional care for post-surgical and chronic wounds</td>
                </tr>
                <tr>
                    <td>Diabetes Management</td>
                    <td>Support for managing diabetes, including blood sugar monitoring and dietary guidance</td>
                </tr>
                <tr>
                    <td>Geriatric Management</td>
                    <td>Comprehensive support for elderly patients, including health assessments and care planning</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container my-4 contact-list">
        <h2 class="text-center">Contact Information</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> Levy Mugo</li>
            <li class="list-group-item"><strong>Phone:</strong> +254 708 247 063</li>
            <li class="list-group-item"><strong>Email:</strong> mugolevy001@gmail.com</li>
            <li class="list-group-item"><strong>Address:</strong> Afya Center, Moi Avenue</li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>