<?php
session_start();
include_once("../config/connection.php");
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../beheerderpage.css">
    <link rel="stylesheet" href="beheerder.css">
    <script src="/js/searchbar.js"></script>
    <script src="/js/dropdown.js"></script>
    <title>Admin Panel</title>
</head>

<body>
    <?php 

$stmt = $pdo->prepare('SELECT * FROM products WHERE id=:id');
$stmt->execute([":id" => $id]);
$data = $stmt->fetchAll();

        if (isset($_POST['submitCPU'])) {
            foreach ($data as $product) {

            }
            $specData = json_decode($product['specificaties'], true);
            $specData['processor'] = $_POST['test'];
            $specData['processorSpeed'] = $_POST['test1'];
            $specData['wattage'] = $_POST['test2'];
            $dbSpecCPU = json_encode($specData);

            $updateCPU = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
            $information = [
                'productname' => $_POST['product'],
                'price' => $_POST['price'],
                'specificaties' => $dbSpecCPU,
            ];
            $updateCPU->execute($information);
            $_SESSION['updateID'] = $_POST['submitCPU'];
            header("Location: beheerderDetail.php");
            exit();
        }
    ?>
</body>