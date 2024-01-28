<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$skinType = '';
$sunExposure = '';
$allergies = '';
$region = '';
$skinProblem = '';

$user_id = $_SESSION['user_id'];
$sqlUser = "SELECT skin_type, sun_exposure, allergies, region FROM users WHERE id = '$user_id'";
$resultUser = $conn->query($sqlUser);

if ($resultUser->num_rows > 0) {
    $rowUser = $resultUser->fetch_assoc();
    $skinType = $rowUser['skin_type'];
    $sunExposure = $rowUser['sun_exposure'];
    $allergies = $rowUser['allergies'];
    $region = $rowUser['region'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Skincare Search - DermaCore</title>
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
            <p><strong>Skin Type:</strong> <span><?php echo $skinType; ?></span></p>
            <p><strong>Sun Exposure:</strong> <span><?php echo $sunExposure; ?> days/week</span></p>
            <p><strong>Allergies:</strong> <span><?php echo $allergies; ?></span></p>
        </div>

        <div class="search-criteria">
            <h2>Search Criteria</h2>
            <form action="" method="POST" class="search-form" id="searchForm">
                <label for="skin-problem">Select a Skin Problem:</label>
                <select id="skin-problem" name="skin_problem">
                    <option value="Uneven tone" <?php if ($skinProblem === 'Uneven tone') echo 'selected'; ?>>Uneven tone</option>
                    <option value="Acne scars" <?php if ($skinProblem === 'Acne scars') echo 'selected'; ?>>Acne scars</option>
                    <option value="millia" <?php if ($skinProblem === 'millia') echo 'selected'; ?>>Millia</option>
                    <option value="blackhead" <?php if ($skinProblem === 'blackhead') echo 'selected'; ?>>Blackhead</option>
                    <!-- Add more skin problems -->
                </select>
                <br><br>
                <button type="submit" class="btn-search">Search</button>
            </form>
        </div>

        <script>
            document.getElementById('searchForm').addEventListener('submit', function(event) {
                const selectBox = document.getElementById('skin-problem');
                const selectedValue = selectBox.options[selectBox.selectedIndex].value;
                sessionStorage.setItem('selectedSkinProblem', selectedValue);
            });

            document.addEventListener('DOMContentLoaded', function() {
                const selectedValue = sessionStorage.getItem('selectedSkinProblem');
                if (selectedValue) {
                    const selectBox = document.getElementById('skin-problem');
                    for (let i = 0; i < selectBox.options.length; i++) {
                        if (selectBox.options[i].value === selectedValue) {
                            selectBox.selectedIndex = i;
                            break;
                        }
                    }
                }
            });
        </script>

        <div class="search-results">
            <h2>Search Results</h2>
            <div class="search-results-products">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $skinProblem = $_POST['skin_problem'];


                    $user_id = $_SESSION['user_id'];
                    $sqlUser = "SELECT region FROM users WHERE id = '$user_id'";
                    $resultUser = $conn->query($sqlUser);

                    if ($resultUser->num_rows > 0) {
                        $rowUser = $resultUser->fetch_assoc();
                        $userRegion = $rowUser['region'];


                        $sql = "SELECT p.*, s.store_name, s.store_region FROM products p 
                        INNER JOIN stores s ON p.store_id = s.store_id 
                        WHERE p.skin_problem = '$skinProblem' 
                        AND p.suitable_skin_type = '$skinType' 
                        AND p.suitable_for_allergies = '$allergies'
                        AND s.store_region = '$userRegion'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            echo "<div class='sunscreen-recommendation'>";
                            if ($sunExposure >= 5) {
                                echo "<p>Based on your sun exposure, using sunscreen with SPF 50+ would be suitable.</p>";
                            } else {
                                echo "<p>Based on your sun exposure, using sunscreen with SPF 30+ would be suitable.</p>";
                            }
                            echo "</div>";
                        } else {
                            echo "<div class='no-results'>No products found for the selected criteria in your region.</div>";
                        }

                        echo "<div class='product-grid'>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='product'>";
                            echo "<h3>" . $row['product_name'] . "</h3>";
                            echo "<p class='description'>" . $row['description'] . "</p>";
                            echo "<p class='price'>Price: $" . $row['price'] . "</p>";
                            echo "<p class='store-name'>Available at: " . $row['store_name'] . "</p>";
                            echo "<p class='store-region'>Store Region: " . $row['store_region'] . "</p>";

                            $imageURL = $row['image_path'];
                            echo "<img style='width: 200px;' src='./media/" . $imageURL . "'alt='Product Image'>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>