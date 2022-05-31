<?php
session_start();
include_once("./config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminNavbar.css">
    <link rel="stylesheet" href="style.css">
    <script defer src="js/searchbar.js"></script>
    <script defer src="js/dropdown.js"></script>
</head>

<body>
    <?php include "adminNavbar.php" ?>
    <?php
    // login form
    $output = "";
    if (isset($_POST["submitLogin"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($username != "" && $password != "") {
                $login = "SELECT * FROM users WHERE username=:username AND rank=:rank";
                $prepare = $pdo->prepare($login);

                $data = [
                    ":username" => $username,
                    ":rank" => 1
                ];

                $prepare->execute($data);
                $user = $prepare->fetch(PDO::FETCH_ASSOC);

                if ($user === false) {
                    $output = "This isn't a valid admin login!";
                } else {
                    $passwordCheck = password_verify($_POST["password"], $user["passwords"]);

                    if ($passwordCheck == true) {
                        $_SESSION["loggedInAdmin"] = $user["id"];
                        header("Location: adminpage.php");
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

    <div class="test">
        <div class="container">
            <h2>ADMIN LOGIN PAGE <img src="../images/lock.png" class="lock"></h2>
            <form method="POST">
                <div class="loginform">
                    <input class="inputlogin" type="text" id="username" name="username" placeholder="USERNAME">
                    <input class="inputlogin" type="password" id="password" name="password" placeholder="PASSWORD">
                </div>
                <input class="login" type="submit" name="submitLogin" value="LOGIN">
            </form>
        </div>

        <BR></BR>
        <?php echo '<p class="fout" >' . $output . "</p>" ?>
    </div>

</body>

</html>