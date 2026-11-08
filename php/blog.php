<?php
require_once '../php/database.php';
global $conn;
//return array of each row of category table just id and title
function sendARRidAndtitleblog (){
    global $conn;
    $sql = 'SELECT `id`, `title` FROM `category` WHERE `blong` = "product"';
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $resultcategories=$stmt->fetchAll();
    return $resultcategories;
}

//Insert blog into table
function Insertblog($arraypost,$arrayfile){
    global $conn;
    if(isset($arraypost['submit']) ){
        echo('hi');
        if(isset($arraypost['title']) && isset($arraypost['des']) && isset($arraypost['blong-id']) && isset($arrayfile['banner'])  && isset($arraypost['status'])
            && !empty($arraypost['title']) && !empty($arraypost['des']) && !empty($arraypost['blong-id']) && !empty($arrayfile['banner'] )
        ){ echo('hi222');
            //check banner upload file
            $formats=['jpg','jpeg','png','gif'];
            $name=$arrayfile['banner']['name'];
            $size=$arrayfile['banner']['size'];
            $passwand=strtolower(pathinfo($name,PATHINFO_EXTENSION));
            if(!in_array($passwand,$formats)){
                echo 'error';
                exit();
            }
            if($size > 2*1024*1024){
                echo 'error';
                exit();
            }
            $basepath = dirname(__DIR__);


            $file = '/php/uploadedimages';
            $namebanner = 'banner' . date('Y-m-d-H-i-s') . '.' . $passwand;
            $moveupload = move_uploaded_file($arrayfile['banner']['tmp_name'], $basepath . $file . '/' . $namebanner);
            if($moveupload == false){
                echo 'error';
                exit();
            }else{
                $caldate=time();
                $sql2="INSERT INTO `blog-techzone` ( `title`, `des`, `blog-id`, `banner`,`date`,`status`) VALUES (:title, :des, :blongid, :banner, :date,:status)";
                $stmt2=$conn->prepare($sql2);
                $stmt2->bindvalue(':title', $arraypost['title']);
                $stmt2->bindvalue(':des', $arraypost['des']);
                $stmt2->bindvalue(':blongid', $arraypost['blong-id']);
                $stmt2->bindvalue(':banner', $namebanner);
                $stmt2->bindvalue(':date', $caldate);
                $stmt2->bindvalue(':status', $arraypost['status']);
                if($stmt2->execute()){
                    echo 'success';
                    header('location: blog-html.php');
                    exit();
                }else{
                    echo 'error';
                }
            }


        }

    }
}

//function showblog
function fetchblogs(){
    global $conn;
    $sql3="SELECT * FROM `blog-techzone`";
    $stmt3=$conn->prepare($sql3);
    $stmt3->execute();
    $result3=$stmt3->fetchAll();
    return $result3;

}
//function find category from cat-id
function cattitleblog($id){


    $array=sendARRidAndtitleblog();
    foreach($array as $key){
        if($key['id']==$id){
            return $key['title'];
        }
    }
}

//update  or edit a product
function editblog($arraypost,$arrayfile,$id){
    global $conn;
    if(isset($arraypost['submit']) ){
        echo('hi');
        if(isset($arraypost['title']) && isset($arraypost['des']) && isset($arraypost['blog-id']) && isset($arrayfile['banner'])  && isset($arraypost['status'])
            && !empty($arraypost['title']) && !empty($arraypost['des']) && !empty($arraypost['blog-id']) && !empty($arrayfile['banner'])
        ){ echo('hi222');
            //check banner upload file
            $formats=['jpg','jpeg','png','gif'];
            $name=$arrayfile['banner']['name'];
            $size=$arrayfile['banner']['size'];
            $passwand=strtolower(pathinfo($name,PATHINFO_EXTENSION));
            if(!in_array($passwand,$formats)){
                echo 'error';
                exit();
            }
            if($size > 2*1024*1024){
                echo 'error';
                exit();
            }
            $basepath = dirname(__DIR__);


            $file = '/php/uploadedimages';
            $namebanner = 'banner' . date('Y-m-d-H-i-s') . '.' . $passwand;
            $moveupload = move_uploaded_file($arrayfile['banner']['tmp_name'], $basepath . $file . '/' . $namebanner);
            if($moveupload == false){
                echo 'error';
                exit();
            }else{
                $caldate=time();

                $sql2="UPDATE `blog-techzone` SET `title`=:title,`des`=:des , `blog-id`=:blogid,`banner`=:banner,`update`=:update,`status`=:status WHERE `id`=:id";

                $stmt2=$conn->prepare($sql2);
                $stmt2->bindvalue(':title', $arraypost['title']);
                $stmt2->bindvalue(':des', $arraypost['des']);
                $stmt2->bindvalue(':blogid', $arraypost['blog-id']);
                $stmt2->bindvalue(':banner', $namebanner);
                $stmt2->bindvalue(':update', $caldate);
                $stmt2->bindvalue(':status', $arraypost['status']);
                $stmt2->bindvalue(':id', $id);
                if($stmt2->execute()){
                    echo 'success';
                    header('location: blog-html.php');
                    exit();
                }else{
                    echo 'error';
                }
            }


        }

    }
}
//function to send data of an id
function sendARRofidblog ($id){
    global $conn;
    $sql = 'SELECT * FROM `blog-techzone` WHERE `id` = :id';
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $result=$stmt->fetch();
    return $result;
}


//delet a row
function deleteblog($id,$table,$address){
    global $conn;
    $sql3="DELETE FROM `$table` WHERE `id` = :id";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':id', $id);
    if($stmt3->execute()){
        header("location: $address");
        exit();
    }else{
        echo 'could not delete';
    }


}