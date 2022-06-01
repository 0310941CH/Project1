<?php
session_start();

//Check if the product already is inside the cart, add if it isnt.
if (!in_array($_GET['id'], $_SESSION['shoppingcart'])) {
    array_push($_SESSION['shoppingcart'], $_GET['id']);
}

header("Location:" . $_GET['page'] . "");
