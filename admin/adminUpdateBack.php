<?php
session_start();
include_once("./config/connection.php");
if ($_SESSION['loggedInAdmin'] == 1) {
    
} else {
    header("Location: adminlogin.php");
    exit();
}
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../adminpage.css">
    <link rel="stylesheet" href="admin.css">
    <script src="/js/searchbar.js"></script>
    <script src="/js/dropdown.js"></script>
    <title>Admin Panel</title>
</head>

<body>
    <?php
    // Gets all the information from the selected id that was send from admindetail.php
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id=:id');
    $stmt->execute([":id" => $id]);
    $data = $stmt->fetchAll();

    if (isset($_POST['submitCPU'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['processor'] = $_POST['processor'];
        $specData['processorSpeed'] = $_POST['processorSpeed'];
        $specData['wattage'] = $_POST['wattage'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecCPU = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateCPU = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecCPU,
        ];
        $updateCPU->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitCPU'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitGPU'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['graphicsRam'] = $_POST['graphicsRam'];
        $specData['clockspeed'] = $_POST['clockspeed'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecGPU = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateGPU = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecGPU,
        ];
        $updateGPU->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitGPU'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitMotherboard'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['ramtechnology'] = $_POST['ramtechnology'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecMotherboard = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateMotherboard = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecMotherboard,
        ];
        $updateMotherboard->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitMotherboard'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitRAM'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['memory'] = $_POST['memory'];
        $specData['clockspeed'] = $_POST['clockspeed'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecRam = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateRam = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecRam,
        ];
        $updateRam->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitRAM'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitSSD'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['storage'] = $_POST['storage'];
        $specData['wattage'] = $_POST['wattage'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecSSD = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateSSD = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecSSD,
        ];
        $updateSSD->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitSSD'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitFans'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['specs_type'] = "fans";
        $specData['totalFans'] = $_POST['totalFans'];
        $specData['fanSpeed'] = $_POST['fanSpeed'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecFans = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateFans = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecFans,
        ];
        $updateFans->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitFans'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitPowersupply'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['specs_type'] = "Powersupply";
        $specData['wattage'] = $_POST['wattage'];
        $specData['fansize'] = $_POST['fansize'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecPowersupply = json_encode($specData);
        // Update statement is getting pushed to the database
        $updatePowersupply = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecPowersupply,
        ];
        $updatePowersupply->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitPowersupply'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitPC'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['specs_type'] = "pc";
        $specData['operatingsystem'] = $_POST['operatingsystem'];
        $specData['motherboard'] = $_POST['motherboard'];
        $specData['ramtype'] = $_POST['ramtype'];
        $specData['rammemory'] = $_POST['rammemory'];
        $specData['cpu'] = $_POST['cpu'];
        $specData['cpumodel'] = $_POST['cpumodel'];
        $specData['gpu'] = $_POST['gpu'];
        $specData['ssd'] = $_POST['ssd'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecPC = json_encode($specData);
        // Update statement is getting pushed to the database
        $updatePC = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecPC,
        ];
        $updatePC->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitPC'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitLaptop'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['specs_type'] = "Laptop";
        $specData['screenSize'] = $_POST['screenSize'];
        $specData['resolution'] = $_POST['resolution'];
        $specData['processor'] = $_POST['processor'];
        $specData['ram'] = $_POST['ram'];
        $specData['hardDrive'] = $_POST['hardDrive'];
        $specData['operatingsystem'] = $_POST['operatingsystem'];
        $specData['bluetooth'] = $_POST['bluetooth'];
        // Gets encoded again to updat it in the database with the new values.
        $dbSpecLaptop = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateLaptop = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecLaptop,
        ];
        $updateLaptop->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitLaptop'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitKeyboard'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['specs_type'] = "keyboard";
        $specData['keyboardtype'] = $_POST['keyboardtype'];
        $specData['inputType'] = $_POST['inputType'];
        $specData['RGB'] = $_POST['RGB'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecKeyboard = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateKeyboard = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecKeyboard,
        ];
        $updateKeyboard->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitKeyboard'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitMouse'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['specs_type'] = "mouse";
        $specData['buttons'] = $_POST['buttons'];
        $specData['Dpi'] = $_POST['dpi'];
        $specData['mousetype'] = $_POST['mousetype'];
        $specData['Bluetooth'] = $_POST['bluetooth'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecMouse = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateMouse = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecMouse,
        ];
        $updateMouse->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitMouse'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitHeadset'])) {
        // Foreach loop data of the table in other variable to select it. Good for UPDATE statement
        foreach ($data as $product) {
        }
        // Specs decoding to update the specificaties with the input of adminUpdateFront.php
        $specData = json_decode($product['specificaties'], true);
        // Puts the posts from adminUpdateFront.php in the $specdata 
        $specData['specs_type'] = "mouse";
        $specData['Wired'] = $_POST['wired'];
        $specData['Bluetooth'] = $_POST['bluetooth'];
        $specData['NoiceCanceling'] = $_POST['noiceCanceling'];
        // Gets encoded again to update it in the database with the new values.
        $dbSpecHeadset = json_encode($specData);
        // Update statement is getting pushed to the database
        $updateHeadset = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecHeadset,
        ];
        $updateHeadset->execute($information);
        // Sending to adminDetail.php with a session variable with the ID. To load the updated database product
        $_SESSION['updateID'] = $_POST['submitHeadset'];
        header("Location: adminDetail.php");
        exit();
    }
    ?>
</body>