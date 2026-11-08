

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
require_once '../php/products.php';
$id=$_GET['id'];
$resultcategories=sendARRidAndtitle();
$array=sendARRofid($id);
editproduct($_POST,$_FILES,$id);
?>

<main class="main-content-edit  " style="flex:1;">
    <form enctype="multipart/form-data" method="post">
        <input name="name" type="text" placeholder="name"  value="<?=$array['name']?>">
        <input name="price" type="text" placeholder="price"  value="<?=$array['price']?>">
        <select  name="category"  required>
            <option value="" disabled selected><?= cattitle($array['cat-id'])?></option>
            <?php foreach ($resultcategories as $category) : ?>

            <option value="<?=$category['id']?>"><?=$category['title']?></option>
            <?php endforeach; ?>
        </select>
        <input type="file" placeholder="banner" name="banner" value="<?=$array['banner']?>">
        <select name="status"  required>
            <option value="" disabled selected><?=$array['status']?></option>
            <option  value="1">Active</option>
            <option value="0" >Inactive</option>

        </select>
        <input type="submit" name="submit">
    </form>

</main>
</body>
</html>
