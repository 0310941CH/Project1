<?php
session_start();
include_once("config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="product.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
</head>

<body>
<?php include "navbar.php" ?>
    <?php
    $id = $_GET["pid"];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $data = $stmt->fetchAll();

    foreach ($data as $product) {
        echo '<div class="product">';
        echo '<div class="productleft">';
        echo  '<h1 class="producttitle">' . strtoupper($product["productname"]) . "<h1>";
        echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>";
        echo '<p class="pricetext"> € ' . $product["price"] . "</p>";
        echo "</div>";
        echo '<div class="line">';
        echo "</div>";
    }
    echo '<div class="productright">';
    echo "<h1>SPECIFICATIES</h1>";
    echo "<table>";
    // JSON decode so you can show all specs of the products.
    $specData = json_decode($product['specificaties'], true);
    // foreach loop so you can show all specifications.
    foreach ($specData as $specName => $specData) {
        echo "<td>" . "<p> <b>" . strtoupper($specName) . ":" . " </b><p>" . "</td>";
        echo "<td>" . strtoupper($specData) . "</td>";
        echo "</tr>";
    };
    echo "</table>";
    ?>
    <div class="detailbuttons">
    <button class="likebutton"> <img class="likebuttonimage" src="images/heart-regular.png" alt="wtf"></button>
    <button class="chartbutton"> ADD TO CART <img class="chartimage" src="images/shoppingCard.png" alt="wtf"></button>
    </div>
    </div>
    </div>


</body>

</html>