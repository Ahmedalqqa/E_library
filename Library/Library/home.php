<?php

require_once("classes/class_home.php");
$home = new home();

if (!$home->auto_header_home()) {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="lib/style.css">
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/49/f7/25/49f725a9f2b62ea80603f3fe51289735.jpg" type="image/x-icon">
    <style>
        .profileimg {
            width: 60px;
            height: 60px;
            border-radius: 30px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="home.php">E-Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="books/history.php">Historical books</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="books/children.php">Children's books</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="books/magic.php">Science Fiction books</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="books/education.php">Educational books</a></li>
                        </ul>
                    </li>

                    <?php
                    require_once("classes/class_user.php");
                    $user = new user();
                    if (($user->check_admin())) {
                        echo ('<li class="nav-item"> <a class="nav-link active" aria-current="page" href="addbook.php">Add book</a> </li>');
                    }
                    ?>
                </ul>
                <img src="image_user/<?php echo ($user->get_userhomeimage()); ?>" class="profileimg">
                <form class="d-flex">
                    <button class="btn btn-danger"><a href="logout.php" style="text-decoration: none; color: white;">Log Out</a></button>
                </form>
            </div>
        </div>
    </nav>
    <div class="slider">
        <div>
            <img src="image/4.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <!-- start categroy -->
    <div class="cat">
        <div class="container">
            <h1 class="text-center m-5">Categories </h1>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="books/history.php">
                        <div><img src="image/1.jpg" alt=""></div>
                        <h5 class="m-3">Historical books</h5>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="books/education.php">
                        <div><img src="image/5.jpg" alt=""></div>
                        <h5 class="m-3">Educational books</h5>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="books/magic.php">
                        <div><img src="image/3.jpg" alt=""></div>
                        <h5 class="m-3">Science Fiction books</h5>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="books/children.php">
                        <div><img src="image/2.jpg" alt=""></div>
                        <h5 class="m-3">Children's books</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="lib/bootstrap.bundle.js"></script>
</body>

</html>