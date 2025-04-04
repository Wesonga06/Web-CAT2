<?php
session_start();
require_once 'dbconnection.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href = 'loginafya.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch patient information
$patient_query = $conn->prepare("SELECT date_of_birth, gender, medical_history FROM patient_info WHERE user_id = ?");
$patient_query->bind_param("i", $user_id);
$patient_query->execute();
$patient_result = $patient_query->get_result();
$patient_info = $patient_result->fetch_assoc();

// Fetch emergency contact
$contact_query = $conn->prepare("SELECT name, relationship, phone FROM emergency_contacts WHERE user_id = ?");
$contact_query->bind_param("i", $user_id);
$contact_query->execute();
$contact_result = $contact_query->get_result();
$emergency_contact = $contact_result->fetch_assoc();

// Fetch orders
$orders_query = $conn->prepare("SELECT order_type, order_details, status, created_at FROM orders WHERE user_id = ?");
$orders_query->bind_param("i", $user_id);
$orders_query->execute();
$orders_result = $orders_query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="icon" type="image/png" href="https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=510,fit=crop,q=95/A3QZD8635wIVOJ44/afya-bora-logo-m7VM66zJPwSPJoxn.png">
    <link rel="stylesheet" href="afya.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="nav">
        <a href="afya.html" target="_blank">Home</a>
        <a href="aboutus.html" target="_blank">About Us</a>
        <a href="patient.php" target="_blank">Patient Form</a>
        <a href="order.php" target="_blank">Order</a>
        <a href="profile.php" target="_blank">Profile</a>
        <a href="logout.php" target="_blank">Log Out</a>
    </div>

    <!-- Patient Information Section -->
    <h3>Patient Information</h3>
    <?php if ($patient_info): ?>
        <p>Date of Birth: <?php echo htmlspecialchars($patient_info['date_of_birth']); ?></p>
        <p>Gender: <?php echo htmlspecialchars($patient_info['gender']); ?></p>
        <p>Medical History: <?php echo htmlspecialchars($patient_info['medical_history']); ?></p>
    <?php else: ?>
        <p>No patient information available.</p>
    <?php endif; ?>

    <!-- Emergency Contact Section -->
    <h3>Emergency Contact</h3>
    <?php if ($emergency_contact): ?>
        <p>Name: <?php echo htmlspecialchars($emergency_contact['name']); ?></p>
        <p>Relationship: <?php echo htmlspecialchars($emergency_contact['relationship']); ?></p>
        <p>Phone: <?php echo htmlspecialchars($emergency_contact['phone']); ?></p>
    <?php else: ?>
        <p>No emergency contact information available.</p>
    <?php endif; ?>

    <!-- Orders Section -->
    <h3>Orders</h3>
    <ul>
        <?php if ($orders_result->num_rows > 0): ?>
            <?php while ($order = $orders_result->fetch_assoc()): ?>
                <li>
                    <strong>Type:</strong> <?php echo htmlspecialchars($order['order_type']); ?><br>
                    <strong>Details:</strong> <?php echo htmlspecialchars($order['order_details']); ?><br>
                    <strong>Status:</strong> <?php echo htmlspecialchars($order['status']); ?><br>
                    <strong>Date:</strong> <?php echo htmlspecialchars($order['created_at']); ?>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            <li>No orders found.</li>
        <?php endif; ?>
    </ul>

    <?php
    // Close queries and database connection
    $patient_query->close();
    $contact_query->close();
    $orders_query->close();
    $conn->close();
    ?>
</body>
</html>
