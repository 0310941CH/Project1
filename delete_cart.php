<?php
session_start();

//unset the product to remove it from array.
$productPlace = array_search($_GET["pid"], $_SESSION["shoppingcart"]);
unset($_SESSION["shoppingcart"][$productPlace]);

header("location: shoppingcart.php");
exit(0);
