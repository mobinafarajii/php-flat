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
$id=$_GET['id'];
$sql="SELECT * FROM category WHERE id=?";
$stmt=$conn->prepare($sql);
$stmt->execute([$id]);
$row=$stmt->fetch();

if(isset($_POST['submit'])){
    if(isset($_POST['title']) && isset($_POST['blong'])
            && !empty($_POST['blong']) && !empty($_POST['title'])
    ){
        echo('hi');
        $time = time();


        $sqlupdate="UPDATE `category` SET `title`=:title,`blong`=:blong , `updatee`=:update,`status`=:status WHERE `id`=:id";
        $stmt = $conn->prepare($sqlupdate);
        $stmt->bindValue(':title',$_POST['title']);
        $stmt->bindValue(':blong',$_POST['blong']);
        $stmt->bindValue(':update',$time);
        $stmt->bindValue(':id',$id);
        $stmt->bindValue(':status',$_POST['status']);
        if($stmt->execute()){
             header('location:./categories-html.php');
        }else{

            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
}

?>

<main class="main-content-edit d-flex " style="flex:1;">
    <form class=" form-add" method="post">
        <input name="title" type="text" placeholder="title" value="<?=$row['title']?>">
        <select name="blong" ">
            <option value="" selected disabled>
                <?=$row['blong']?>
            </option>
            <option value="article">مقاله</option>
            <option value="product">محصول</option>
        </select>
        <select name="status">
            <option value="" selected disabled><?= $row['status']?></option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <input name="submit" type="submit">
    </form>
</main>
</body>
</html>
