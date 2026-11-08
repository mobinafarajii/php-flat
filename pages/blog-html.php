
<?php
require_once '../php/database.php';
global $conn;

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
require_once '../php/blog.php';
$resultblogs=fetchblogs();

?>

<main class="main-content-edit  " style="flex:1;">
    <div class="d-flex justify-content-between mx-5">
        <a class="show-blog-btn bg-primary p-3 text-light text-decoration-none fw-bold rounded-3 d-flex flex-column align-items-center">مشاهده مقالات<i class="bi bi-arrow-down-square-fill"></i></a>
        <a class="add-blog-btn bg-primary p-3 text-light text-decoration-none fw-bold rounded-3  d-flex flex-column align-items-center" href="./add-blog-html.php">افزودن مقاله جدید<i class="bi bi-plus-square-fill"></i></a>

    </div>
    <table class="table table-bordered mt-3">
        <tr>
            <th>عنوان مقاله</th>
            <th>توضیحات مقاله</th>
            <th>دسته بندی محصول</th>
            <th>تاریخ ثبت مقاله</th>
            <th>تاریخ آپدیت مقاله</th>
            <th>وضعیت مقاله</th>
            <th>عکس مقاله</th>

        </tr>
        <?php foreach ($resultblogs as $row):?>
            <tr>
                <th><?= $row['title'] ?></th>
                <th><?= $row['des'] ?></th>
                <th><?=cattitleblog($row['blog-id'])?></th>
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
                <th ><img class="h-100 w-100" src="../php/uploadedimages/<?= $row['banner'] ?>"></th>
                <th><a href="./delete-blog-html.php?id=<?= $row['id']?>">delete</a></th>
                <th><a href="./edit-blog-html.php?id=<?= $row['id']?>">edit</a></th>

            </tr>
        <?php endforeach; ?>

    </table>

</main>
</body>
</html>
