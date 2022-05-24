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
    <link rel="stylesheet" href="../beheerderpage.css">
    <link rel="stylesheet" href="beheerder.css">
    <script src="/js/searchbar.js"></script>
    <script src="/js/dropdown.js"></script>
    <title>Admin Panel</title>
</head>

<body>
    <nav>
        <a href="index.php"><img src="../navbarimages/notchLogo.png" class="notchlogo"></a>
        <div class="middlenav">
            <div class="buttons">
                <p onclick="dropdown(1)" id="tab1" class="selectedtab tabs">COMPONENTS <img src="../navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon" id="dropdownicon1"></p>
                <ul id="list1">
                    <a href="/beheerder/beheerdercpu.php">
                        <li>CPU</li>
                    </a>
                    <a href="/beheerder/beheerdergpu.php">
                        <li>GPU</li>
                    </a>
                    <a href="/beheerder/beheerdermotherboard.php">
                        <li>MOTHERBOARD</li>
                    </a>
                    <a href="/beheerder/beheerderram.php">
                        <li>RAM</li>
                    </a>
                    <a href="/beheerder/beheerderssd.php">
                        <li>SSD</li>
                    </a>
                    <a href="/beheerder/beheerderfans.php">
                        <li>FANS</li>
                    </a>
                    <a href="/beheerder/beheerderpowersupply.php">
                        <li>POWER SUPPLY</li>
                    </a>
                </ul>
                <div id="colorbottom1"></div>
            </div>

            <div class="buttons">
                <p onclick="dropdown(2)" class="tabs" id="tab2">PERIPHERALS <img onclick="dropdown2()" src="../navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon2"></p>
                <ul id="list2">
                    <a href="/beheerder/beheerdermouse.php">
                        <li>MOUSE</li>
                    </a>
                    <a href="/beheerder/beheerderkeyboard.php">
                        <li>KEYBOARD</li>
                    </a>
                    <a href="/beheerder/beheerderheadset.php">
                        <li>HEADSET</li>
                    </a>
                </ul>
                <div id="colorbottom2"></div>
            </div>
            <div class="buttons">
                <p onclick="dropdown(3)" class="tabs" id="tab3">PC'S AND LAPTOPS <img onclick="dropdown3()" src="../navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon3"></p>
                <ul id="list3">
                    <a href="/beheerder/beheerderpc.php">
                        <li>PC</li>
                    </a>
                    <a href="/beheerder/beheerderlaptop.php">
                        <li>LAPTOPS</li>
                    </a>
                </ul>
                <div id="colorbottom3"></div>
            </div>
        </div>
        <div class="endnav">
            <img class="xicon" src="../navbarimages/xicon.png" alt="xicon" id="xicon" onclick="searchbarhider()">
            <div id="divdiv">

                <form class="search2" id="search2" onclick="searchbarshower()" method="get" action="../search.php">

                    <input type="text" class="searchinput" id="search" name="searchinput">
                    <img src="../navbarimages/blacksearch.png" id="searchimage">
                    <input type="submit" id="submitbutton">

                </form>
            </div>
        </div>

        <div class="buttons">
            <img onclick="dropdown(4)" id="tab4" onclick="dropdown4()" src="../navbarimages/register.png" alt="" class=" tabs2"> <img onclick="dropdown4()" src="../navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon4">
            <ul id="list4">
                <a href="/cpu.php">
                    <li>LOGIN</li>
                </a>
                <a href="/gpu.php">
                    <li>DARKMODE</li>
                </a>
            </ul>
            <div id="colorbottom4"></div>
        </div>
        </div>
        <img src="../navbarimages/shoppingCard.png" class="icon">

    </nav>
<?php // Showen productname & price & foto product?>
<form action="beheerderDetail.php" method="POST">
    <?php
    $stmt = $pdo->prepare('SELECT * FROM products WHERE subcategorie=:mouse');
    $stmt->execute([":mouse" => 'mouse']);
    $data = $stmt->fetchAll();
    echo "<div class=alignitems>";
    foreach ($data as $product) {
        echo "<div class=innerflex>";
        echo "<img src='/images/" . $product['pictures'] . "' alt='productAfbeelding'" . "class = 'images' >" . "<br>";
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