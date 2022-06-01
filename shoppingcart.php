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

<body>
    <?php include "navbar.php" ?>
    <?php
    // Needed variables 
    $total = 0;
    $countItems = count($_SESSION["shoppingcart"]);

    if (!empty($_SESSION["shoppingcart"])) { //If the cart isnt empty, display it otherwise show "error" message.
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
                echo '<form method="POST">';
                echo '<input type="hidden" name="productid" value="' . $product["id"] . '">';
                echo '<div class="firstrowshop">';
                echo '<div class="productandimage">';
                echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='imageshop'><br>";
                echo '<p class="lefttext"><input type="text" class="inputtext" readonly="readonly" value="' . $product["productname"] . '"/></p>';
                echo "<a href='delete_cart.php?pid=" . $product["id"] . "'><img src='images/trash.png' class='binicon'></a>";
                echo '</div>';
                echo '<div class="plusminbutton">';
                echo '<button type="button" class="plusbutton" onclick="cartDown()">-</button>';
                echo '<input type="number" class="quantity" id="quantity" min="1" max="10" value="1">';
                echo '<button type="button" class="minbutton" onclick="cartUp()">+</button></div>'; // Buttons to substract and add to the quantity of a product
                echo '<p class="righttext"><input type="text" class="inputtext" readonly="readonly" value="€ ' . $product["price"] . '"/></p></div>';
                $total += $product["price"];
            }
        }
        echo '<div class="topshop">
        <p class="lefttext">PRODUCTS</p>
        <p class="amount">' . $countItems . '</p>
        <p class="righttext"><input type="text" class="inputtext" readonly="readonly" value="€ ' . $total . '"/></p>
        </div>
        <input class="submitCart" type="submit" name="checkout" value="checkout"></form>';
    } else {
        echo "<div class='noitems'><h1>Huh? There is nothing in your cart yet!</h1>
        <p>Add a product to your cart and check again.</p></div>";
    }

    ?>

</body>

</html>