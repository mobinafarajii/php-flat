<?php
require_once '../php/database.php';

global $conn;


//INSERT to table category
//if(isset($_POST['submit'])){
//    if(isset($_POST['title']) && isset($_POST['blong'])
//        && !empty($_POST['blong']) && !empty($_POST['title']) ){
//        $time = time();
//
//
//                    $sql = "INSERT INTO `category` (title, blong,date,status) VALUES (:title, :blong,:date,:status)";
//                    $stmt = $conn->prepare($sql);
//                    $stmt->bindValue(':title',$_POST['title']);
//                    $stmt->bindValue(':blong',$_POST['blong']);
//                    $stmt->bindValue(':date',$time);
//                    $stmt->bindValue(':status',$_POST['status']);
//                    if($stmt->execute()){
//                       // echo "New record created successfully";
//                    }else{
//                        echo "Error: " . $sql . "<br>" . $conn->error;
//                    }
//
//    }
//}
function Insertcategory($arraypost,$arrayfile){
    global $conn;
    if(isset($arraypost['submit']) ){
        echo('hi');
        if(isset($arraypost['title']) && isset($arraypost['blong']) && isset($arrayfile['banner'])  && isset($arraypost['status'])
            && !empty($arraypost['title']) && !empty($arraypost['blong'])  && !empty($arrayfile['banner'] )
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
            if($size > 4*1024*1024){
                echo 'error size';
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
                $sql2="INSERT INTO `category` ( `title`, `blong`, `banner`,`date`,`status`) VALUES (:title, :blong, :banner, :date,:status)";
                $stmt2=$conn->prepare($sql2);
                $stmt2->bindvalue(':title', $arraypost['title']);
                $stmt2->bindvalue(':blong', $arraypost['blong']);

                $stmt2->bindvalue(':banner', $namebanner);
                $stmt2->bindvalue(':date', $caldate);
                $stmt2->bindvalue(':status', $arraypost['status']);
                if($stmt2->execute()){
                    echo 'success';
                    header('location: categories-html.php');
                    exit();
                }else{
                    echo 'error';
                }
            }


        }

    }
}
?>
<?php
//show inserted option

$sql2="SELECT * FROM `category`";
$stmt2=$conn->prepare($sql2);
$stmt2->execute();
$result2=$stmt2->fetchAll();
?>


<?php
//edit category
//$id=$_GET['id'];
//$sql="SELECT * FROM category WHERE id=?";
//$stmt=$conn->prepare($sql);
//$stmt->execute([$id]);
//$row=$stmt->fetch();
//
//if(isset($_POST['submit'])){
//    if(isset($_POST['title']) && isset($_POST['blong'])
//        && !empty($_POST['blong']) && !empty($_POST['title']) ){
//        echo('hi');
//        $time = time();
//
//
//        $sqlupdate="UPDATE `category` SET `title`=:title,`blong`=:blong , `updatee`=:update WHERE `id`=:id";
//        $stmt = $conn->prepare($sqlupdate);
//        $stmt->bindValue(':title',$_POST['title']);
//        $stmt->bindValue(':blong',$_POST['blong']);
//        $stmt->bindValue(':update',$time);
//        $stmt->bindValue(':id',$id);
//        if($stmt->execute()){
//            //echo "New record updated successfully";
//        }else{
//            echo "Error: " . $sql . "<br>" . $conn->error;
//        }
//
//    }
//}


?>
