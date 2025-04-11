<?php
session_start();
require_once 'dbconnection.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href = 'loginafya.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details (name, email, etc.)
$user_query = $conn->prepare("SELECT name, email, phone, address, profile_picture FROM users WHERE user_id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user_result = $user_query->get_result();
$user_info = $user_result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update profile details
    if (isset($_POST['update_profile'])) {
        $new_name = htmlspecialchars($_POST['name']);
        $new_email = htmlspecialchars($_POST['email']);
        $new_phone = htmlspecialchars($_POST['phone']);
        $new_address = htmlspecialchars($_POST['address']);
        
        $update_query = $conn->prepare("UPDATE users SET name = ?, email = ?, phone = ?, address = ? WHERE user_id = ?");
        $update_query->bind_param("ssssi", $new_name, $new_email, $new_phone, $new_address, $user_id);

        if ($update_query->execute()) {
            echo "<script>alert('Profile updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating profile.');</script>";
        }
    }

    // Upload profile picture
    if (isset($_FILES['profile_picture'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'png', 'jpeg']) && $_FILES['profile_picture']['size'] < 2000000) {
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
                $update_picture_query = $conn->prepare("UPDATE users SET profile_picture = ? WHERE user_id = ?");
                $update_picture_query->bind_param("si", $target_file, $user_id);

                if ($update_picture_query->execute()) {
                    echo "<script>alert('Profile picture updated successfully!');</script>";
                }
            } else {
                echo "<script>alert('Error uploading profile picture.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type or size.');</script>";
        }
    }

    // Change password
    if (isset($_POST['new_password'])) {
        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

        $update_password_query = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $update_password_query->bind_param("si", $new_password, $user_id);

        if ($update_password_query->execute()) {
            echo "<script>alert('Password updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating password.');</script>";
        }
    }
}
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
    <div class="nav">
        <a href="afya.html">Home</a>
        <a href="aboutus.html">About Us</a>
        <a href="patient.php">Patient Form</a>
        <a href="order.php">Order</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Log Out</a>
    </div>

    <div class="profile-container">
        <h3>User Information</h3>
        <div class="profile-section">
            <?php if ($user_info): ?>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user_info['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user_info['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($user_info['phone']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($user_info['address']); ?></p>
                <p><strong>Profile Picture:</strong> <img src="<?php echo htmlspecialchars($user_info['profile_picture']); ?>" alt="Profile Picture" width="100"></p>
            <?php else: ?>
                <p>No user information available.</p>
            <?php endif; ?>
        </div>

        <form method="POST" action="profile.php">
            <h3>Edit Profile</h3>
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user_info['name']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_info['email']); ?>" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user_info['phone']); ?>" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user_info['address']); ?>">
            
            <button type="submit" name="update_profile">Update Profile</button>
        </form>

        <form method="POST" enctype="multipart/form-data" action="profile.php">
            <h3>Update Profile Picture</h3>
            <input type="file" name="profile_picture" required>
            <button type="submit">Upload</button>
        </form>

        <form method="POST" action="profile.php">
            <h3>Change Password</h3>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <button type="submit">Update Password</button>
        </form>
    </div>
</body>
</html>
