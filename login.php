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
    <div class="test">
    <form method="POST">
       <h2>LOGIN PAGE</h2>
       <img src="lock.png" class="lock">
        <input type="text" id="username" name="username" placeholder="USERNAME">
        <input type="password" id="password" name="password" placeholder="PASSWORD">
        <input type="submit" name="submitLogin" value="LOGIN" class="login">
    </form>


       <a href="register.php">NEW CUSTOMER? REGISTER HERE!</a>
    <?php echo '<p class="fout" >' . $output . "</p>" ?>
    </div>
    
</body>

</html>