<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$specialistsQuery = "SELECT * FROM specialists";
$specialistsResult = $conn->query($specialistsQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Specialists - DermaCore</title>
    <link rel="stylesheet" href="./css/search.css">
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

    <div class="container">
        <div class="user-details">
        </div>

        <div class="search-results">
            <h2>Specialists</h2>
            <div class="search-results-products">
                <?php
                if ($specialistsResult->num_rows > 0) {
                    echo "<div class='product-grid'>";
                    while ($specialistRow = $specialistsResult->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<h3>" . $specialistRow['specialist_name'] . "</h3>";
                        echo "<p class='specialist-expertise'>" . $specialistRow['expertise'] . "</p>";
                        echo "<p class='specialist-contact'>Contact: " . $specialistRow['Contact'] . "</p>";
                        // Add more details as needed
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "<div class='no-results'>No specialists found.</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>