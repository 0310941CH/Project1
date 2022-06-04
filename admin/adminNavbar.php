<?php
// Navbar for the other admin pages.
?>
<nav>   
        <a href="../adminpage.php"><img src="./navbarimages/notchLogo.png" class="notchlogo"></a>
        <div class="middlenav">
            <div class="buttons">
                <p onclick="dropdown(1)" id="tab1" class="selectedtab tabs">COMPONENTS <img src="./navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon selecteddropdownicon" id="dropdownicon1"></p>
                <ul id="list1">
                    <a href="/admin/adminProducts/admincpu.php"><li>CPU</li></a>
                    <a href="/admin/adminProducts/admingpu.php"><li>GPU</li></a>
                    <a href="/admin/adminProducts/adminmotherboard.php"><li>MOTHERBOARD</li></a>
                    <a href="/admin/adminProducts/adminram.php"><li>RAM</li></a>
                    <a href="/admin/adminProducts/adminssd.php"><li>SSD</li></a>
                    <a href="/admin/adminProducts/adminfans.php"><li>FANS</li></a>
                    <a href="/admin/adminProducts/adminpowersupply.php"><li>POWER SUPPLY</li></a>
                </ul>
                <div id="colorbottom1"></div>
            </div>
            <div class="buttons">
            <p onclick="dropdown(2)" class="tabs" id="tab2">PERIPHERALS <img  onclick="dropdown2()" src="./navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon2" ></p>
            <ul id="list2">
                    <a href="/admin/adminProducts/adminmouse.php"><li>MOUSE</li></a>
                    <a href="/admin/adminProducts/adminkeyboard.php"><li>KEYBOARD</li></a>
                    <a href="/admin/adminProducts/adminheadset.php"><li>HEADSET</li></a>
                </ul>
                <div id="colorbottom2"></div>
            </div>
            <div class="buttons">
            <p onclick="dropdown(3)" class="tabs" id="tab3">PC'S AND LAPTOPS <img src="./navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon3"></p>
            <ul id="list3">
                    <a href="/admin/adminProducts/adminpc.php"><li>PC</li></a>
                    <a href="/admin/adminProducts/adminlaptop.php"><li>LAPTOPS</li></a>
                </ul>
                <div id="colorbottom3"></div>
            </div>
        </div>
        <div class="endnav">
            <img class="xicon" src="./navbarimages/xicon.png" alt="xicon" id="xicon" onclick="searchbarhider()">
            <div id="divdiv">
                <form class="search2" id="search2" onclick="searchbarshower()" method="get" action="search.php">
                    <input type="text" class="searchinput" id="search" name="searchinput">
                    <img src="./navbarimages/blacksearch.png" id="searchimage">
                    <input type="submit" id="submitbutton">
                </form>
            </div>
        </div>
        <div class="buttons">
            <img onclick="dropdown(4)"  id="tab4" onclick="dropdown4()" src="./navbarimages/register.png" alt="" class=" tabs2"> <img onclick="dropdown4()" src="./navbarimages/caret-down-solidblack.png" alt="" class="dropdownicon " id="dropdownicon4">
            <ul id="list4">
                    <a href="/login.php"><li class="accountbuttons">LOGIN</li></a> 
                    <a href="./adminlogin.php"><li class="accountbuttons">ADMIN</li></a>
                </ul>
                <div id="colorbottom4"></div>
            </div>
        </div>
        <a href="shoppingcart.php"><img src="./navbarimages/shoppingCard.png" class="icon" ></a>
    </nav>