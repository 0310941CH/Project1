<?php
include_once('connection.php');
?>
<!DOCTYPE html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
</head>

<body>
    <!-- HTML Gedeelte: Moet nog gestyled worden! -->
    <form action="" method="POST">
        <input type="text" name="voornaam" placeholder="Voornaam">
        <input type="text" name="achternaam" placeholder="Achternaam">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submitRegister">Submit your data</button>
    </form>

    <?php
    // Checked met eerste if of submit button ingedrukt is.
    if (isset($_POST['submitRegister'])) {
        // Checked of de input velden ingevuld zijn zo ja gaat die door het naar de database pushen.
        if ($_POST['voornaam'] != "" && $_POST['achternaam'] != "" && $_POST['username'] != "" && $_POST['password'] != "") {
            $voornaam = $_POST['voornaam'];
            $achternaam = $_POST['achternaam'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            //Password Encryption
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // PDO Gedeelte
            $query = 'INSERT INTO users (voornaam, achternaam, username, passwords) VALUES (:vname, :aname, :uname, :pswrd)';
            $values = [':vname' => $voornaam, ':aname' => $achternaam, ':uname' => $username, ':pswrd' => $hash];


            $execute = $pdo->prepare($query);
            $execute->execute($values);
            header('Location: login.php');
            exit();
        } else {
            echo "<h1> Invalid Input </h1>";
        }
    }


    ?>
</body>