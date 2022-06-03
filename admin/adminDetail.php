<?php
session_start();
include_once("./config/connection.php");
if ($_SESSION['loggedInAdmin'] == 1) {
    
} else {
    header("Location: adminlogin.php");
    exit();
}
$id = $_SESSION['updateID'];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
};   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminDetail.css">
    <link rel="stylesheet" href="adminNavbar.css">
    <script src="./js/searchbar.js"></script>
    <script src="./js/dropdown.js"></script>
    <title>Admin Panel</title>
</head>

<body>
<?php include "./adminNavbar.php" ?>
    <?php
    // Loading the specs when looking at the id of the product loads that row. 
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id=:id');
    $stmt->execute([":id" => $id]);
    $data = $stmt->fetchAll();
    echo "<div class=alignitems>";
    foreach ($data as $product) {
        echo '<div class="product">';
        echo '<div class="productleft">';
        echo  '<h1 class="producttitle">' . strtoupper($product["productname"]) . "<h1>";
        echo "<img src='../images/" . $product['pictures'] . "' alt='productImage'" . "class='products' >" . "<br>";
        echo '<p class="pricetext"> € ' . $product["price"] . "</p>";
        echo "</div>";
        echo '<div class="line">';
        echo "</div>";
    }
    // Letting all specs showing in a table
    echo '<div class="productright">';
    echo "<h1>SPECIFICATIES</h1>";
    echo "<table>";
    $specData = json_decode($product['specificaties'], true);
        foreach ($specData as $specName => $specData) {
            echo "<td>" . "<p> <b>" . strtoupper($specName) . ":" . " </b><p>" . "</td>"; // strtoupper is making it all caps
            echo "<td>" . strtoupper($specData) . "</td>";
            echo "</tr>";
        };
        echo "</table>";
    ?>
    <div class="detailbuttons">
    <form action="adminUpdateFront.php" method="POST">
       <?php $_SESSION['id'] = $product['id']; ?>
    <button type="submit" class="updatebutton" name="toUpdate"> Update Products</button>
    </form>
    </div>
    </div>
    </div>
</body>