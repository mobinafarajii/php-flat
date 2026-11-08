<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>Document</title>
</head>
<body>
<?php require_once './header-html.php'; ?>
<div
    id="carouselExampleSlidesOnly"
    class="carousel slide mx-5"
    data-bs-ride="carousel"
>
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img
                src="../images/imagecarousel1.png"
                class="d-block w-100"
                alt="..."
                style="height: 300px"
            />
            <div
                class="description-on-image position-absolute"
                style="top: 20%; left: 10%"
            >
                <p class="fs-4 fw-bold">قدرت،عملکرد،آینده</p>
                <p class="fw-bold m-0 p-0">
                    انواع سرور،قطعات کامپیوتری،لپ تاپ و تجهیزات شبکه
                </p>
                <p class="fw-bold m-0 p-0">با بهترین قیمت و تضمین اصالت کالا</p>
                <button
                    class="px-5 py-2 mt-3 rounded-2 border-0 bg-primary text-light fw-bold"
                >
                    مشاهده محصولات
                </button>
            </div>
        </div>
        <div class="carousel-item position-relative">
            <img
                src="../images/imagecarousel33.png"
                class="d-block w-100"
                alt="..."
                style="height: 300px"
            />
            <div
                class="description-on-image position-absolute"
                style="top: 20%; left: 10%"
            >
                <p class="fs-4 fw-bold">قدرت،عملکرد،آینده</p>
                <p class="fw-bold m-0 p-0">
                    انواع سرور،قطعات کامپیوتری،لپ تاپ و تجهیزات شبکه
                </p>
                <p class="fw-bold m-0 p-0">با بهترین قیمت و تضمین اصالت کالا</p>
                <button
                    class="px-5 py-2 mt-3 rounded-2 border-0 bg-primary text-light fw-bold"
                >
                    مشاهده محصولات
                </button>
            </div>
        </div>
        <div class="carousel-item position-relative">
            <img
                src="../images/imagecarousel22.png"
                class="d-block w-100"
                alt="..."
                style="height: 300px"
            />
            <div
                class="description-on-image position-absolute"
                style="top: 20%; left: 10%"
            >
                <p class="fs-4 fw-bold">قدرت،عملکرد،آینده</p>
                <p class="fw-bold m-0 p-0">
                    انواع سرور،قطعات کامپیوتری،لپ تاپ و تجهیزات شبکه
                </p>
                <p class="fw-bold m-0 p-0">با بهترین قیمت و تضمین اصالت کالا</p>
                <button
                    class="px-5 py-2 mt-3 rounded-2 border-0 bg-primary text-light fw-bold"
                >
                    مشاهده محصولات
                </button>
            </div>
        </div>
    </div>
</div>
<?php require_once './show-in-main-category.php';
require_once '../php/products.php';
$products=fetchproducts();
$categories=fetchcategorinfo();
if(count($categories)<=6){
    $collg='col-lg-3';
    $gap='gap-4';
}else{
    $collg='col-lg-2';
    $gap='gap-5';
}

?>
<div class="container my-5">
    <div class="row d-flex justify-content-center <?= $gap ?>">
        <?php foreach ($categories as $row)  : ?>
      <div class="<?= $collg ?>  d-flex flex-column justify-content-center pt-4">
          <img class="h-50" src="../php/uploadedimages/<?= $row['banner'] ?> "/>
          <p class="text-center"><?= $row['title'] ?></p>
          <a class="text-center text-decoration-none">مشاهده محصولات</a>
      </div>
        <?php endforeach; ?>

    </div>

</div>
<div
    class="four-property container mt-4 p-4 rounded-3"
    style="background-color: #cae9ff"
>
    <div class="row">
        <div
            class="col-lg-3 d-flex align-items-center justify-content-center gap-3"
        >
            <div class="description d-flex flex-column text-end">
                <p class="fw-bold m-0 p-0">ضمانت اصالت کالا</p>
                <p class="text-secondary m-0 p-0">تضمین اصالت و سلامت کالا</p>
            </div>
            <i class="bi bi-patch-check-fill fs-4"></i>
        </div>
        <div
            class="col-lg-3 d-flex align-items-center justify-content-center gap-3"
        >
            <div class="description d-flex flex-column text-end">
                <p class="fw-bold m-0 p-0">ارسال سریع</p>
                <p class="text-secondary m-0 p-0">به سراسر کشور</p>
            </div>

            <i class="bi bi-truck fs-4"></i>
        </div>
        <div
            class="col-lg-3 d-flex align-items-center justify-content-center gap-3"
        >
            <div class="description d-flex flex-column text-end">
                <p class="fw-bold m-0 p-0">پشتیبانی تخصصی</p>
                <p class="text-secondary m-0 p-0">پاسخگویی 7 روز هفته</p>
            </div>

            <i class="bi bi-headset fs-4"></i>
        </div>
        <div
            class="col-lg-3 d-flex align-items-center justify-content-center gap-3"
        >
            <div class="description d-flex flex-column text-end">
                <p class="fw-bold m-0 p-0">پرداخت امن</p>
                <p class="text-secondary m-0 p-0">پرداخت درگاه مطمئن</p>
            </div>
            <i class="bi bi-shield-check fs-4"></i>
        </div>
    </div>
</div>
<div class="d-flex justify-content-between px-5 my-4">
    <a class="text-decoration-none">مشاهده محصولات</a>
    <p class="fw-bold">مشاهده محصولات پرفروش</p>

</div>
<div class="container my-5">
    <div class="row d-flex justify-content-center ">
        <?php foreach ($products as $row)  : ?>
            <div class="col-lg-2 d-flex flex-column justify-content-center pt-4">
                <img class="h-50" src="../php/uploadedimages/<?= $row['banner'] ?> "/>
                <p class="text-center"><?= $row['name'] ?></p>
                <p class="text-center"><?= $row['price'] ?></p>
                <a class="text-center text-decoration-none bg-primary py-1  text-light fw-bold rounded-3" href="./detail-product-html.php?id=<?= $row['id']?>">افزودن به سبد خرید</a>
            </div>
        <?php endforeach; ?>

    </div>

</div>
<div class="two-section container-fluid mt-2 m-0 p-0">
    <div class="row m-0 p-0 d-flex justify-content-center">
        <div class="col-lg-7 d-flex justify-content-end position-relative">
            <img src="../images/imageleft-left.png" width="600px" />
            <div
                class="descriotion-left position-absolute text-end"
                style="top: 10%; right: 5%"
            >
                <p class="fw-bold p-0 m-0">راه های قدرتمند برای کسب و کار شما</p>
                <p>خرید سرور های قدرتمند،انواع تجهیزات شبکه</p>
                <button
                    class="border-0 fw-bold text-light px-4 py-2 bg-primary rounded-2"
                >
                    مشاهده سرورها
                </button>
            </div>
        </div>
        <div
            class="col-lg-5 d-flex justify-content-lg-start justify-content-end position-relative"
        >
            <img src="../images/imageright-right.png" style="width: 400px" />
            <div
                class="descriotion-left position-absolute text-start"
                style="top: 10%; left: 5%"
            >
                <p class="fw-bold m-0 p-0">لپ تاپ های حرفه ایی</p>
                <p class="p-0">برای کار و بازی</p>
                <button
                    class="border-0 fw-bold text-light px-3 py-1 bg-primary rounded-2"
                >
                    مشاهده
                </button>
            </div>
        </div>
    </div>
</div>
<p class="fw-bold text-center mt-2">برند های معتبر</p>
<div class="brands container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-1">
            <img src="../images/imageintel.png" />
        </div>
        <div class="col-lg-1">
            <img src="../images/imageasus.png" />
        </div>
        <div class="col-lg-1">
            <img src="../images/imagemsi.png" />
        </div>
        <div class="col-lg-1">
            <img src="../images/imagegigabyte.png" />
        </div>
        <div class="col-lg-1">
            <img src="../images/imagesamsung.png" />
        </div>
        <div class="col-lg-1">
            <img src="../images/imagecorsair.png" />
        </div>
        <div class="col-lg-1">
            <img src="../images/imagedell.png" />
        </div>
        <div class="col-lg-1">
            <img src="../images/imagehp.png" />
        </div>
    </div>
</div>
<div class="d-flex flex-column align-items-center justify-content-center">
    <p class="fs-4 fw-bold">چرا تک زون؟</p>
    <p class="text-secondary">
        تجربه یک خرید مطمئن از فروشگاه تخصصی تجهیزات IT
    </p>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 d-flex justify-content-center">
            <div
                class="d-flex flex-column justify-content-center align-items-center"
            >
                <img
                    class="rounded-circle"
                    src="../images/imagetrunk.png"
                    style="height: 40px; width: 40px"
                />
                <p class="fs-6 fw-bold m-0 p-0">ارسال سریع</p>
                <p class="text-secondary m-0 p-0">به سراسر کشور</p>
            </div>
        </div>
        <div class="col-lg-3 d-flex justify-content-center">
            <div
                class="d-flex flex-column justify-content-center align-items-center"
            >
                <img
                    class="rounded-circle"
                    src="../images/imagemoshavere.png"
                    style="height: 40px; width: 40px"
                />
                <p class="fs-6 fw-bold m-0 p-0">مشاوره تخصصی</p>
                <p class="text-secondary m-0 p-0">پشتیبانی قبل و بعد از خرید</p>
            </div>
        </div>
        <div class="col-lg-3 d-flex justify-content-center">
            <div
                class="d-flex flex-column justify-content-center align-items-center"
            >
                <img
                    class="rounded-circle"
                    src="../images/imagetanavo.png"
                    style="height: 40px; width: 40px"
                />
                <p class="fs-6 fw-bold m-0 p-0">تنوع محصولات</p>
                <p class="text-secondary m-0 p-0">برند های معتبر</p>
            </div>
        </div>
        <div class="col-lg-3 d-flex justify-content-center">
            <div
                class="d-flex flex-column justify-content-center align-items-center"
            >
                <img
                    class="rounded-circle"
                    src="../images/imagegheymat.png"
                    style="height: 40px; width: 40px"
                />
                <p class="fs-6 fw-bold m-0 p-0">قیمت های رقابتی</p>
                <p class="text-secondary m-0 p-0">بهترین قیمت بازار</p>
            </div>
        </div>
    </div>
</div>
<div class="container d-flex mt-4 mb-4">
    <div class="row d-flex">
        <div class="col-lg-4">
            <img src="../images/imageright.png" />
        </div>
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <div class="description d-flex flex-column justify-content-center">
                <p class="m-0 p-0 fw-bold text-center">عضویت در خبرنامه</p>
                <p class="m-0 pb-1">
                    با عضویت در خبرنامه از جدید ترین اخبار و تخفیف های فروشگاه با خبر
                    شوید
                </p>
            </div>
            <form class="input-submit d-flex">
                <input
                    type="text"
                    name="email-khabarname"
                    placeholder="ایمیل خود را وارد کنید"
                    class="rounded-3"
                    style="width: 70%"
                />
                <button
                    class="px-4 bg-primary border-0 rounded-4 text-light fw-bold me-2"
                >
                    عضویت
                </button>
            </form>
        </div>
        <div class="col-lg-2">
            <img src="../images/imageleft.png" />
        </div>
    </div>
</div>
<?php require_once './footer-html.php'; ?>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"
></script>
</body>
</html>
