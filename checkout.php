<?php
session_start();

if (!isset($_SESSION["shoppingcart"])) {
    $_SESSION["shoppingcart"] = array();
}

include_once("config/connection.php");

if (!isset($_SESSION["loggedInUser"])) {
    // isn't logged in, redirect to login.php
    header("location: login.php");
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notch | Checkout</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="shoppingcart.css">
    <link rel="stylesheet" href="index.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/cart.js"></script>
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="centertext">
        <h1>Order processing</h1>
        <p>Your payment is processing, aanvulling</p>
        <div>

            <?php
            if (isset($_SESSION["loggedInUser"])) {
            } else {
                header("Location: login.php");
                exit(0);
            }
            ?>
</body>

</html>