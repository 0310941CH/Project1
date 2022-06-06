<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="/js/searchbar.js"></script>
    <script src="/js/dropdown.js"></script>
    <script src="/js/zoom.js"></script>
    <title>Notch | Home</title>
</head>
<body>
<?php include "navbar.php" ?>
    <div id="infotextdiv">
    <p id="infotext"> FOR ALL YOUR PARTS AND SERVICES WE HAVE THE BEST SOLUTIONS. OUR STORAGE CONTAINS ONLY THE BEST OF THE BEST PRODUCTS <br> <br>
WE DELIVER TWO THINGS HERE AT NOTCH: THE BEST PC'S/LAPTOP PARTS AND THE BEST PRICES </p>
</div>
<div class="flyers">
<div id="flyer1" class="flyer" onmouseover="zoomin(1)" onmouseout="zoomout(1)">
    <p id="text1">COMPONENTS</p>
    <img id="img1" class="indexphotos" src="images/components.png" alt="" >
<a href="components.php" class="clickbuttons">CLICK HERE!</a>
</div>
<div id="flyer2" class="flyer" onmouseover="zoomin(2)" onmouseout="zoomout(2)">
<p id="text2">PERIPHERALS</p>
<img id="img2" class="indexphotos" src="images/peripherals.png" alt="">
<a href="peripherals.php" class="clickbuttons">CLICK HERE!</a>
</div>
<div id="flyer3" class="flyer" onmouseover="zoomin(3)" onmouseout="zoomout(3)">
    <p id="text3">PC'S AND LAPTOPS</p>
    <img  class="indexphotos" src="images/pcandlaptop.png" alt="">
<a href="pcandlaptop.php" class="clickbuttons">CLICK HERE!</a>
</div>







</div>
</body>
</html>