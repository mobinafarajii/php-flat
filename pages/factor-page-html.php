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
if(isset($_POST['submit'])){
    setmethodpayment($_POST);
}
require_once "../pages/header-html.php";
$datashowinfactor=$_SESSION['current-data'];
$userinfo=showinfoofuserinfactor();
$counter=0;

$lastfactorofcurrentuser=showlastfactor();

$createdate=date('y/m/d - H:i:s',$lastfactorofcurrentuser['date']);
$expiredate=date('y/m/d - H:i:s',$lastfactorofcurrentuser['date-expire']);
?>
<body class="">
<div class="d-flex  justify-content-between bg-light pt-4">
<div>
    <div class="d-flex flex-column ">
        <div class="d-flex">
            <p class="mx-5"><?=$createdate ?></p>
            <p>تاریخ صدور</p>
        </div>


        <div class="d-flex">
            <p class="mx-5"><?=$expiredate ?></p>
            <p>تاریخ انقضا</p>
        </div>
    </div>
</div>
   <div class="d-flex flex-column text-end me-5">
       <div class="d-flex justify-content-center ms-auto rounded-circle" style="height:40px; width:40px;background-color: #bcd4e6">
           <i class="bi bi-person fs-4 text-primary"></i>
       </div>
       <p class="fw-bold fs-5 text-primary">اطلاعات مشتری</p>
       <p><?= $userinfo['name'] ?></p>
       <p><?= $userinfo['emailorphone'] ?></p>
   </div>

</div>
<div class="d-flex flex-column mb-5">
    <div class="d-flex mx-5 mt-5 text-end px-3 fw-bold  " style="background-color: #d8cfb8">
        <p style="flex:1;">قیمت کل</p>
        <p style="flex:1;">قیمت واحد</p>
        <p style="flex:1;">تعداد</p>
        <p style="flex:2;">نام محصول</p>
        <p style="flex:1;">ردیف</p>
    </div>

    <?php foreach ($datashowinfactor as $product):
        $counter++ ;?>
        <?php
        $productdetail= fetchproductbyid($product['id-product']);
        ?>
        <?php $totalprice= $product['count'] *  $product['price'] ?>
        <div class="d-flex  text-end px-3 fw-bold mx-5 border " style="">
            <p style="flex:1;"><?= $totalprice?></p>
            <p style="flex:1;"><?= $product['price']?></p>
            <p style="flex:1;"><?= $product['count']?></p>
            <p style="flex:2;"><?= $productdetail['name']?></p>
            <p style="flex:1;"><?= $counter?></p>
        </div>

    <?php endforeach; ?>
    <form class="d-flex justify-content-center mx-5 p-3" method="post">

        <p class="mx-5">مبلغ نهایی</p>
        <button class="px-5 border-0 rounded-3 mx-1 fw-bold text-light" type="submit" name="submit" style="background-color: #926c15;">پرداخت فاکتور</button>
        <select class="" name="method-payment">
            <option value="online">پرداخت به روش آنلاین</option>
            <option value="cart">پرداخت به روش کارت به کارت</option>
            <option value="wallet">پرداخت از طریق کیف پول</option>
        </select>

    </form>
    <div class="d-flex justify-content-center">
        <p style="color: #65a30d" class="fw-bold mx-5"><?=$lastfactorofcurrentuser['log'] ?>

        <p>کد رهگیری:</p>
        <P><?=$lastfactorofcurrentuser['tracking-code']?></P>
    </div>

</div>

</body >
<?php require_once "../pages/footer-html.php";
?>
</html>
