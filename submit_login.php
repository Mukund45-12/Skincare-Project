<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - DermaCore</title>
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        .error-box {
            font-size: 3rem;
            width: 300px;
            margin: 100px auto;
            padding: 100px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include 'dbcon.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $hashed_password = md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_password'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<div class='error-box'>Invalid email or password. Please try again.</div>";
            header("refresh:2; url=login.php");
        }
    }

    $conn->close();
    ?>
</body>

</html>