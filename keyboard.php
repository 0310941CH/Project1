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
    <title>Notch | Keyboard</title>
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

        if (strpos($_GET["sort"], 'nAsc') !== false) { // als $_GET["sort"] nAsc bevat dan..
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

        // Output met toegepast filter
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie ORDER BY $columnName $sortBy");
        $stmt->execute(['scategorie' => "keyboard"]);
        $data = $stmt->fetchAll();

        // search order manieren
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="keyboard.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="keyboard.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="keyboard.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="keyboard.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
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
            echo "<a href='product.php?pid=" . $product["id"] . "'>Details</a>";
            echo "<br>";
            echo "<input type='submit' class='shopbutton' value='Add to cart'>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // output zonder toegepast filter
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie");
        $stmt->execute(['scategorie' => "keyboard"]);
        $data = $stmt->fetchAll();

        // search order manieren
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="keyboard.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="keyboard.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="keyboard.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="keyboard.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
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
            echo "<a href='product.php?pid=" . $product["id"] . "'>Details</a>";
            echo "<br>";
            echo "<input type='submit' class='shopbutton' value='Add to cart'>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo "</div>";
    ?>

</body>

</html>