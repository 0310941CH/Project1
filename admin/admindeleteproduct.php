<?php
session_start();
$id =
include_once("./config/connection.php");
$sql = "DELETE FROM products WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$_SESSION['id']]);
header("Location: adminpage.php");


?>