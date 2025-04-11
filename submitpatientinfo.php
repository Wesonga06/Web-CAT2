<?php
session_start();
require_once 'dbconnection.php';

// Check if the user is logged in by checking the session
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    
    // Get form data
    $fullname = $_POST['fullname'];
    $idnumber = $_POST['idnumber'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $symptoms = $_POST['symptoms'];
    $medical_conditions = $_POST['medical_conditions'];
    $contact_name = $_POST['contact_name'];
    $contact_phone = $_POST['contact_phone'];
    $relationship = $_POST['relationship'];

    // Prepare and insert patient information into the database
    $stmt = $conn->prepare("INSERT INTO patient_info (user_id, full_name, id_number, date_of_birth, email, gender, symptoms, medical_conditions) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $user_id, $fullname, $idnumber, $dob, $email, $gender, $symptoms, $medical_conditions);

    if ($stmt->execute()) {
        // Prepare and insert emergency contact information into the database
        $stmt2 = $conn->prepare("INSERT INTO emergency_contacts (user_id, name, phone, relationship) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("isss", $user_id, $contact_name, $contact_phone, $relationship);

        if ($stmt2->execute()) {
            echo "<script>alert('Patient and emergency contact information saved successfully!'); window.location.href = 'profile.php';</script>";
        } else {
            echo "<script>alert('Failed to save emergency contact information: " . $stmt2->error . "'); window.location.href = 'patient_form.php';</script>";
        }
    } else {
        echo "<script>alert('Failed to save patient information: " . $stmt->error . "'); window.location.href = 'patient_form.php';</script>";
    }

    // Close prepared statements and database connection
    $stmt->close();
    $stmt2->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request. Please log in first.'); window.location.href = 'loginafya.php';</script>";
}
?>

