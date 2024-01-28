<?php
session_start();
$message = '';

include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // sanitization
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $password = mysqli_real_escape_string($conn, $password);

    // password hash
    $hashed_password = md5($password);

    $sql = "INSERT INTO users (fullname, email, phone, password) VALUES ('$fullname', '$email', '$phone', '$hashed_password')";


    if ($conn->query($sql) === TRUE) {

        session_start();

        $user_id = $conn->insert_id;
        $_SESSION['user_id'] = $user_id;
        header("Location: profile_setup.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
