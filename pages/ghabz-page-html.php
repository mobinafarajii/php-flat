<?php
session_start();
require_once '../php/database.php';
global $conn;
require_once "../php/products.php";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
</head>

<?php

require_once "../pages/header-html.php";

?>
<body class="" >
<form class="d-flex  justify-content-center" method="post"  enctype="multipart/form-data" style="margin-bottom: 500px;">
    <p>لطفا تصویر قبض کارت به کارت رو بارگذاری کنید</p>
    <input type="file" name="ghabz-pic">
    <input type="submit" name="submit">
</form>

</body >
<?php require_once "../pages/footer-html.php";
uploadghabz();
?>
</html>
