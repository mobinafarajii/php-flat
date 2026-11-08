<?php
session_start();
require_once '../php/database.php';
global $conn;
require_once "../php/products.php";
$idd=$_GET['id'];
$productdetail=fetchproductbyid($idd);

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
addproductinfotocart($_POST);
require_once "../pages/header-html.php";


?>
<body class="">
<div class="detail container my-5">
    <div class="row d-flex">
        <div class="col-lg-6 d-flex flex-column">
            <img src="../php/uploadedimages/<?= $productdetail['banner']?>" class="w-75" />
<!--            <div-->
<!--                class="d-flex gap-2  rounded-4"-->
<!--                style="background-color: #bde0fe"-->
<!--            >-->
<!--                <div style="flex: 1.5" class="d-flex align-items-center justify-content-center gap-2">-->
<!--                    <div class="description d-flex flex-column text-end">-->
<!--                        <p class="fw-bold m-0 p-0">ضمانت اصالت کالا</p>-->
<!--                        <p class="text-secondary m-0 p-0">تضمین اصالت و سلامت کالا</p>-->
<!--                    </div>-->
<!--                    <i class="bi bi-patch-check-fill fs-4 text-primary"></i>-->
<!--                </div>-->
<!--                <div style="flex: 1" class="d-flex align-items-center gap-2">-->
<!--                    <div class="description d-flex flex-column text-end">-->
<!--                        <p class="fw-bold m-0 p-0">ارسال سریع</p>-->
<!--                        <p class="text-secondary m-0 p-0">به سراسر کشور</p>-->
<!--                    </div>-->
<!---->
<!--                    <i class="bi bi-truck fs-4 text-primary"></i>-->
<!--                </div>-->
<!--                <div style="flex: 1" class="d-flex align-items-center gap-2">-->
<!--                    <div class="description d-flex flex-column text-end">-->
<!--                        <p class="fw-bold m-0 p-0">پشتیبانی تخصصی</p>-->
<!--                        <p class="text-secondary m-0 p-0">پاسخگویی 7 روز هفته</p>-->
<!--                    </div>-->
<!---->
<!--                    <i class="bi bi-headset fs-4 text-primary"></i>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <form method="post" class="col-lg-6">
            <p class="text-start m-0 p-0"><?= $productdetail['name']?></p>
            <p class="fs-4 fw-bold">ASUS TUF RTX</p>
            <hr />
            <div class="d-flex justify-content-between p-3">
                <p class="fs-4 fw-bold"><span>تومان</span><?= $productdetail['price']?></p>
                <p class="bg-success px-4 text-light fw-bold">موجود در انبار</p>
            </div>
            <div class="d-flex justify-content-between p-3 mt-5">
                <div class="d-flex gap-1">
                    <button class="Negative border-0 px-4 rounded-2">-</button><span class="number-count">1</span
                    ><button class="plus border-0 px-4 rounded-2">+</button>
                </div>
                <button
                   type="submit"  name="submit" class="px-3 py-1 bg-primary fw-bold text-light b border-0 rounded-2"
                >
                    افزودن به سبد خرید
                </button>
                <input type="hidden" value="<?= $idd?>" name="product-id">
                <input type="hidden" id="countnum" value="1" name="product-count">
                <input type="hidden" value="<?= $productdetail['price']?>" name="price-product">
            </div>
        </form>
    </div>
</div>
<script src="./counter.js"></script>
<script src="../php/products.php"></script>
</body>
<?php require_once "../pages/footer-html.php"; ?>
</html>
