<?php
session_start();

if (!isset($_SESSION["shoppingcart"])) {
    $_SESSION["shoppingcart"] = array();
}

include_once("config/connection.php");

header("refresh:8;url=index.php");

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
    <link rel="stylesheet" href="shoppingcart.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
</head>

<body class="waitCursor">
    <?php include "navbar.php" ?>
    <div class="centertext">
        <h1>We have no way of processing your payment</h1>
        <p>We can't process your payment, your cart will be emptied and you will be redirected to the index.</p>
        <div>
            <div class="animationplace">
         <div class='animation1'></div>
         <div class='animation2'></div>
         <div class='animation3'></div>
            </div>
            <?php
            unset($_SESSION["shoppingcart"]); // unset it to empty, redirect to index.php to set a empty session again
            ?>
</body>

</html>