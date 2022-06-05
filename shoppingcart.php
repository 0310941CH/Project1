<?php
session_start();

if (!isset($_SESSION["shoppingcart"])) {
    $_SESSION["shoppingcart"] = array();
}

include_once("config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notch | Shoppingcart</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="shoppingcart.css">
    <link rel="stylesheet" href="index.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/cart.js"></script>
</head>

<body onload="total()">
    <?php include "navbar.php" ?>
    <?php
    //Variables 
    $total = 0;
    $countCart = count($_SESSION["shoppingcart"]);

    if (!empty($_SESSION["shoppingcart"])) { //If the cart isnt empty, display it otherwise show "error" message.

        $loop = 0; //Loop needed to increase the id's to get the correct amount & prices in cart.js

        echo '<div class="shoppingcart">
        <div class="topshop">
        <p class="lefttext">PRODUCTS</p>
        <p class="amount">AMOUNT</p>
        <p class="righttext">PRICE</p>
        </div>';
        foreach ($_SESSION["shoppingcart"] as $id) {
            $stmt  = $pdo->prepare("SELECT * FROM products WHERE id = :pid");
            $stmt->execute(['pid' => $id]);
            $data = $stmt->fetchAll();
            foreach ($data as $product) {
                $loop++;
                echo '<form method="POST" action="checkout.php">';
                echo '<input type="hidden" id="priceid' . $loop . '" name="productid" value="' . $product["id"] . '">';
                echo '<input type="hidden" name="form" id="productPrice' . $loop . '" value="' . $product["price"] . '">';
                echo '<div class="firstrowshop">';
                echo '<div class="productandimage">';
                echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='imageshop'><br>";
                echo '<p class="lefttext"><input type="text" class="inputtext" readonly="readonly" value="' . $product["productname"] . '"/></p>';
                echo "<a href='delete_cart.php?pid=" . $product["id"] . "'><img src='images/trash.png' class='binicon'></a>";
                echo '</div>';
                echo '<div class="plusminbutton">';
                echo '<button type="button" class="plusbutton" onclick="cartDown(' . $loop . '); total()">-</button>';
                echo '<input type="number" name="form" " class="quantity" id="quantity' . $loop . '" min="1" max="10" value="1">';
                echo '<button type="button" class="minbutton" onclick="cartUp(' . $loop . '); total()">+</button></div>'; // Buttons to substract and add to the quantity of a product
                echo '<p class="righttext"><input type="text" name="form" id="priceOutput' . $loop . '" class="inputtext" readonly="readonly" value="€ ' . $product["price"] . '"/></p></div>';
            }
        }
        echo '<div class="topshop">
        <p class="lefttext">PRODUCTS</p>';
        echo '<input type="number" name="form" " class="quantity" id="cartcount" value="' . $countCart . '">';
        echo '<p class="righttext"><input type="text" id="priceTotal" class="inputtext" readonly="readonly" value=""/></p>
        </div>
        <input class="submitCart" type="submit" name="checkout" value="checkout"></form>';
    } else {
        echo "<div class='noitems'><h1>Huh? There is nothing in your cart yet!</h1>
        <p>Add a product to your cart and check again.</p></div>";
    }

    ?>

</body>

</html>