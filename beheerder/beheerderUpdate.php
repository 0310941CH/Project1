<?php
session_start();
include_once("../config/connection.php");
$productname = $_SESSION['productname'];
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
    <?php
    $stmt = $pdo->prepare('SELECT * FROM products WHERE productname=:productname');
    $stmt->execute([":productname" => $productname]);
    $data = $stmt->fetchAll();
    echo "<div class=alignitems>";
    echo "<table>";
    echo "<tr>";
    echo "<th>" . "<h1>" . "Specificaties" . "</h2>" . "</th>";
    echo "<th>" . "<h1>" . "Specificaties" . "</h2>" . "</th>";
    echo "<tr>";
    foreach ($data as $product) {
// NAMEN MOETEN NOG GEGEVEN WORDEN VOOR DAT UPDATE TESTEN!!!!!!!
        echo "<div class=innerflex>";
        echo "<div class='info'>";
        echo "<tr>" . "<td>" . "Productname" . "</td>" .  "<td>" .  "<input type=text name=movies1 value='$product[productname]'>" .  "</td>". "</tr>";
        echo "<tr>" . "<td>" . "Price" . "</td>" .  "<td>" .  "<input type=text name=movies1 value='€$product[price]'>" .  "</td>". "</tr>";
        echo "</div>";
        echo "</div>";
    }

    $specData = json_decode($product['specificaties'], true);
    if ($specData['specs_type'] == "cpu") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Processor" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[processor]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "ProcessorSpeed" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[processorSpeed]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[wattage]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "gpu") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Graphics Ram" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[graphicsRam]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "ClockSpeed" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[clockspeed]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "motherboard") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram Technology" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[ramtechnology]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "ram") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Memory" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[memory]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Clockspeed" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[clockspeed]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "SSD") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Storage" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[storage]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[wattage]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "fans") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Total Fans" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[totalFans]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Fan Speed" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[fanSpeed]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "Powersupply") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[wattage]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Fan Size" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[fansize]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "pc") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Operatingsystem" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[operatingsystem]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Motherboard" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[motherboard]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram Type" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[ramtype]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram Memory" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[rammemory]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "CPU" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[cpu]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "CPU Model" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[cpumodel]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "GPU" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[gpu]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "SSD" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[ssd]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "Laptop") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Screen Size" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[screenSize]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Resolution" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[resolution]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Processor" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[processor]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[ram]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Hard Drive" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[hardDrive]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Operartngsystem" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[operatingsystem]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[bluetooth]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "keyboard") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Keyboard Type" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[keyboardtype]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Input Type" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[inputType]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "RGB" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[RGB]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "mouse") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Buttons" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[buttons]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "DPI" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[Dpi]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Mouse Type" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[mousetype]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[Bluetooth]'>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "headset") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wired" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[Wired]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[Bluetooth]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Noice Canceling" . "</td>" . "<td>" . "<input type=text name=movies1 value='$specData[NoiceCanceling]'>" . "</td>" . "</tr>";
    }
    echo "</table>";
    echo "</div>";
    ?>
</body>