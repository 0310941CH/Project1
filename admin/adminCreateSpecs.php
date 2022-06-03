<?php
session_start();
include_once("./config/connection.php");
if ($_SESSION['loggedInAdmin'] == 1) {
    
} else {
    header("Location: adminlogin.php");
    exit();
}
?>

<!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminNavbar.css">
    <script src="./js/searchbar.js"></script>
    <script src="./js/dropdown.js"></script>
    <title>Admin Panel Create</title>
    </head>

    <body>
        <?php include "adminNavbar.php" ?>
    </body>