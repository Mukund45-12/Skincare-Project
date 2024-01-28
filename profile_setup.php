<?php

session_start();
include 'dbcon.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$data = [];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = [
        'gender' => $row['gender'],
        'skin_type' => $row['skin_type'],
        'region' => $row['region'],
        'sun_exposure' => $row['sun_exposure'],
        'allergies' => $row['allergies']
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Setup - DermaCore</title>
    <link rel="stylesheet" href="./css/profile_setup.css">
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
            <a href="dashboard.php" class="btn-logout">Home</a>
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
    </nav>

    <div class="background">
        <div class="container">
            <h1 class="title">Profile Setup</h1>

            <?php if (!empty($success_message)) { ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php } ?>

            <form class="profile-setup-form" action="submit_profile_setup.php" method="post">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="Male" <?php if ($data['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($data['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if ($data['gender'] === 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="skin-type">Skin Type</label>
                    <select id="skin-type" name="skin_type">
                        <option value="Dry" <?php if ($data['skin_type'] === 'Dry') echo 'selected'; ?>>Dry</option>
                        <option value="Oily" <?php if ($data['skin_type'] === 'Oily') echo 'selected'; ?>>Oily</option>
                        <option value="Combination" <?php if ($data['skin_type'] === 'Combination') echo 'selected'; ?>>Combination</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="region">Region</label>
                    <select id="region" name="region">
                        <option value="Dhaka" <?php if ($data['region'] === 'Dhaka') echo 'selected'; ?>>Dhaka</option>
                        <option value="Sylhet" <?php if ($data['region'] === 'Sylhet') echo 'selected'; ?>>Sylhet</option>
                        <option value="Chottogram" <?php if ($data['region'] === 'Chottogram') echo 'selected'; ?>>Chottogram</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sun-exposure">Sun Exposure (days/week)</label>
                    <select id="sun-exposure" name="sun_exposure">
                        <option value="2" <?php if ($data['sun_exposure'] === '2') echo 'selected'; ?>>2 days</option>
                        <option value="3" <?php if ($data['sun_exposure'] === '3') echo 'selected'; ?>>3 days</option>
                        <option value="4" <?php if ($data['sun_exposure'] === '4') echo 'selected'; ?>>4 days</option>
                        <option value="5" <?php if ($data['sun_exposure'] === '5') echo 'selected'; ?>>5 days</option>
                        <option value="6" <?php if ($data['sun_exposure'] === '6') echo 'selected'; ?>>6 days</option>
                        <option value="7" <?php if ($data['sun_exposure'] === '7') echo 'selected'; ?>>7 days</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="allergies">Allergies</label>
                    <select id="allergies" name="allergies">
                        <option value="Yes" <?php if ($data['allergies'] === 'Yes') echo 'selected'; ?>>Yes</option>
                        <option value="No" <?php if ($data['allergies'] === 'No') echo 'selected'; ?>>No</option>
                    </select>
                </div>
                <button type="submit" class="btn">Save</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php $conn->close(); ?>