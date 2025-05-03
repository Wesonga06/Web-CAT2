<?php
session_start();

// Check if the user is logged in by checking the session
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: loginafya.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Information</title>
    <link rel="icon" type="image/png" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png">
    <link rel="stylesheet" href="patient.css">
</head>
<body>
    <div class="nav">
        <a href="afya.php">Home</a>
        <a href="aboutus.html">About us</a>
        <a href="patient.php">Patient Form</a>
        <a href="order.php">Order</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Log Out</a>
    </div>

    <div class="patientinfo">
        <form action="submitpatientinfo.php" method="POST">
            <h2>Patient Information</h2>

            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter Full Name" required>

            <label for="idnumber">National ID No:</label>
            <input type="number" id="idnumber" name="idnumber" placeholder="Enter ID Number" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter Valid Email" required>

            <div class="gender-form">
                <label for="gender">Gender:</label>
                <div class="gender-options">
                    <input type="radio" id="male" name="gender" value="Male" required> Male
                    <input type="radio" id="female" name="gender" value="Female" required> Female
                    <input type="radio" id="other" name="gender" value="Other" required> Other
                </div>
            </div>
            
            <label for="symptoms">Severity of Symptoms:</label>
            <select id="symptoms" name="symptoms" required>
                <option value="" disabled selected>--Choose one--</option>
                <option value="Severe">Severe</option>
                <option value="Moderate">Moderate</option>
                <option value="Mild">Mild</option>
            </select>

            <label for="medical_conditions">Existing Medical Conditions:</label>
            <input type="text" id="medical_conditions" name="medical_conditions" placeholder="Enter Medical Conditions">

            <!-- Added Medical History Section -->
            <label for="medical_history">Medical History:</label>
            <textarea id="medical_history" name="medical_history" placeholder="Enter your medical history" rows="4"></textarea>

            <h2>Emergency Contact</h2>
            <label for="contact_name">Contact Name:</label>
            <input type="text" id="contact_name" name="contact_name" placeholder="Enter Full Name" required>

            <label for="contact_phone">Contact Phone Number:</label>
            <input type="tel" id="contact_phone" name="contact_phone" placeholder="Enter Phone Number" required>

            <label for="relationship">Relationship:</label>
            <select id="relationship" name="relationship" required>
                <option value="" disabled selected>--Choose Relation--</option>
                <option value="Spouse">Spouse</option>
                <option value="Parent">Parent</option>
                <option value="Sibling">Sibling</option>
                <option value="Other">Other</option>
            </select>

            <button type="submit" name="submit">Submit</button>
            <button type="reset" name="reset">Reset</button>
        </form>
    </div>

    <div class="feedback-form">
        <h2>Feedback Form</h2>
        <form action="/submit-feedback" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter valid email" required>

            <label for="service">Service Used:</label>
            <select id="service" name="service" required>
                <option>--choose one--</option>
                <option value="home-care">Home Care</option>
                <option value="nursing-home">Nursing Home</option>
                <option value="rehabilitation">Rehabilitation</option>
            </select>

            <label for="rating">Service Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" placeholder="Rate 1-5" required>

            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" rows="4" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

    <script src="afya.js"></script>
</body>
</html>

