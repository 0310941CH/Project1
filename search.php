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
    <title>Notch | Search</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="search.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
</head>

<body>
    <?php include "navbar.php" ?>
    <?php
    if (isset($_GET["searchinput"])) {
        // Variables needed for running code
        $search = $_GET["searchinput"];
        if (isset($_GET["sort"])) {

            if (strpos($_GET["sort"], 'nAsc') !== false) { // if $_GET["sort"] nAsc includes then..
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
            // sorted search output
            $_SESSION["search"] = $_GET["searchinput"];
            $search = $_SESSION["search"];
            $stmt  = $pdo->prepare("SELECT * FROM products WHERE productname LIKE :pname OR maincategorie LIKE :mcategorie OR subcategorie LIKE :scategorie ORDER BY $columnName $sortBy");
            $stmt->execute(['pname' => "%$search%", 'mcategorie' => "%$search%", 'scategorie' => "%$search%"]);
            $data = $stmt->fetchAll();

            // search order options
            echo '<div class="results">';
            echo count($data) . ' results for ' . $search . '';
            echo '</div>';
            echo '<div class="sortproducts">';
            if (count($data) != 0) {
                echo '<a href="search.php?searchinput=' . $search . '&sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="search.php?searchinput=' . $search . '&sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="search.php?searchinput=' . $search . '&sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="search.php?searchinput=' . $search . '&sort=pDesc"><button class ="orderbutton">€▼</button></a>';
            }
            echo '</div>';

            echo "<div class='productplace'>";
            include "productLoad.php";
        } else {
            // Search output without added filter
            $_SESSION["search"] = $_GET["searchinput"];
            $search = $_SESSION["search"];
            $stmt  = $pdo->prepare("SELECT * FROM products WHERE productname LIKE :pname OR maincategorie LIKE :mcategorie OR subcategorie LIKE :scategorie");
            $stmt->execute(['pname' => "%$search%", 'mcategorie' => "%$search%", 'scategorie' => "%$search%"]);
            $data = $stmt->fetchAll();

            // search order options
            echo '<div class="results">';
            echo count($data) . ' results for ' . $search . '';
            echo '</div>';
            echo '<div class="sortproducts">';
            if (count($data) != 0) {
                if (isset($_GET["sort"])) {
                }
                echo '<a href="search.php?searchinput=' . $search . '&sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="search.php?searchinput=' . $search . '&sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="search.php?searchinput=' . $search . '&sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="search.php?searchinput=' . $search . '&sort=pDesc"><button class ="orderbutton">€▼</button></a>';
            }
            echo '</div>';
            echo "<div class='productplace'>";
            include "productLoad.php";
        }
    }
    echo "</div>";

    if (empty($data)) {
        echo '<div class="noitems">';
        echo '<h1> Oops! Looks like we dont have any results for ' . $search . '</h1><br>';
        echo 'Check your spelling or use more general terms.</div>';
    }
    ?>

</body>

</html>