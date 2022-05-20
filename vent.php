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
    <title>Vent</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
    <script defer src="js/searchbar.js"></script>
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
    if (isset($_GET["sort"])) {
    
    if (strpos($_GET["sort"], 'nAsc') !== false) { // als $_GET["sort"] nAsc bevat dan..
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

    // Output met toegepast filter
    $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie ORDER BY $columnName $sortBy");
    $stmt->execute(['scategorie' => "vent"]);
    $data = $stmt->fetchAll();

    // search order manieren
    echo '<div class="sortproducts">';
    if (count($data) != 0) {
        echo '<a href="vent.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="vent.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="vent.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="vent.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';

    echo "<div class='productplace'>";
    foreach ($data as $product) {
        echo "<div class='productinner'>";
        echo "<div class='imagesize'>";
        echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>". "<br>" ;
        echo "</div>" . "<br>";
        echo "<div class='innerinfo'>";
        echo $product["productname"] . "<br>";
        echo "</div> " . "<br>";
        echo "<div class='pricebutton'>";
        echo "€ " . $product["price"];
        echo "<br>";
        echo "<a href='product.php?pid=" . $product["id"] . "&category=vent'>Details werkt nog niet</a>";
        echo "<br>";  
        echo "<input type='submit' class='shopbutton' value='Add to cart'>";
        echo "</div>";
        echo "</div>";
    }
    } else {
    // output zonder toegepast filter
    $stmt  = $pdo->prepare("SELECT * FROM products WHERE subcategorie = :scategorie");
    $stmt->execute(['scategorie' => "vent"]);
    $data = $stmt->fetchAll();

    // search order manieren
    echo '<div class="sortproducts">';
    if (count($data) != 0) {
        echo '<a href="vent.php?sort=nAsc"><button class ="orderbutton">ABC▲</button></a>
        <a href="vent.php?sort=nDesc"><button class ="orderbutton">ABC▼</button></a>
        <a href="vent.php?sort=pAsc"><button class ="orderbutton">€▲</button></a>
        <a href="vent.php?sort=pDesc"><button class ="orderbutton">€▼</button></a>';
        }
        echo '</div>';

    echo "<div class='productplace'>";
    foreach ($data as $product) {
        echo "<div class='productinner'>";
        echo "<div class='imagesize'>";
        echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class='products'>". "<br>" ;
        echo "</div>" . "<br>";
        echo "<div class='innerinfo'>";
        echo $product["productname"] . "<br>";
        echo "</div> " . "<br>";
        echo "<div class='pricebutton'>";
        echo "€ " . $product["price"];
        echo "<br>";
        echo "<a href='product.php?pid=" . $product["id"] . "&category=vent'>Details werkt nog niet</a>";
        echo "<br>";  
        echo "<input type='submit' class='shopbutton' value='Add to cart'>";
        echo "</div>";
        echo "</div>";
    }
}
    echo "</div>";
?>

</body>

</html>