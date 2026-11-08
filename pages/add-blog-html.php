
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
require_once '../php/products.php';
$resultcategories=sendARRidAndtitle();
Insertblog($_POST,$_FILES);

?>

<main class="main-content-edit  " style="flex:1;">
    <form enctype="multipart/form-data" method="post">
        <input name="title" type="text" placeholder="title">
        <input name="des" type="text" placeholder="description" >
        <select name="blong-id"  required>
            <option value="" disabled selected>Which category?</option>
            <?php foreach ($resultcategories as $category) : ?>

                <option value="<?=$category['id']?>"><?=$category['title']?></option>
            <?php endforeach; ?>
        </select>
        <input type="file" placeholder="banner" name="banner">
        <select name="status"  required>
            <option value="" disabled selected>choose your status</option>
            <option  value="1">Active</option>
            <option value="0" >Inactive</option>

        </select>

        <input type="submit" name="submit">
    </form>

</main>
</body>
</html>
