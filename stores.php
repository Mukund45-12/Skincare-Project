<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$storesQuery = "SELECT * FROM stores";
$storesResult = $conn->query($storesQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stores - DermaCore</title>
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
            <h2>Stores</h2>
            <div class="search-results-products">
                <?php
                if ($storesResult->num_rows > 0) {
                    echo "<div class='product-grid'>";
                    while ($storeRow = $storesResult->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<h3>" . $storeRow['store_name'] . "</h3>";
                        echo "<p class='store-address'>" . $storeRow['store_address'] . "</p>";
                        echo "<p class='store-contact'>Contact: " . $storeRow['store_contact'] . "</p>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "<div class='no-results'>No stores found.</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>