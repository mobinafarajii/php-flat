<?php
session_start();
require_once '../php/database.php';
global $conn;
require_once "../php/products.php";
$productstoshow=fetchtoshowinsabadkharid();

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
if (isset($_POST['submit'])){
    $inserttofactor=getpostfromcarttocreatefactor($_POST,$productstoshow);
}
require_once "../pages/header-html.php";


?>
<body class="">
<div class="d-flex align-items-center gap-3 px-5 py-2" style="background-color: #748cab33">
    <i class="bi bi-cart-check-fill text-primary fs-4"></i>
    <div class="description d-flex flex-column" >
        <p class="fw-bold fs-5 m-0 p-0">سبد خرید</p>
        <p class="text-secondary m-0 p-0">محصولات انتخاب شده خود را بررسی و نهایی کنید</p>
    </div>


</div>
<div class="right-left-container d-flex flex-column gap-5">

    <div class="show-products-left d-flex flex-column text-end " style="padding-bottom: 5px">

<div class="d-flex">
        <div style="flex:1">حذف</div>
        <div style="flex:1">قیمت کل</div>
        <div style="flex:1">تعداد</div>
        <div style="flex:1">قیمت</div>
        <div  style="flex:2" class="">img</div>
        <div style="flex:3">محصول</div>
</div>
        <?php foreach ($productstoshow as $product): ?>
        <?php
           $productdetail= fetchproductbyid($product['id-product']);
            ?>
        <div class="d-flex align-items-center justify-content-center p-3">
            <a style="flex:1" href="../php/deletefromcart.php?id=<?= $product['id']?>" class="text-decoration-none">حذف</a>
            <?php $totalprice= $product['count'] *  $product['price'] ?>
            <div style="flex:1"><?= $totalprice?></div>
            <div style="flex:1"><?= $product['count']?></div>
            <div style="flex:1"><?= $product['price']?></div>
            <img style="height:55%;width:8% ;margin-left:15%; " class="" src="../php/uploadedimages/<?= $productdetail['banner'] ?>   ">
            <div style="flex:3"><?= $productdetail['name'] ?></div>

        </div>
        <?php endforeach; ?>


    </div>
    <form action="" class="show-summary-right d-flex flex-column justify-content-center mb-5" style="flex:1; margin-left: 400px; margin-right: 400px" method="POST">
        <div class="d-flex justify-content-end gap-1">
            <i class="bi bi-cart-check-fill text-primary fs-4"></i>
            <p>خلاصه سفارش</p>

        </div>
        <div class="d-flex justify-content-between">
        <p><?= calctotalprice()?></p>
    <p>جمع محصولات</p>


    </div>
        <div class="d-flex justify-content-between">
            <p class="text-danger">رایگان </p>
            <p>هزینه ارسال</p>



        </div>

        <div class="d-flex justify-content-between">
            <p>0 تومان</p>
            <p class="">تخفیف</p>
        </div>
        <div class="d-flex justify-content-between">
            <p class="text-primary fw-bold"><?= calctotalprice()?></p>
            <p class="">مبلغ قابل پرداخت</p>
        </div>
        <input type="hidden" name="totalprice" value="" >
        <button type="submit" name="submit"   class="bg-primary border-0 text-light fw-bold rounded-2 text-center text-decoration-none" href="./factor-page-html.php">تکمیل خرید</button>


    </form>
</div>


</body >
<?php

require_once "../pages/footer-html.php";

?>
</html>
