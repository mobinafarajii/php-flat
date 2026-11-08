<?php

require_once '../php/categories.php';

Insertcategory($_POST,$_FILES);

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

<main class="main-content-edit d-flex " style="flex:1;">
    <form enctype="multipart/form-data" class=" form-add" method="post">
                        <input name="title" type="text" placeholder="title" >
                       <select name="blong">
                              <option value="" selected disabled>انتخاب کنید</option>
                              <option value="article">مقاله</option>
                               <option value="product">محصول</option>
                           </select>
        <select name="status">
            <option value="" selected disabled>انتخاب کنید</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <input type="file" placeholder="banner" name="banner">

                         <input name="submit" type="submit">
                    </form>

</main>
</body>
</html>
