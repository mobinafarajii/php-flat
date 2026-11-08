<?php
require_once './database.php';
global $conn;
$id=$_GET['id'];
$sql="DELETE FROM category WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
header("Location: ../pages/categories-html.php");
exit();