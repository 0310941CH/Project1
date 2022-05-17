<?php
include_once('config/connection.php');
?>
<!DOCTYPE html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css">
    <script defer src="js/searchbar.js"></script>
</head>

<body>
    <?php
    $output = "";
    // Checked met eerste if of submit button ingedrukt is.
    if (isset($_POST['submitLogin'])) {
        // Checked of de input velden ingevuld zijn zo ja gaat die door het naar de database pushen.
        if ($_POST['voornaam'] != "" && $_POST['achternaam'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['confirmpassword'] != "") {
            if ($_POST['password'] == $_POST['confirmpassword']) {


                $voornaam = $_POST['voornaam'];
                $achternaam = $_POST['achternaam'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                //Password Encryption
                $hash = password_hash($password, PASSWORD_DEFAULT);

                // PDO Gedeelte
                try {
                    $query = 'INSERT INTO users (voornaam, achternaam, username, passwords) VALUES (:vname, :aname, :uname, :pswrd)';
                    $values = [':vname' => $voornaam, ':aname' => $achternaam, ':uname' => $username, ':pswrd' => $hash];


                    $execute = $pdo->prepare($query);
                    $execute->execute($values);
                    header('Location: login.php');
                    exit();
                } catch (PDOException $e) {
                    $output = "This username is already in use!";
                }
            } else {
                $output = "Passwords don't match!";
            }
        } else {
            $output = "Invalid input, fill in everything!";
        }
    }


    ?>
    <!-- nav bar -->
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
    <!-- register form -->
    <div class="test">
        <div class="container">
            <h2>Apply here</h2>
            <form action="" method="POST">
                <div class="loginform">
                    <input class="inputlogin" type="text" name="voornaam" placeholder="VOORNAAM">
                    <input class="inputlogin" type="text" name="achternaam" placeholder="ACHTERNAAM">
                    <input class="inputlogin" type="text" name="username" placeholder="USERNAME">
                    <input class="inputlogin" type="password" name="password" placeholder="PASSWORD">
                    <input class="inputlogin" type="password" name="confirmpassword" placeholder="CONFIRM PASSWORD">
                </div>
                <input class="login" type="submit" name="submitLogin" value="SUBMIT YOUR DATA">
            </form>
        </div>
        <?php echo '<p class="fout" >' . $output . "</p>" ?>
    </div>
</body>