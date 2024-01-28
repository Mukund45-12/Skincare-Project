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
    <meta charset="UTF-8" />
    <title>Login - DermaCore</title>
    <link rel="stylesheet" href="./css/login.css" />
</head>

<body>

    <nav class="navbar">
        <a href="index.php" class="btn-logout">Home</a>
        </div>
    </nav>

    <div class="background">
        <div class="container">
            <h1 class="title">Login</h1>
            <form class="login-form" action="submit_login.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Eg. example@email.com" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your Password Here" required />
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>

</html>