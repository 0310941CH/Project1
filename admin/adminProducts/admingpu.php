<?php
session_start();
include_once("../config/connection.php");
if ($_SESSION['loggedInAdmin'] == 1) {
} else {
    header("Location: ../adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notch | gpu</title>
    <link rel="stylesheet" href="../adminNavbar.css">
    <link rel="stylesheet" href="../styles/search.css">
    <script defer src="../js/searchbar.js"></script>
    <script src="../js/zoom.js"></script>
    <script src="../js/dropdown.js"></script>
</head>

<body>
    <?php include "../adminNavbar.php" ?>

    <?php
    if (isset($_GET["sort"])) {

        if (strpos($_GET["sort"], 'nAsc') !== false) {
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

        // Output with filter
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie ORDER BY $columnName $sortBy");
        $stmt->execute(['scategorie' => "gpu"]);
        $data = $stmt->fetchAll();

        // search order methods
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="admingpu.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="admingpu.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="admingpu.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="admingpu.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';
        echo '<form action="../adminDetail.php" method="POST">';
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
            echo "<button type='submit' class='detailbutton' name='id' value='$product[id]'>Details</button>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
        }
        echo "</form>";
    } else {
        // output without filter
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie");
        $stmt->execute(['scategorie' => "gpu"]);
        $data = $stmt->fetchAll();

        // search order methods
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="admingpu.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="admingpu.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="admingpu.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="admingpu.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';
        echo '<form action="../adminDetail.php" method="POST">';
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
            echo "<button type=submit value='$product[id]' name=id>Watch Details</button>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
        }
        echo "</form>";
    }
    echo "</div>";
    ?>
</body>

</html>