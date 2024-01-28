<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];


    $sql = "INSERT INTO messages (user_id, message, created_at) VALUES ('$user_id', '$message', CURRENT_TIMESTAMP)";
    $result = $conn->query($sql);
}

$sqlMessages = "SELECT m.message, m.created_at, u.fullname, u.region 
                FROM messages m 
                INNER JOIN users u ON m.user_id = u.id 
                ORDER BY m.created_at DESC";
$resultMessages = $conn->query($sqlMessages);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Community Hub - DermaCore</title>
    <link rel="stylesheet" href="./css/blog.css">
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
        <div class="message-box">
            <h2>Post a Message</h2>
            <form action="" method="POST" class="message-form">
                <textarea name="message" placeholder="Write your message here..." rows="4" cols="140"></textarea>
                <br><br>
                <button type="submit" class="btn">Post</button>
            </form>
        </div>

        <div class="messages">
            <h2>Community Messages</h2>
            <?php
            if ($resultMessages->num_rows > 0) {
                while ($row = $resultMessages->fetch_assoc()) {
                    echo "<div class='message'>";
                    echo "<div class='overlay'>";
                    echo "<p class='username'>" . $row['fullname'] . " (" . $row['region'] . ")</p>";
                    echo "<p class='timestamp'>Posted at: " . $row['created_at'] . "</p>";
                    echo "<p class='message-content'>" . $row['message'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No messages yet.</p>";
            }
            ?>
        </div>
    </div>

</body>

</html>