<?php
session_start();
include_once('config/connection.php');
    	
?>
<!DOCTYPE html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Notch | Register</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="loginRegister.css">
    <script defer src="js/searchbar.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/dropdown.js"></script>
</head>

<body>
    <?php include "navbar.php" ?>
    <?php
    $output = "";
    // Checks with first if if submit button is pushed.
    if (isset($_POST['submitLogin'])) {
        // Checks if the input fields are filled , if so it pushes to the database.
        if ($_POST['voornaam'] != "" && $_POST['achternaam'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['confirmpassword'] != "") {
            if ($_POST['password'] == $_POST['confirmpassword']) {
                // Verifying if password reaches te goals of the secure password.
                $uppercase = preg_match('@[A-Z]@', $_POST['password']);
                $lowercase = preg_match('@[a-z]@', $_POST['password']);
                $number    = preg_match('@[0-9]@', $_POST['password']);
                $specialChars = preg_match('@[^\w]@', $_POST['password']);
                if ($uppercase && $lowercase && $number && $specialChars && strlen($_POST['password']) > 5) {
                    $firstname = $_POST['voornaam'];
                    $surname = $_POST['achternaam'];
                    $username = $_POST['username'];
                    $passwordCommit = $_POST['password'];
                    //Password Encryption
                    $hash = password_hash($passwordCommit, PASSWORD_DEFAULT);

                    // PDO part
                    try {
                        $query = 'INSERT INTO users (voornaam, achternaam, username, passwords) VALUES (:vname, :aname, :uname, :pswrd)';
                        $values = [':vname' => $firstname, ':aname' => $surname, ':uname' => $username, ':pswrd' => $hash];
                        $execute = $pdo->prepare($query);
                        $execute->execute($values);
                    } catch (PDOException $e) {
                        $output = "This username is already in use!";
                    }
                    $_SESSION['username'] = $_POST['username'];
                    header("Location: login.php");
                    exit();

                } else {
                    $output = "Password should be at least 5 characters in length and should include at least one upper case letter, one number, and one special character.";
                }
            } else {
                $output = "Passwords don't match!";
            }
        } else {
            $output = "Invalid input, fill in everything!";
        }
    }


    ?>
    <!-- register form -->
    <div class="test">
        <div class="container">
            <h2 class="logintext">Apply here</h2>
            <form action="" method="POST">
                <div class="loginform">
                    <input class="inputlogin" type="text" <?php if (!empty($_POST["voornaam"])) { echo 'value="' . $_POST["voornaam"] . '"' ;}?>  name="voornaam" placeholder="FIRSTNAME">
                    <input class="inputlogin" type="text" <?php if (!empty($_POST["achternaam"])) { echo 'value="' . $_POST["achternaam"] . '"' ;}?> name="achternaam" placeholder="SURNAME">
                    <input class="inputlogin" type="text" <?php if (!empty($_POST["username"])) { echo 'value="' . $_POST["username"] . '"' ;}?> name="username" placeholder="USERNAME">
                    <input class="inputlogin" type="password" name="password" placeholder="PASSWORD">
                    <input class="inputlogin" type="password" name="confirmpassword" placeholder="CONFIRM PASSWORD">
                </div>
                <input class="login" type="submit" name="submitLogin" value="SUBMIT YOUR DATA">

            </form>
        </div>
        <?php echo '<p class="fout" >' . $output . "</p>" ?>
    </div>
</body>