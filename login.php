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
    <title>Notch | Login</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="search.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
</head>

<body>
    <?php include "navbar.php" ?>
    <?php
    $output = "";
    if (isset($_POST["submitLogin"])) { //Controleer of submitLogin geset is.
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username != "" && $password != "") { // controleer of gebruikersnaam en wachtwoord niet leeg zijn
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
                $passwordCheck = password_verify($_POST["password"], $user["passwords"]); // controleer ingevoerde wachtwoord met gehashde wachtwoord in db

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


</body>

</html>