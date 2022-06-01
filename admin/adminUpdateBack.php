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
    // Ophalen van de gegevens van table products van id
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id=:id');
    $stmt->execute([":id" => $id]);
    $data = $stmt->fetchAll();

    if (isset($_POST['submitCPU'])) {
        // Foreach loop data van table omzetten naar losse gedeeltes. Handig voor UPDATEN.
        foreach ($data as $product) {
        }
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['processor'] = $_POST['processor'];
        $specData['processorSpeed'] = $_POST['processorSpeed'];
        $specData['wattage'] = $_POST['wattage'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecCPU = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateCPU = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecCPU,
        ];
        $updateCPU->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitCPU'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitGPU'])) {
        // Foreach loop data van table omzetten naar losse gedeeltes. Handig voor UPDATEN.
        foreach ($data as $product) {
        }
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['graphicsRam'] = $_POST['graphicsRam'];
        $specData['clockspeed'] = $_POST['clockspeed'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecGPU = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateGPU = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecGPU,
        ];
        $updateGPU->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitGPU'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitMotherboard'])) {
        // Foreach loop data van table omzetten naar losse gedeeltes. Handig voor UPDATEN.
        foreach ($data as $product) {
        }
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['ramtechnology'] = $_POST['ramtechnology'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecMotherboard = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateMotherboard = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecMotherboard,
        ];
        $updateMotherboard->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitMotherboard'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitRAM'])) {
        // Foreach loop data van table omzetten naar losse gedeeltes. Handig voor UPDATEN.
        foreach ($data as $product) {
        }
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['memory'] = $_POST['memory'];
        $specData['clockspeed'] = $_POST['clockspeed'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecRam = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateRam = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecRam,
        ];
        $updateRam->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitRAM'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitSSD'])) {
        // Foreach loop data van table omzetten naar losse gedeeltes. Handig voor UPDATEN.
        foreach ($data as $product) {
        }
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['storage'] = $_POST['storage'];
        $specData['wattage'] = $_POST['wattage'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecSSD = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateSSD = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecSSD,
        ];
        $updateSSD->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitSSD'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitFans'])) {
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['specs_type'] = "fans";
        $specData['totalFans'] = $_POST['totalFans'];
        $specData['fanSpeed'] = $_POST['fanSpeed'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecFans = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateFans = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecFans,
        ];
        $updateFans->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitFans'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitPowersupply'])) {
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['specs_type'] = "Powersupply";
        $specData['wattage'] = $_POST['wattage'];
        $specData['fansize'] = $_POST['fansize'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecPowersupply = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updatePowersupply = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecPowersupply,
        ];
        $updatePowersupply->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitPowersupply'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitPC'])) {
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['specs_type'] = "pc";
        $specData['operatingsystem'] = $_POST['operatingsystem'];
        $specData['motherboard'] = $_POST['motherboard'];
        $specData['ramtype'] = $_POST['ramtype'];
        $specData['rammemory'] = $_POST['rammemory'];
        $specData['cpu'] = $_POST['cpu'];
        $specData['cpumodel'] = $_POST['cpumodel'];
        $specData['gpu'] = $_POST['gpu'];
        $specData['ssd'] = $_POST['ssd'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecPC = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updatePC = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecPC,
        ];
        $updatePC->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitPC'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitLaptop'])) {
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['specs_type'] = "Laptop";
        $specData['screenSize'] = $_POST['screenSize'];
        $specData['resolution'] = $_POST['resolution'];
        $specData['processor'] = $_POST['processor'];
        $specData['ram'] = $_POST['ram'];
        $specData['hardDrive'] = $_POST['hardDrive'];
        $specData['operatingsystem'] = $_POST['operatingsystem'];
        $specData['bluetooth'] = $_POST['bluetooth'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecLaptop = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateLaptop = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecLaptop,
        ];
        $updateLaptop->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitLaptop'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitKeyboard'])) {
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['specs_type'] = "keyboard";
        $specData['keyboardtype'] = $_POST['keyboardtype'];
        $specData['inputType'] = $_POST['inputType'];
        $specData['RGB'] = $_POST['RGB'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecKeyboard = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateKeyboard = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecKeyboard,
        ];
        $updateKeyboard->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitKeyboard'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitMouse'])) {
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['specs_type'] = "mouse";
        $specData['buttons'] = $_POST['buttons'];
        $specData['Dpi'] = $_POST['dpi'];
        $specData['mousetype'] = $_POST['mousetype'];
        $specData['Bluetooth'] = $_POST['bluetooth'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecMouse = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateMouse = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecMouse,
        ];
        $updateMouse->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitMouse'];
        header("Location: adminDetail.php");
        exit();
    } elseif (isset($_POST['submitHeadset'])) {
        // De specificaties hier weer decoden zodat je de array kan aanpassen met gegevens.
        $specData = json_decode($product['specificaties'], true);
        // Hier worden de gegevens veranderd in de array
        $specData['specs_type'] = "mouse";
        $specData['Wired'] = $_POST['wired'];
        $specData['Bluetooth'] = $_POST['bluetooth'];
        $specData['NoiceCanceling'] = $_POST['noiceCanceling'];
        // Hier word de specificaties weer encoded. Om toetevoegen aan de database.
        $dbSpecHeadset = json_encode($specData);
        // De Update statement word uitgevoerd met de gegevens die geupdate kunnen worden.
        $updateHeadset = $pdo->prepare("UPDATE products SET productname=:productname, price=:price, specificaties=:specificaties WHERE id = $id");
        $information = [
            'productname' => $_POST['product'],
            'price' => $_POST['price'],
            'specificaties' => $dbSpecHeadset,
        ];
        $updateHeadset->execute($information);
        // Doorsturen naar de Detail page van admins. Met session ID zodat het weer geladen kan worden.
        $_SESSION['updateID'] = $_POST['submitHeadset'];
        header("Location: adminDetail.php");
        exit();
    }
    ?>
</body>