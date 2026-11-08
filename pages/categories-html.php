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

?>

<main class="main-content d-flex " style="flex:1;">

    <div class="add-btn-show-btn-container w-100 mx-5 d-flex flex-column gap-4 " >
        <div class="d-flex justify-content-between mt-3 ">
            <a class="show-categories-btn bg-primary p-3 text-light text-decoration-none fw-bold rounded-3 d-flex flex-column align-items-center">مشاهده دسته بندی ها<i class="bi bi-arrow-down-square-fill"></i></a>
            <a class="add-categories-btn bg-primary p-3 text-light text-decoration-none fw-bold rounded-3 d-flex flex-column align-items-center" href="./add-category-html.php">افزودن دسته بندی جدید<i class="bi bi-plus-square-fill"></i></a>


        </div>
        <div class="add-form-container  flex-column text-start">

        </div>
        <?php

        require_once './show-categories-html.php';

        ?>


    </div>

</main>
</body>
</html>
