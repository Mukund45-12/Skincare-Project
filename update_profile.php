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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user_id from your authentication system
    // For this example, let's assume user_id is passed as a POST parameter
    $user_id = $_POST["user_id"];
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
    $sql = "UPDATE profiles 
            SET 
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
            WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Fetch the updated profile details
        $selectQuery = "SELECT * FROM profiles WHERE user_id = $user_id";
        $result = $conn->query($selectQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the updated profile details
            echo "Profile Updated Successfully<br>";
            echo "Skin Type: " . $row["skin_type"] . "<br>";
            echo "Concerns: " . $row["concerns"] . "<br>";
            echo "Allergies: " . $row["allergies"] . "<br>";
            echo "Preferences: " . $row["preferences"] . "<br>";
            echo "Humidity: " . $row["humidity"] . "<br>";
            echo "Pollution: " . $row["pollution"] . "<br>";
            echo "Temperature: " . $row["temperature"] . "<br>";
            echo "Sun Exposure Frequency: " . $row["sun_exposure_frequency"] . "<br>";
            echo "Sun Exposure Hours: " . $row["sun_exposure_hours"] . "<br>";
            echo "Age: " . $row["age"] . "<br>";
        } else {
            echo "No profile found for user with ID: $user_id";
        }
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <div class="profile-container">
            <h2>Update Profile</h2>
            <form action="update_profile.php" method="post">
                <!-- Assuming user_id is known (authenticated) -->
                <input type="hidden" name="user_id" value="1">

                <label for="skin-type">Skin Type:</label>
                <input type="text" id="skin-type" name="skin_type">

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

</body>

</html>