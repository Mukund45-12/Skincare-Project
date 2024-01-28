<?php

session_start();
include 'dbcon.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DermaCore</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="background">
        <div class="outer-border">
            <div class="container">
                <div class="title-container">
                    <h1 class="title">DermaCore</h1>
                    <div class="shine"></div>
                </div>
                <div class="buttons">
                    <a href="login.php" class="btn">Login</a>
                    <a href="signup.html" class="btn">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>