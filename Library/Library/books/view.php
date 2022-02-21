<?php
require_once('../classes/class_catrgories.php');
$view = new catrgories();
if (!$view->auto_header_home()) {
    header("location: ../index.php");
}


if (isset($_GET['bookname'])) {
    $bookname = $_GET['bookname'];
} else {
    $bookname = 0;
}

$bookData = ($view->getData("book", "*", "bookname = '$bookname' "))->fetch(PDO::FETCH_ASSOC);
// var_dump($bookData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../lib/style.css">
    <link rel="stylesheet" href="../lib/bootstrap.min.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/49/f7/25/49f725a9f2b62ea80603f3fe51289735.jpg" type="image/x-icon">
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../home.php">E-Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="history.php">Historical books</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="children.php">Children's books</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="magic.php">Science Fiction books</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="education.php">Educational books</a></li>
                        </ul>
                    </li>

                    <?php
                    require_once("../classes/class_user.php");
                    $user = new user();
                    if (($user->check_admin())) {
                        echo ('<li class="nav-item"> <a class="nav-link active" aria-current="page" href="../addbook.php">Add book</a> </li>');
                    }
                    ?>

                </ul>
                <img src="../image_user/<?php echo ($user->get_userhomeimage()); ?>" class="profileimg">
                <form class="d-flex">
                    <button class="btn btn-danger"><a href="../logout.php" style="text-decoration: none; color: white;">Log Out</a></button>
                </form>
            </div>
        </div>
    </nav>
    <div class="rent">
        <h2 class="text-center m-5"><?php echo $bookData['bookname'] ?></h2>
        <form action="" method="post">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Book Image</th>
                        <th scope="col">Publish Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="../image/uploads/<?php echo $bookData['bookimage'] ?>" alt="" width="90px" height="50px"></td>
                        <td><?php echo $bookData['bookdate'] ?></td>
                        <td><?php echo $bookData['bookprice'] ?></td>
                        <td><?php echo $bookData['bookdesc'] ?></td>
                    </tr>
                </tbody>
            </table>
        </form>

    </div>



    <script src="../lib/bootstrap.bundle.js"></script>
</body>

</html>