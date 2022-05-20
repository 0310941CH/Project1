<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="/js/searchbar.js"></script>
    <script src="/js/dropdown.js"></script>
    <script src="/js/zoom.js"></script>
    <title>Document</title>
</head>
<body>
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
    <div id="infotextdiv">
    <p id="infotext"> FOR ALL YOUR PARTS AND SERVICES WE HAVE THE BEST SOLUTIONS. OUR STORAGE CONTAINS ONLY THE BEST OF THE BEST PRODUCTS <br> <br>
WE DELIVER TWO THINGS HERE BY NOTCH: THE BEST PC'S/LAPTOP PARTS AND THE BEST PRICES </p>
</div>
<div class="flyers">
<div id="flyer1" class="flyer" onmouseover="zoomin(1)" onmouseout="zoomout(1)">
    <p id="text1">COMPONENTS</p>
    <img id="img1" class="indexphotos" src="images/components.png" alt="" >
<a href="" class="clickbuttons">CLICK HERE!</a>
</div>
<div id="flyer2" class="flyer" onmouseover="zoomin(2)" onmouseout="zoomout(2)">
<p id="text2">PERIPHERALS</p>
<img id="img2" class="indexphotos" src="images/peripherals.png" alt="">
<a href="" class="clickbuttons">CLICK HERE!</a>
</div>
<div id="flyer3" class="flyer" onmouseover="zoomin(3)" onmouseout="zoomout(3)">
    <p>PC'S AND LAPTOPS</p>
    <img class="indexphotos" src="images/pcandlaptop.png" alt="">
<a href="" class="clickbuttons">CLICK HERE!</a>
</div>







</div>
</body>
</html>