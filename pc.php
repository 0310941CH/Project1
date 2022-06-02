<?php
$tabselect = 3;
session_start();
include_once("config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notch | PC</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="search.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
</head>

<body>
    <?php include "navbar.php" ?>
    <?php
    if (isset($_GET["sort"])) {

        if (strpos($_GET["sort"], 'nAsc') !== false) { // if $_GET["sort"] nAsc concludes then..
            $columnName = "productname";
            $sortBy = "asc";
        } else if (strpos($_GET["sort"], 'nDesc') !== false) {
            $columnName = "productname";
            $sortBy = "desc";
        } else if (strpos($_GET["sort"], 'pDesc') !== false) {
            $columnName = "price";
            $sortBy = "desc";
        } else if (strpos($_GET["sort"], 'pAsc') !== false) {
            $columnName = "price";
            $sortBy = "asc";
        }

        // Output with added filter
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie ORDER BY $columnName $sortBy");
        $stmt->execute(['scategorie' => "pc"]);
        $data = $stmt->fetchAll();

        // search order options
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="pc.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="pc.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="pc.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="pc.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';

        echo "<div class='productplace'>";
        foreach ($data as $product) {
            echo "<div class='productinner'>";
            echo "<div class='imagesize'>";
            echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>" . "<br>";
            echo "</div>" . "<br>";
            echo "<div class='innerinfo'>";
            echo $product["productname"] . "<br>";
            echo "</div> " . "<br>";
            echo "<div class='pricebutton'>";
            echo "€ " . $product["price"];
            echo "<br>";
            echo "<a class='detailbutton' href='product.php?pid=" . $product["id"] . "'>Details</a>";
            echo "<br>";
            echo "<a class='shopbutton' href='cart_add.php?id=" . $product["id"] . "&&page=pc.php'>Add to cart</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // output without added filter
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie");
        $stmt->execute(['scategorie' => "pc"]);
        $data = $stmt->fetchAll();

        // search order options
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="pc.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="pc.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="pc.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="pc.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';

        echo "<div class='productplace'>";
        foreach ($data as $product) {
            echo "<div class='productinner'>";
            echo "<div class='imagesize'>";
            echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>" . "<br>";
            echo "</div>" . "<br>";
            echo "<div class='innerinfo'>";
            echo $product["productname"] . "<br>";
            echo "</div> " . "<br>";
            echo "<div class='pricebutton'>";
            echo "€ " . $product["price"];
            echo "<br>";
            echo "<a class='detailbutton' href='product.php?pid=" . $product["id"] . "'>Details</a>";
            echo "<br>";
            echo "<a class='shopbutton' href='cart_add.php?id=" . $product["id"] . "&&page=pc.php'>Add to cart</a>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo "</div>";
    ?>

</body>

</html>