<?php

if (!isset($_SESSION["shoppingcart"])) {
    $_SESSION["shoppingcart"] = array();
}

include_once("config/connection.php");
?>
<head>
    <script src="js/burgermenu.js" defer></script>
</head>
    <nav>
        <a href="index.php"><img src="images/notchLogo.png" class="notchlogo"></a>
        <div class="middlenav">
            <div class="buttons">
                <p onclick="dropdown(1)" id="tab1" class=" <?php if ($tabselect == 1) {echo "selectedtab"; } ?> tabs">COMPONENTS <img src="images/caret-down-solidblack.png" alt="" class="dropdownicon <?php if ($tabselect == 1) {echo "selecteddropdownicon"; } ?>" id="dropdownicon1"></p>
                <ul id="list1">
                    <a href="/cpu.php">
                        <li>CPU</li>
                    </a>
                    <a href="/gpu.php">
                        <li>GPU</li>
                    </a>
                    <a href="/motherboard.php">
                        <li>MOTHERBOARD</li>
                    </a>
                    <a href="/ram.php">
                        <li>RAM</li>
                    </a>
                    <a href="/ssd.php">
                        <li>SSD</li>
                    </a>
                    <a href="/vent.php">
                        <li>FANS</li>
                    </a>
                    <a href="/psu.php">
                        <li>POWER SUPPLY</li>
                    </a>
                </ul>
                <div id="colorbottom1"></div>
            </div>

            <div class="buttons">
                <p onclick="dropdown(2)" class="tabs <?php if ($tabselect == 2) {echo "selectedtab"; } ?>" id="tab2">PERIPHERALS <img onclick="dropdown2()" src="images/caret-down-solidblack.png" alt="" class="dropdownicon <?php if ($tabselect == 2) {echo "selecteddropdownicon"; } ?> " id="dropdownicon2"></p>
                <ul id="list2">
                    <a href="/mouse.php">
                        <li>MOUSE</li>
                    </a>
                    <a href="/keyboard.php">
                        <li>KEYBOARD</li>
                    </a>
                    <a href="/headset.php">
                        <li>HEADSET</li>
                    </a>
                </ul>
                <div id="colorbottom2"></div>
            </div>
            <div class="buttons">
                <p onclick="dropdown(3)" class="tabs <?php if ($tabselect == 3) {echo "selectedtab"; } ?>" id="tab3">PC'S AND LAPTOPS <img src="images/caret-down-solidblack.png" alt="" class="dropdownicon <?php if ($tabselect == 3) {echo "selecteddropdownicon"; } ?>" id="dropdownicon3"></p>
                <ul id="list3">
                    <a href="/pc.php">
                        <li>PC</li>
                    </a>
                    <a href="/laptop.php">
                        <li>LAPTOPS</li>
                    </a>
                </ul>
                <div id="colorbottom3"></div>
            </div>
        </div>
        <div class="allsearch">
            <img class="xicon" src="images/xicon.png" alt="xicon" id="xicon" onclick="searchbarhider()">
            <div id="divdiv">

                <form class="search2" id="search2" onclick="searchbarshower()" method="get" action="search.php">

                    <input type="text" class="searchinput" id="search" name="searchinput">
                    <img src="images/blacksearch.png" id="searchimage">
                    <input type="submit" id="submitbutton">

                </form>
            </div>
        </div>
        <div class="burgerlines" onclick="iconchange()">
    <div id="burgerline1" class="burgerline"></div>
    <div id="burgerline2" class="burgerline"></div>
    <div id="burgerline3" class="burgerline"></div>

        </div>
        <div class="buttons">
            <img onclick="dropdown(4)" id="tab4" onclick="dropdown4()" src="images/register.png" alt="" class=" tabs2 <?php if ($tabselect == 4) {echo "selectedlogin"; } ?>"> <img onclick="dropdown4()" src="images/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon4">
            <ul id="list4">
                
                <?php
                if (isset($_SESSION["loggedInUser"])) {
                    echo "<a href='logout.php'>";
                    echo '<li class="accountbuttons">LOGOUT</li></a>';
                }
                else {
                    echo "<a href='login.php'>";
                echo '<li class="accountbuttons">LOGIN</li></a>';}
                ?>
                </a>
                <a href="/admin/adminlogin.php">
                    <li class="accountbuttons">ADMIN</li>
                </a>

                    <li class="accountbuttons">DARKMODE</li>
                
            </ul>
            <div id="colorbottom4"></div>
        </div>
        </div>
        <div class="cart">
        <a href="shoppingcart.php">
            <img src="images/shoppingCard.png" class="icon">
            </a>
            <?php
            if (isset($_SESSION["shoppingcart"])) {
                echo '<div class="cartproducts">' . count($_SESSION["shoppingcart"]) . '</div>';}
        ?>
        </div>
    </nav>