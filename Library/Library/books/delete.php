<?php
require_once "../classes/class_catrgories.php";
$catrgories = new catrgories();

if (!$catrgories->auto_header_home()) {
    header("location: ../index.php");
}
if (isset($_GET['bookname'])) {
    $bookname = $_GET['bookname'];
} else {
    $bookname = 0;
}

$sql = "DELETE FROM `book` WHERE `book`.`bookname` = '$bookname'";

$result = $catrgories->runDML($sql);
if ($result) {
    header("location: ../home.php");
}
