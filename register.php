<?php
include_once('connection.php');
?>
<!DOCTYPE html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Film adden</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="voornaam" placeholder="Voornaam">
        <input type="text" name="achternaam" placeholder="Achternaam">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <button type="submit" name="submitRegister">Submit your data</button>
    </form>
</body>