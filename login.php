<?php
session_start();
include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="js/searchbar.js"></script>
</head>

<body>
    <?php
    // login form
    $output = "";
    if (isset($_POST["submitLogin"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username != "" && $password != "") {
            $login = "SELECT * FROM users WHERE username=:username";
            $prepare = $pdo->prepare($login);

            $data = [
                ":username" => $username,
            ];

            $prepare->execute($data);
            $user = $prepare->fetch(PDO::FETCH_ASSOC);

            if ($user === false) {
                $output = "There is no user with that name!";
            } else {
                $passwordCheck = password_verify($_POST["password"], $user["passwords"]);

                if ($passwordCheck == true) {
                    $_SESSION["loggedInUser"] = $user["id"];
                    header("Location: index.php");
                    exit(0);
                } else {
                    $output = "The password wasn't correct";
                }
            }
        } else {
            $output = "You forgot to fill in your username or password!";
        }
    }
    ?>
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

                <form class="search2" id="search2" onclick="searchbarshower()" method="get">

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

    <div class="test">
        <div class="container">
            <h2>LOGIN PAGE <img src="images/lock.png" class="lock"></h2>
            <form method="POST">
                <div class="loginform">
                    <input class="inputlogin" type="text" id="username" name="username" placeholder="USERNAME">
                    <input class="inputlogin" type="password" id="password" name="password" placeholder="PASSWORD">
                </div>
                <input class="login" type="submit" name="submitLogin" value="LOGIN" class="login">
            </form>
        </div>

        <BR></BR>
        <a class="gray" href="register.php">NEW CUSTOMER? REGISTER HERE!</a>
        <?php echo '<p class="fout" >' . $output . "</p>" ?>
    </div>

</body>

</html>