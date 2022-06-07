<?php
$tabselect = 2;
session_start();
include_once("config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notch | Computer mice</title>
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
        $stmt->execute(['scategorie' => "mouse"]);
        $data = $stmt->fetchAll();

        // search order options
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="mouse.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="mouse.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="mouse.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="mouse.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';

        echo "<div class='productplace'>";
        include "productLoad.php";
    } else {
        // output without added filter
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie");
        $stmt->execute(['scategorie' => "mouse"]);
        $data = $stmt->fetchAll();

        // search order options
        echo '<div class="sortproducts">';
        if (count($data) != 0) {
            echo '<a href="mouse.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="mouse.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="mouse.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="mouse.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';

        echo "<div class='productplace'>";
        include "productLoad.php";
    }
    echo "</div>";
    ?>

</body>

</html>