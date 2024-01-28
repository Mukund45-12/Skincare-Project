<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - DermaCore</title>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-left">
            <span class="welcome-message">
                <?php

                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT fullname FROM users WHERE id = '$user_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "Welcome, " . $row['fullname'] . "!";
                    }
                }
                ?>
            </span>
        </div>
        <div class="navbar-right">
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
    </nav>

    <div class="dashboard-content">
        <div class="left-column">
            <div class="profile-hud">
                <div class="user-profile">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM users WHERE id = '$user_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo "<p class='highlighted'>" . $row['fullname'] . "</p>";
                            echo "<p> Gender: " . $row['gender'] . "</p>";
                            echo "<p> Skin Type: " . $row['skin_type'] . "</p>";
                            echo "<p> Region: " . $row['region'] . "</p>";
                            echo "<p> Sun Exposure: " . $row['sun_exposure'] . " days/week</p>";
                            echo "<p> Allergies: " . $row['allergies'] . "</p>";
                        }
                    }
                    ?>
                </div>
                <a href="profile_setup.php" class="btn-edit-profile edit-button">Edit Profile</a>
            </div>
        </div>

        <div class="right-column">
            <div class="box">
                <h2>Lookup your Problem</h2>
                <a href="search.php" class="btn-edit-profile"> Search</a>
            </div>
            <div class="box">
                <h2>Trusted Stores</h2>
                <a href="stores.php" class="btn-edit-profile"> View</a>
            </div>
            <div class="box">
                <h2>Community</h2>
                <a href="blog.php" class="btn-edit-profile"> View</a>
            </div>
            <div class="box">
                <h2>Specialists</h2>
                <a href="specialists.php" class="btn-edit-profile"> Enter</a>
            </div>
        </div>
    </div>
</body>

</html>