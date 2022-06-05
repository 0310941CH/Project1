<?php
session_start();
if ($_SESSION['loggedInAdmin'] == 1) {
    include_once("./config/connection.php");
$sql = "DELETE FROM products WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$_SESSION['id']]);
header("Location: adminpage.php");
} else {
    header("Location: adminlogin.php");
    exit();
}


?>