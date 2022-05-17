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
    <title>Search</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="js/searchbar.js"></script>
</head>

<body>
    <!-- Nav bar -->
    <nav>
        <a href="index.php"><img src="images/notchLogo.png" class="notchlogo"></a>
        <div class="middlenav">
            <div class="buttons">
                <p class="selectedtab tabs">COMPONENTS <img src="images/caret-down-solidblack.png" alt="" class="dropdownicon"></p>
            </div>


            <p class="tabs">PERIPHERALS <img src="images/caret-down-solidwhite.png" alt="" class="dropdownicon"></p>
            <p class="tabs">PC'S AND LAPTOPS <img src="images/caret-down-solidwhite.png" alt="" class="dropdownicon"></p>
        </div>
        <div class="endnav">
            <img class="xicon" src="images/xicon.png" alt="xicon" id="xicon" onclick="searchbarhider()">
            <div id="divdiv">

                <form class="search2" id="search2" onclick="searchbarshower()" method="get" action="search.php">

                    <input type="text" class="searchinput" id="search" name="searchinput">
                    <img src="images/blacksearch.png">
                    <input type="submit" id="submitbutton">

                </form>
            </div>
        </div>
        <img src="images/dots.png" alt="options" class="icon">
        <img src="images/register.png" class="icon">
        <img src="images/shoppingCard.png" class="icon">
        </div>

    </nav>
    <!-- Search output -->
    <?php
    if (isset($_GET["searchinput"])) {
        $search = $_GET["searchinput"];
        $stmt  = $pdo->prepare("SELECT * FROM products WHERE productname LIKE :pname OR maincategorie LIKE :mcategorie OR subcategorie LIKE :scategorie");
        $stmt->execute(['pname' => "%$search%", 'mcategorie' => "%$search%", 'scategorie' => "%$search%"]);
        $data = $stmt->fetchAll();

      
        foreach ($data as $product) {
            echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>". "<br>";
            echo $product["productname"] . "<br>";
            echo $product["price"] . "<br>";
        }
    }
  
  ?>

</body>

</html>