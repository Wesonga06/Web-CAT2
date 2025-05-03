<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Afya Bora Nursing Services</title>
    <link rel="icon" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="afya.css">
</head>
<body class="about-us-page">
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
                        <a class="nav-link active" href="aboutus.php">About Us</a>
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
        <h1 class="text-center">About Us</h1>
        <?php
        if (isset($_SESSION['name'])) {
            echo "<p class='text-center'>Welcome, " . htmlspecialchars($_SESSION['name']) . "!</p>";
        }
        ?>
        <p class="lead">Welcome to Afya Bora Nursing Services, where expert care is the best living. We are dedicated to providing high-quality nursing services that cater to the unique needs of our patients. Our team of experienced and licensed nurses is committed to delivering personalized care in a safe and supportive environment.</p>
        <p>Here at Afya Bora, we understand that health and well-being are paramount. Our mission is to enhance the quality of life for our patients through comprehensive nursing solutions, whether in-home care, palliative support, or specialized health management. We believe in treating every patient with dignity, respect, and empathy, ensuring they receive the attention and care they deserve.</p>
        <p>Our values of integrity, excellence, and compassion guide everything we do. We strive to build lasting relationships with our patients and their families, fostering trust and open communication. With a focus on continuous improvement and adherence to the highest standards of practice, we are here to support you on your health journey.</p>
    </div>

    <div class="container my-4">
        <h2 class="text-center">Services Offered</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://th.bing.com/th/id/R.8d7e757ddfbc2733d9aa8c08b41b813f?rik=qIEeGYH62%2fX62A&pid=ImgRaw&r=0" alt="Geriatric Management">
                <div class="caption">Geriatric Management</div>
            </div>
            <div class="gallery-item">
                <img src="https://th.bing.com/th/id/OIP.Nu8uVTY1s-AcllKxbiivVQHaE7?rs=1&pid=ImgDetMain" alt="Home Care">
                <div class="caption">Home Care</div>
            </div>
            <div class="gallery-item">
                <img src="https://th.bing.com/th/id/R.59c783d0c3b487afe5fbd706800a7955?rik=%2f53ygYkueyZryA&pid=ImgRaw&r=0" alt="Medication Management">
                <div class="caption">Medication Management</div>
            </div>
            <div class="gallery-item">
                <img src="https://www.registerednursing.org/wp-content/uploads/2017/03/Wound-Care-Nurse-Image-768x512.jpg" alt="Wound Care">
                <div class="caption">Wound Care</div>
            </div>
            <div class="gallery-item">
                <img src="https://th.bing.com/th/id/OIP.Sw4enKlrOBpk3FEM4vIKagHaE8?rs=1&pid=ImgDetMain" alt="Diabetes Management">
                <div class="caption">Diabetes Management</div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <h3>Our Commitment</h3>
        <p>At Afya Bora, we are committed to excellence in nursing care. Our team undergoes regular training to stay updated with the latest medical practices and technologies, ensuring that our patients receive the best possible care.</p>
        <p>We also offer community outreach programs to educate families about health and wellness, helping them make informed decisions about their loved ones’ care.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>