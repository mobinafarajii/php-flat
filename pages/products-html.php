
<?php





?>

<!doctype html>
<html lang="fa" dir="rtl">

<head>
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
    <linK rel="stylesheet" href="../css/categories-html.css">

</head>

<body class="d-flex">

<?php
require_once './sidebar-panel-admin.php';
require_once '../php/products.php';
$resultproducts=fetchproducts();
?>

<main class="main-content-edit  " style="flex:1;">
    <div class="d-flex justify-content-between mx-5">
        <a class="show-categories-btn bg-primary p-3 text-light text-decoration-none fw-bold rounded-3 d-flex flex-column align-items-center">مشاهده محصولات<i class="bi bi-arrow-down-square-fill"></i></a>
        <a class="add-product-btn bg-primary p-3 text-light text-decoration-none fw-bold rounded-3  d-flex flex-column align-items-center" href="./add-product-html.php">افزودن محصول جدید<i class="bi bi-plus-square-fill"></i></a>

    </div>
    <table class="table table-bordered mt-3">
        <tr>
            <th>نام محصول</th>
            <th>قیمت محصول</th>
            <th>دسته بندی محصول</th>
            <th>تاریخ ثبت محصول</th>
            <th>تاریخ آپدیت محصول</th>
            <th>وضعیت محصول</th>
            <th>عکس محصول</th>

        </tr>
        <?php foreach ($resultproducts as $row):?>
<tr>
    <th><?= $row['name'] ?></th>
    <th><?= $row['price'] ?></th>
    <th><?=cattitle($row['cat-id'])?></th>
    <?php $date = date('Y-m-d H:i:s', $row['date']) ?>
    <th><?= $date ?></th>
    <?php
    if($row['update']==0){
        $update=0;
    }else{
    $update = date('Y-m-d H:i:s', $row['update']);
    }

    ?>
    <th><?= $update ?></th>
    <th><?= $row['status'] ?></th>
    <th ><img class="h-24 w-25" src="../php/uploadedimages/<?= $row['banner'] ?>"></th>
    <th><a href="./delete-html.php?id=<?= $row['id']?>">delete</a></th>
    <th><a href="./edit-html.php?id=<?= $row['id']?>">edit</a></th>

</tr>
        <?php endforeach; ?>

    </table>

</main>
</body>
</html>
