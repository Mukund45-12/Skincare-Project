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
    $profile_id = $_POST["profile_id"];
    $userid = $_POST["user_id"];
    $skinType = $_POST["skin_type"];
    $concerns = $_POST["concerns"];
    $allergies = $_POST["allergies"];
    $preferences = $_POST["preferences"];
    $humidity = $_POST["humidity"];
    $pollution = $_POST["pollution"];
    $temperature = $_POST["temperature"];
    $sunExposureFrequency = $_POST["sun_exposure_frequency"];
    $sunExposureHours = $_POST["sun_exposure_hours"];
    $age = $_POST["age"];

    // Perform profile update logic and update data in the database
    $sql = "UPDATE  profiles  SET 
            profile_id = '$profile_id',
            user_id =  '$userid'
            skin_type='$skinType', 
            concerns='$concerns', 
            allergies='$allergies', 
            preferences='$preferences', 
            humidity='$humidity', 
            pollution='$pollution', 
            temperature='$temperature', 
            sun_exposure_frequency='$sunExposureFrequency', 
            sun_exposure_hours='$sunExposureHours', 
            age='$age'
            WHERE user_id = 1"; // Assuming you have a user_id field for the user

    if ($conn->query($sql) === TRUE) {
        // Profile update successful, redirect to a confirmation page or the profile page itself
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
    <title>Skincare Website - Profile Management</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <div class="container">
        <div class="profile-container">
            <h2>Profile Management</h2>
            <form action="update_profile.php" method="post">

                <label for="userid">Userid:</label>
                <input type="text" id="userid" name="userid">

                <label for="profileid">Profile Id:</label>
                <input type="text" id="profileid" name="profileid">

                <label for="skintype">Skintype:</label>
                <input type="text" id="skintype" name="skintype">

                <label for="concerns">Concerns:</label>
                <input type="text" id="concerns" name="concerns">

                <label for="allergies">Allergies:</label>
                <input type="text" id="allergies" name="allergies">

                <label for="preferences">Preferences:</label>
                <input type="text" id="preferences" name="preferences">

                <label for="humidity">Humidity:</label>
                <input type="text" id="humidity" name="humidity">

                <label for="pollution">Pollution:</label>
                <input type="text" id="pollution" name="pollution">

                <label for="temperature">Temperature:</label>
                <input type="text" id="temperature" name="temperature">

                <label for="sun-exposure-frequency">Sun Exposure Frequency (per week):</label>
                <input type="number" id="sun-exposure-frequency" name="sun_exposure_frequency">

                <label for="sun-exposure-hours">Sun Exposure Hours:</label>
                <input type="number" id="sun-exposure-hours" name="sun_exposure_hours">

                <label for="age">Age:</label>
                <input type="number" id="age" name="age">

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>