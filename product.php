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
    <title>Notch | Product</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="search.css">
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
        echo $product["productname"] . "<br>";
        echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>" . "<br>";
        echo "€ " . $product["price"];
    }

    $specData = json_decode($product['specificaties'], true);

    echo "<table>";
    echo "<tr>";
    echo "<th>" . "<h1>" . "Specificaties" . "</h2>" . "</th>";
    echo "<th>" . "<h1>" . "Specificaties" . "</h2>" . "</th>";
    echo "<tr>";
    $specData = json_decode($product['specificaties'], true);
    foreach ($specData as $specName => $specData) {
        echo "<td>" . "<h2>" . strtoupper($specName) . ":" . "</h2>" . "</td>";
        echo "<td>" . strtoupper($specData) . "</td>";
        echo "</tr>";
    };
    echo "</table>";
    echo "</div>";
    ?>

</body>

</html>