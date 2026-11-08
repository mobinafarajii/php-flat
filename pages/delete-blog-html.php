<?php
require_once "../php/blog.php";
$id=$_GET["id"];
$table="blog-techzone";
$address='blog-html.php';
deleteblog($id,$table,$address);