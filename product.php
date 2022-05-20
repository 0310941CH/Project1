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
    <title>Product</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="product.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
</head>

<body>
    <!-- Nav bar -->
    <nav>   
        <a href="index.php"><img src="images/notchLogo.png" class="notchlogo"></a>
        <div class="middlenav">
            <div class="buttons">
                <p onclick="dropdown(1)" id="tab1" class="selectedtab tabs">COMPONENTS <img src="images/caret-down-solidblack.png" alt="" class="dropdownicon selecteddropdownicon" id="dropdownicon1"></p>
                <ul id="list1">
                    <a href="/cpu.php"><li>CPU</li></a>
                    <a href="/gpu.php"><li>GPU</li></a>
                    <a href="/motherboard.php"><li>MOTHERBOARD</li></a>
                    <a href="/ram.php"><li>RAM</li></a>
                    <a href="/ssd.php"><li>SSD</li></a>
                    <a href="/fans.php"><li>FANS</li></a>
                    <a href="/powersuply.php"><li>POWER SUPPLY</li></a>
                </ul>
                <div id="colorbottom1"></div>
            </div>

            <div class="buttons">
            <p onclick="dropdown(2)" class="tabs" id="tab2">PERIPHERALS <img  onclick="dropdown2()" src="images/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon2" ></p>
            <ul id="list2">
                    <a href="/cpu.php"><li>MOUSE</li></a>
                    <a href="/gpu.php"><li>KEYBOARD</li></a>
                    <a href="/motherboard.php"><li>HEADSET</li></a>
                </ul>
                <div id="colorbottom2"></div>
            </div>
            <div class="buttons">
            <p onclick="dropdown(3)" class="tabs" id="tab3">PC'S AND LAPTOPS <img src="images/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon3"></p>
            <ul id="list3">
                    <a href="/pc.php"><li>PC</li></a>
                    <a href="/laptops.php"><li>LAPTOPS</li></a>
                </ul>
                <div id="colorbottom3"></div>
            </div>
        </div>
        <div class="endnav">
            <img class="xicon" src="images/xicon.png" alt="xicon" id="xicon" onclick="searchbarhider()">
            <div id="divdiv">

                <form class="search2" id="search2" onclick="searchbarshower()" method="get">

                    <input type="text" class="searchinput" id="search" name="searchinput">
                    <img src="images/blacksearch.png" id="searchimage">
                    <input type="submit" id="submitbutton">

                </form>
            </div>
        </div>

        <div class="buttons">
            <img onclick="dropdown(4)"  id="tab4" onclick="dropdown4()" src="images/register.png" alt="" class=" tabs2"> <img onclick="dropdown4()" src="images/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon4">
            <ul id="list4">
                    <a href="/cpu.php"><li class="accountbuttons">LOGIN</li></a>
                    <a href="/gpu.php"><li class="accountbuttons">DARKMODE</li></a>
                </ul>
                <div id="colorbottom4"></div>
            </div>
        </div>
        <img src="images/shoppingCard.png" class="icon">

    </nav>
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