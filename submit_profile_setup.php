<?php
session_start();
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];


    $gender = $_POST['gender'];
    $skin_type = $_POST['skin_type'];
    $region = $_POST['region'];
    $sun_exposure = $_POST['sun_exposure'];
    $allergies = $_POST['allergies'];


    $sql = "UPDATE users SET 
            gender = '$gender', 
            skin_type = '$skin_type', 
            region = '$region', 
            sun_exposure = '$sun_exposure', 
            allergies = '$allergies'
            WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['success_message'] = "Changes saved successfully!";

        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error updating profile setup data: " . $conn->error;
        header("Location: profile_setup.php");
        exit();
    }
}

$conn->close();
