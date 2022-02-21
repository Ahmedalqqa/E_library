<?php

require_once("classes/class_logout.php");
$logout = new logout();

$logout->destroy_cookie_session();          //calling function in database_class to destroy session and cookie.
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="lib/style.css">
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/49/f7/25/49f725a9f2b62ea80603f3fe51289735.jpg" type="image/x-icon">
    <style>
        .account2 {
            text-decoration: none;
            color: white;
            background-color: black;
            border: 1px solid black;
            text-align: center;
            display: block;
            width: 200px;
            margin:20px auto;
            padding: 10px;
            font-weight: bold;
        }
        .account2:hover{
            color: white;
        }
    </style>
</head>

<body>
    <div class="login">
        <h1 class="text-center">logout Done</h1>
        <form method="post">
            <a href="index.php" class="account2">login</a>
            <a href="register.php" class="account2">Create New Account..?</a>
        </form>
    </div>
    <script src="lib/bootstrap.bundle.js"></script>
</body>

</html>