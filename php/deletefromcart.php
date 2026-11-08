<?php
require_once './database.php';
global $conn;
$id=$_GET["id"];

$sql = "DELETE FROM `cart-techzone` WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("location:../pages/cart-page-html.php");
exit();
