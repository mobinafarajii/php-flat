<?php
require_once '../php/categories.php';
global $result2;
?>
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

<div class="categories-container">
    <table class="table table-bordered" >
        <tr class="">
            <th class="" >عنوان دسته بندی</th>
            <th class="">نوع دسته بندی</th>
            <th class="" >تاریخ ثبت دسته بندی</th>
            <th class="">تاریخ آپدیت دسته بندی</th>
            <th class="">وضعیت</th>
        </tr>

        <?php foreach ($result2 as $row)  : ?>
        <tr>
            <th><?= $row['title'] ?></th>

            <th><?= $row['blong'] ?></th>
           <?php $date = date('Y-m-d H:i:s', $row['date']) ?>
            <?php
            if($row['updatee']==0){
                $update=0;
            }else{
            $update = date('Y-m-d H:i:s', $row['updatee']) ;
            } ?>

            <th><?= $date ?></th>
            <th><?= $update ?></th>
            <?php
            $status='';
            if($row['status'] == 1){
                $status="active";
            }else{
                $status="inactive";
            }
            ?>
            <th><?= $status ?></th>
            <th><a class="edit-category" href="./edit-category-html.php?id=<?=$row['id']?>">edit</a></th>
            <th><a class="delet-category" href="../php/delete-category.php?id=<?=$row['id']?>">delete</a></th>
        </tr>
        <?php endforeach; ?>
    </table>
</div>