<?php

require_once "../php/database.php";


//global $conn;
 //return array of each row of category table just id and title
function sendARRidAndtitle (){
global $conn;
    $sql = 'SELECT `id`, `title` FROM `category` WHERE `blong` = "product"';
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $resultcategories=$stmt->fetchAll();
    return $resultcategories;
 }
//Insert product with banner
 function Insertproduct($arraypost,$arrayfile){
    global $conn;
    if(isset($arraypost['submit']) ){
        echo('hi');
        if(isset($arraypost['name']) && isset($arraypost['price']) && isset($arraypost['category']) && isset($arrayfile['banner'])  && isset($arraypost['status'])
        && !empty($arraypost['name']) && !empty($arraypost['price']) && !empty($arraypost['category']) && !empty($arrayfile['banner'] )
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
                $sql2="INSERT INTO `products-techzone` ( `name`, `price`, `cat-id`, `banner`,`date`,`status`) VALUES (:name, :price, :category, :banner, :date,:status)";
                $stmt2=$conn->prepare($sql2);
                $stmt2->bindvalue(':name', $arraypost['name']);
                $stmt2->bindvalue(':price', $arraypost['price']);
                $stmt2->bindvalue(':category', $arraypost['category']);
                $stmt2->bindvalue(':banner', $namebanner);
                $stmt2->bindvalue(':date', $caldate);
                $stmt2->bindvalue(':status', $arraypost['status']);
                if($stmt2->execute()){
                    echo 'success';
                    header('location: products-html.php');
                    exit();
                }else{
                    echo 'error';
                }
            }


        }

    }
 }


 //function showproducts
function fetchproducts(){
    global $conn;
    $sql3="SELECT * FROM `products-techzone`";
    $stmt3=$conn->prepare($sql3);
    $stmt3->execute();
    $result3=$stmt3->fetchAll();
    return $result3;

}


//function find category from cat-id
function cattitle($id){


$array=sendARRidAndtitle();
foreach($array as $key){
    if($key['id']==$id){
        return $key['title'];
    }
}
}

//delet a row
function deleteproduct($id,$table,$address){
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
//function to send data of an id
function sendARRofid ($id){
    global $conn;
    $sql = 'SELECT * FROM `products-techzone` WHERE `id` = :id';
    $stmt=$conn->prepare($sql);
   $stmt->bindValue(':id', $id);
   $stmt->execute();
   $result=$stmt->fetch();
   return $result;
}
//update  or edit a product
function editproduct($arraypost,$arrayfile,$id){
    global $conn;
    if(isset($arraypost['submit']) ){
        echo('hi');
        if(isset($arraypost['name']) && isset($arraypost['price']) && isset($arraypost['category']) && isset($arrayfile['banner'])  && isset($arraypost['status'])
            && !empty($arraypost['name']) && !empty($arraypost['price']) && !empty($arraypost['category']) && !empty($arrayfile['banner'] )
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

                $sql2="UPDATE `products-techzone` SET `name`=:name,`price`=:price , `cat-id`=:category,`banner`=:banner,`update`=:update,`status`=:status WHERE `id`=:id";

                $stmt2=$conn->prepare($sql2);
                $stmt2->bindvalue(':name', $arraypost['name']);
                $stmt2->bindvalue(':price', $arraypost['price']);
                $stmt2->bindvalue(':category', $arraypost['category']);
                $stmt2->bindvalue(':banner', $namebanner);
                $stmt2->bindvalue(':update', $caldate);
                $stmt2->bindvalue(':status', $arraypost['status']);
                $stmt2->bindvalue(':id', $id);
                if($stmt2->execute()){
                    echo 'success';
                    header('location: products-html.php');
                    exit();
                }else{
                    echo 'error';
                }
            }


        }

    }
}

//function fetch datail of a row with id
function fetchproductbyid($id){

    global $conn;
    $sql3="SELECT * FROM `products-techzone` WHERE `id` = :id";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':id', $id);
    $stmt3->execute();
    $result4=$stmt3->fetch();
    return $result4;
}




//function add product detail and num and info to cart
function addproductinfotocart($postarray){
    global $_SESSION;
global $conn;
    if(isset($postarray['submit'])){

        if(isset($postarray['product-id'])&&  isset($_SESSION['current-user-id']) && isset($postarray['product-count'])
        && isset($postarray['price-product'])){

            //calctime
            $caldate=time();
            // to get value from hidden input means get product-id
            $_SESSION['current-product-id']=$postarray['product-id'];
           $_SESSION['current-product-count']=$postarray['product-count'];
           $_SESSION['current-product-price']=$postarray['price-product'];

           //check if there is that product in table
              if(checkproductexistincart($_SESSION['current-product-id'])){
                  //found id of that product to update
            $iddcart=checkproductexistincart($_SESSION['current-product-id'])['id'];
            echo($iddcart);


                  $sqlupdate = "UPDATE `cart-techzone` set `count`= :count, `update`= :update,`status`=:status WHERE id= :id";
                  $stmtupdate=$conn->prepare($sqlupdate);
                  $stmtupdate->bindValue(':count', $_SESSION['current-product-count']);
                  $stmtupdate->bindValue(':update', $caldate);
                  $stmtupdate->bindValue(':status', '1');
                  $stmtupdate->bindValue(':id', $iddcart);
                  if($stmtupdate->execute()){
                      echo 'success update now time to go to the cart page';
                      //send to cart page
                      header('location: ../pages/cart-page-html.php');
                      exit();
                  }
              }else{
                  $sql4='INSERT INTO `cart-techzone`(`id-user`,`id-product`,`price`,`count`,`id-factor`,`status`,`date`,`update`)
                    VALUES (:iduser,:idproduct,:price,:count,:idfactor,:status,:date,:update)';
             $stmt4=$conn->prepare($sql4);
             $stmt4->bindValue(':iduser', $_SESSION['current-user-id']);
             $stmt4->bindValue(':idproduct', $postarray['product-id']);
             $stmt4->bindValue(':price', $postarray['price-product']);
             $stmt4->bindValue(':count', $postarray['product-count']);
             $stmt4->bindValue(':idfactor', "");
             $stmt4->bindValue(':status', '1');
             $stmt4->bindValue(':date',$caldate );
             $stmt4->bindValue(':update',"");
             if($stmt4->execute()){
                 echo 'success now time to go to the cart page';
                 //send to cart page
                 header('location: ../pages/cart-page-html.php');
                 exit();
            }

              }
        }

    }


//
//   if(!isset($_SESSION['current-user-id'])){
//       echo"لطفا برای خرید وارد حساب کاربری خود شوید";
//   }else{
//       echo $_SESSION['current-user-id'];
//       unset($_SESSION['current-user-id']);
//   }
//
//
//    if (isset($_SESSION['current-product-id'])) {
//        echo $_SESSION['current-product-id'];
//
//        unset($_SESSION['current-product-id']);
//
//
//    }

}

//check product existense
function checkproductexistincart($id){
    global $conn;
    $sql3="SELECT * FROM `cart-techzone` WHERE `id-product` = :id AND `id-user` = :iduser AND `id-factor` = :idfactor";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':id', $id);
    $stmt3->bindValue(':iduser', $_SESSION['current-user-id']);

    $stmt3->bindValue(':idfactor', "0");
    $stmt3->execute();
    $result4=$stmt3->fetch();
    return $result4;
}
//function fetchdatafromcartto show in  sabad kharid
function fetchtoshowinsabadkharid(){
    global $conn;
    $sql3="SELECT * FROM `cart-techzone` where `id-user`=:iduser AND `status` = 1 ";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':iduser', $_SESSION['current-user-id']);
    $stmt3->execute();
    $result4=$stmt3->fetchAll();
    return $result4;
}
function fetchtoshowinsabadkharidd(){
    global $conn;
    $sql3="SELECT * FROM `cart-techzone` where `id-user`=:iduser AND `status` = 0 ";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':iduser', $_SESSION['current-user-id']);
    $stmt3->execute();
    $result4=$stmt3->fetchAll();

    return $result4;

}

//calc totalprice to finish shoping
function totalprice(){
    global $conn;
    $sql3="SELECT `count`,`price` FROM `cart-techzone`";
    $stmt3=$conn->prepare($sql3);
    $stmt3->execute();
    $result4=$stmt3->fetchAll();
        $sum=0;
    foreach($result4 as $row){
        $sum= $sum +$row['count']*$row['price'];

    }
    return $sum;

}


//function to send to factorpage and info about factor
function getpostfromcarttocreatefactor($postarray){
    global $conn;
    $sql="SELECT * FROM `cart-techzone` WHERE `status`=1 AND `id-factor` = 0";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
    $data=$result;
    $data2=$data;
    $_SESSION['current-data']=$data2;
    var_dump($data);
    $date=time();
    $calc_date_expire=$date +(7*24*60*60);
        $sql4='INSERT INTO `factor-techzone`(`id-user`,`total-price`,`date`,`date-expire`,`status`,`log`,`method-payment`,`tracking-code`,`update`,`file`)
                    VALUES (:iduser,:totalprice,:date,:dateexpire,:status,:log,:methodpayment,:trackingcode,:update,:file)';
        $stmt4=$conn->prepare($sql4);
        $stmt4->bindValue(':iduser', $data[0]['id-user']);
        $stmt4->bindValue(':totalprice', calctotalprice());
        $stmt4->bindValue(':date', $date);
        $stmt4->bindValue(':dateexpire', $calc_date_expire);
        $stmt4->bindValue(':status', "");
        $stmt4->bindValue(':log', "فاکتور شما در انتظار پرداخت است");
        $stmt4->bindValue(':methodpayment', "");
        $stmt4->bindValue(':trackingcode', $date);
        $stmt4->bindValue(':update', "");
        $stmt4->bindValue(':file', "");

        if($stmt4->execute()){
            echo 'success now time to go to the cart page';
        }else{
            echo 'error now time to go to the cart page';
        }
    $lastfactor_id=factorcreatedjustnow();

    foreach($_SESSION['current-data'] as $row){
        $sql="UPDATE `cart-techzone` set `status`=:status ,`id-factor`=:idfactor where `id`=:iduser";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(':iduser', $row['id']);
        $stmt->bindValue(':idfactor', $lastfactor_id);
        $stmt->bindValue(':status', 0);
        if($stmt->execute()){
            echo 'success now time to go to the cart page';
        }

    }


    header('location: /TechZone/pages/factor-page-html.php');
   exit();
   //echo $postarray['totalprice'];




}
//function get data from current factor to show in factor
function showlastfactor(){
    global $conn;
    $sql3="SELECT * FROM `factor-techzone` where `id-user`=:iduser";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':iduser', $_SESSION['current-user-id']);
    $stmt3->execute();
    $result4=$stmt3->fetchAll();
    $number=count($result4);
    $last=$result4[$number-1];
    return $last;
}
//function to get form from factor to go to the paymentpage and set method payment in mysql
function setmethodpayment($postarray){
    global $conn;
    $id=showlastfactor()['id'];
    $sql2="UPDATE `factor-techzone` SET `method-payment`=:methodpayment WHERE `id`=:id";
    $stmt2=$conn->prepare($sql2);
    $stmt2->bindValue(':methodpayment', $postarray['method-payment']);
    $stmt2->bindValue(':id', $id);
    $stmt2->execute();
    if($postarray['method-payment']=='cart'){
        header('location: /TechZone/pages/ghabz-page-html.php');
        exit();
    }
}

//function show current user info on factor
function showinfoofuserinfactor(){
    global $conn;
    $id=$_SESSION['current-user-id'];
    $sql3="SELECT * FROM `techzone-user` WHERE `id` = :id";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':id', $id);
    $stmt3->execute();
    $result4=$stmt3->fetch();
    return $result4;

}

//calculate total price of current user and status 1
function calctotalprice(){
    global $conn;
    $sql3="SELECT `count`,`price` FROM `cart-techzone` where `id-user`=:iduser and `status`=1";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':iduser', $_SESSION['current-user-id']);
    $stmt3->execute();
    $result4=$stmt3->fetchAll();
    $sum=0;
    foreach($result4 as $row){
        $totalprice= $row['count'] *  $row['price'];
        $sum=$sum+$totalprice;
    }
    return $sum;

}
function factorcreatedjustnow(){
    global $conn;    $sqll="SELECT * FROM `factor-techzone`";
    $stmt=$conn->prepare($sqll);
    $stmt->execute();
    $result=$stmt->fetchAll();
    $number=count($result);
    $last=$result[$number-1];
    return $last['id'];

}
function fetchtoinserttofactor(){
    global $conn;
    $sql3="SELECT * FROM `cart-techzone` where `id-user`=:iduser AND `status`=1 AND `id-factor`=:idfactor";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':iduser', $_SESSION['current-user-id']);
    $stmt3->bindValue(':idfactor', 0);
    $stmt3->execute();
    $result4=$stmt3->fetchAll();
    return $result4;
}
function fetchtoinserttofactorr(){
    global $conn;
    $lastfactor_id=factorcreatedjustnow();
    $sql3="SELECT * FROM `cart-techzone` where `id-user`=:iduser AND `status`=0 AND `id-factor`=:idfactor";
    $stmt3=$conn->prepare($sql3);
    $stmt3->bindValue(':iduser', $_SESSION['current-user-id']);
    $stmt3->bindValue(':idfactor',$lastfactor_id );
    $stmt3->execute();
    $result4=$stmt3->fetchAll();
    return $result4;
}
//save photo of ghabz
//function uploadghabz(){
//    global $conn;
//    $format = ['png', 'jpg', 'jpeg', 'gif'];
//    $u = $_FILES['ghabz-pic']['name'];
//    $x = strtolower(pathinfo($u, PATHINFO_EXTENSION));
//    if (!in_array($x, $format)) {
//        echo 'error';
//        exit();
//    }
//    if ($_FILES['ghabz-pic']['size'] > 2 * 1024 * 1024) {
//        echo 'error';
//        exit();
//    }
//    $basepath = dirname(__DIR__);
//
//
//    $file = '/Movie/uploadedimages';
//    $namebanner = 'banner' . date('Y-m-d-H-i-s') . '.' . $x;
//    $moveupload = move_uploaded_file($_FILES['banner']['tmp_name'], $basepath . $file . '/' . $namebanner);
//    if ($moveupload == false) {
//        echo 'error';
//        exit();
//    } else {
//
//        $sql="UPDATE `factor-techzone` SET `file`=:file WHERE id=:id";
//        $stmt=$conn->prepare($sql);
//        $stmt->bindValue(':file', $namebanner);
//        $stmt->bindValue(':id', $_SESSION['current-user-id']);
//        $stmt = $conn->prepare($sql);
//
//        $stmt->bindParam(':', $namebanner);
//        if ($stmt->execute() == true) {
//            echo 'success';
//        } else {
//            echo 'error';
//        }
//    }
//
//}

