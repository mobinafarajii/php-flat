<?php
require_once "../php/database.php";
global $conn;
//function to fetch category information to show in site
function fetchcategorinfo(){
    global $conn;
    $sql="SELECT * FROM category WHERE `blong`='product'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $resultcategories=$stmt->fetchAll();
    return $resultcategories;

}