<?php
session_start();
include_once("./config/connection.php");
// Checking if admin is logged in otherwise sending it back to adminlogin.php
if ($_SESSION['loggedInAdmin'] == 1) {
    if (isset($_POST['submit'])) {
        // The Image paths and setup for the specific image uploading
        $path_dir = "adminProducts/images/";
        $pathDirectory = "../images/";
        $otherFullPath = $pathDirectory . basename($_FILES["image"]["name"]);
        $fullpath = $path_dir . basename($_FILES["image"]["name"]);
        $uploadValidation = 1; // This is for if the image is valid for moving => 0 is not valid || 1 is valid for moving
        $fileType = strtolower(pathinfo($fullpath, PATHINFO_EXTENSION));
        // Looking if this is an image
        $imagecheck = getimagesize($_FILES["image"]["tmp_name"]);
        if ($imagecheck !== false) {
            $uploadValidation = 1;
        } else {
            echo "File is not an valid image";
            $uploadValidation = 0;
            exit();
        }
        // Looking in the images map if the image exists
        if (file_exists($fullpath) && file_exists($otherFullPath)) {
            echo "Sorry the image already exists.";
            $uploadValidation = 0;
            exit();
        }
        //Looking if the image is png 
        if ($fileType != "png") {
            echo "Sorry, Only PNG files are allowed to upload";
            $uploadValidation = 0;
            exit();
        }
        // Uploading and canceling update when its 0 it canceld. 
        if ($uploadValidation = 0) {
            echo "Sorry your image wasn't uploaded. Try again";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $fullpath)) {
                copy($fullpath, $otherFullPath);

                if ($_POST['productname'] != "" && $_POST['price'] != "" && $_POST['mCategorie'] != "" && $_POST['sCategorie'] != "") {
                    $productname = $_POST['productname'];
                    $price = $_POST['price'];
                    $mainCategorie = $_POST['mCategorie'];
                    $subCategorie = $_POST['sCategorie'];
                    $image = basename($_FILES["image"]["name"]);
                    $specificaties = "Test";
                    try {
                        $data = $pdo->prepare("INSERT INTO `products` (`productname`, `price`, `pictures`, `maincategorie`, `subcategorie`) VALUES
                        ('$productname', '$price', '$image', '$mainCategorie', '$subCategorie')");
                        $data->execute();
                    } catch (PDOException $e) {
                        echo "There was a error";
                    }
                    $_SESSION['productname'] = $productname;
                    $_SESSION['subcategorie'] = $subCategorie;
                    header("Location: adminCreateSpecs.php");
                    exit();
                } else {
                    echo "You need to input all fields";
                }
            } else {
                echo "Sorry, your image wasn't uploaded a error occured.";
                exit();
            }
        }
    }
} else {
    header("Location: adminlogin.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminNavbar.css">
    <link rel="stylesheet" href="admin.css">
    <script src="./js/searchbar.js"></script>
    <script src="./js/dropdown.js"></script>
    <title>Admin Panel Create</title>
</head>

<body>
    <?php include "adminNavbar.php" ?>
    
    <h1 class="createText">Create a new product</h1>
  
    <form class="createform" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Name</th>
                <th>Input</th>
            </tr>
            <tr>
                <td>Productname</td>
                <td><input type="text" name="productname" required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" required></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input  type="file" name="image" accept=".png" required></td>
            </tr>
            <tr>
                <td>Main Categorie</td>
                <td> <select name="mCategorie">
                        <option value="components">Components</option>
                        <option value="peripherals">Peripherals</option>
                        <option value="pcLaptop">Pc & Laptop</option>
                    </select></td>
            </tr>
            <tr>
                <td>Sub Categorie</td>
                <td><select name="sCategorie">
                        <option value="pc">PC</option>
                        <option value="laptop">Laptop</option>
                        <option value="cpu">CPU</option>
                        <option value="gpu">GPU</option>
                        <option value="motherboard">Motherboard</option>
                        <option value="ram">Ram</option>
                        <option value="ssd">SSD</option>
                        <option value="fans">Fans</option>
                        <option value="powersupply">Powersupply</option>
                        <option value="headset">Headset</option>
                        <option value="keyboard">Keyboard</option>
                        <option value="mouse">Mouse</option>
                    </select></td>
            </tr>
        </table>
        <button class="createAdmin" type="submit" name="submit">Submit</button>
    </form>
    <?php
    /* Notes Uploaden Om te snappen 
        - $_FILES["image"] => haalt alle specificaties die je opgehaald word op. 
        Met 2de [] erachter met bijvoorbeeld "name" Haalt die alleen name gegevens op.

        basename() => is voor de path en dan een stuk eraf te halen wat je niet nodig hebt. Is nodig voor upload.

        getimagesize() function => haalt die width height op. en bits en mime 
        /mime is eigenlijk die image/png dus of het een image is of niet\
    
        file_exists() function => Kijkt in de path die je aangeeft of die file naam al bestaat. 
        Dus in een ifje checken of die bestaat en zoja een variabele met een cijfer geven dus bijv 1 
        en later zeggen bij 2 mag die wel uitgevoerd worden en 1 niet.

        pathinfo Function => Nodig voor om te kijken of het wel de file extension is die wij gebruiken. 
        Anders ook variabele aangeven dat die niet geupload mag worden etc. Via if loopje kan je dat dan checken.
        PATHINFO_EXTENSION => returned alleen de extension en moet lowercase voor goede validation dus strtolower function

        move_uploaded_file() => Deze functie van php moved een geuploadde file. en dan via de path ernaartoe word die geupload

        NODIG INSERT STATEMENT || basename($_FILES["image"]["name"]);
    */

    ?>
</body>