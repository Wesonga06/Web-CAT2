<?php
session_start();
require_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
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

    // Insert into patient_info table
    $stmt = $conn->prepare("INSERT INTO patient_info (user_id, full_name, id_number, date_of_birth, email, gender, symptoms, medical_conditions) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $user_id, $fullname, $idnumber, $dob, $email, $gender, $symptoms, $medical_conditions);

    if ($stmt->execute()) {
        // Insert into emergency_contacts table
        $stmt2 = $conn->prepare("INSERT INTO emergency_contacts (user_id, name, phone, relationship) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("isss", $user_id, $contact_name, $contact_phone, $relationship);

        if ($stmt2->execute()) {
            echo "<script>alert('Patient and emergency contact information saved successfully!'); window.location.href = 'profile.php';</script>";
        } else {
            echo "<script>alert('Failed to save emergency contact information.'); window.location.href = 'patient_form.php';</script>";
        }
    } else {
        echo "<script>alert('Failed to save patient information.'); window.location.href = 'patient_form.php';</script>";
    }

    $stmt->close();
    $stmt2->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request. Please log in first.'); window.location.href = 'loginafya.php';</script>";
}
?>
