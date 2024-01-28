<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skincare_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Perform registration logic and insert data into the database
    $sql = "INSERT INTO users (email, phone) VALUES ('$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to profile management
        header("Location: profile.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare Website - User Registration</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2>User Registration</h2>
            <form action="register.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>

</body>

</html>