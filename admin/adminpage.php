<?php
session_start();
include_once("./config/connection.php");
// Checking if admin is logged in otherwise sending it back to adminlogin.php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminNavbar.css">
    <script src="./js/searchbar.js"></script>
    <script src="./js/dropdown.js"></script>
    <title>Admin Panel</title>
</head>

<body>
    <?php include "adminNavbar.php" ?>

    <form method="POST" action="adminCreate.php">
        <button type="submit" class="button" name="submitCreate">Create a new product</button>
    </form>
</body>