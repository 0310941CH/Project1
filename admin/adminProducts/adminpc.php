<?php
session_start();
include_once("../config/connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../adminpage.css">
    <link rel="stylesheet" href="../adminNavbar.css">
    <script src="../js/searchbar.js"></script>
    <script src="../js/dropdown.js"></script>
    <title>Admin Panel</title>
</head>

<body>
<?php include "../adminNavbarProduct.php" ?>
<?php // Showen productname & price & foto product?>
<form action="adminDetail.php" method="POST">
    <?php
    $stmt = $pdo->prepare('SELECT * FROM products WHERE subcategorie=:pc');
    $stmt->execute([":pc" => 'pc']);
    $data = $stmt->fetchAll();
    echo "<div class=alignitems>";
    foreach ($data as $product) {
        echo "<div class=innerflex>";
        echo "<img src='./images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class = 'images' >" . "<br>";
        echo "<div class='info'>";
        echo "<input type=hidden value='$product[subcategorie]' name=subcat >";
        echo $product["productname"] . "<br>";
        echo "€" . $product["price"] . "<br>";
        echo "<button type=submit value='$product[id]' name=id>Watch Details</button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";

    ?>
</form>
</body>

</html>