<?php
require_once "../php/products.php";
$id=$_GET["id"];
$table="products-techzone";
$address='products-html.php';
deleteproduct($id,$table,$address);