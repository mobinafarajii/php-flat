<?php
require_once './database.php';
global $conn;
session_start();
if (isset($_POST['submit'])) {

    if(isset($_POST['name-family']) && isset($_POST['email-phone']) && isset($_POST['password'])
        && !empty($_POST['name-family']) && !empty($_POST['email-phone'])
        && !empty($_POST['password'])) {

        //user existence check function
        function checkuserexist($conn , $emailorphone,$password,$namefamily){
            $flag='';
            $sqlcheck="SELECT * FROM `techZone-user` WHERE `emailorphone`= '$emailorphone' && `password`= '$password' && `name`= '$namefamily' ";
            $stmtt = $conn->prepare($sqlcheck);
            $stmtt->execute();
            $result= $stmtt->fetch();

            if($result != null  ){

                if($result['role']=='admin'){
                    echo'hello';
                    header('location: ../pages/categories-html.php');
                    exit();

                }else{
                    $_SESSION['current-user-id']=$result['id'];

                    header('location: ../pages/mainpage-html.php');
                    exit();
                }


            }else{

                $sqlcheck="SELECT * FROM `techZone-user` WHERE  `name`= '$namefamily' ";
                $stmtt = $conn->prepare($sqlcheck);
                $stmtt->execute();
                $result= $stmtt->fetchAll();
                if($result == null ){
                    echo'incorrect name';
                    exit();
                }elseif(true){
                    $sqlcheck="SELECT * FROM `techZone-user` WHERE  `emailorphone`= '$emailorphone' ";
                    $stmtt = $conn->prepare($sqlcheck);
                    $stmtt->execute();
                    $result= $stmtt->fetchAll();
                    if($result == null ){
                        echo'incorrect email or phone';
                        exit();
                    }elseif(true){
                        $sqlcheck="SELECT * FROM `techZone-user` WHERE  `password`= '$password' ";
                        $stmtt = $conn->prepare($sqlcheck);
                        $stmtt->execute();
                        $result= $stmtt->fetchAll();
                        if($result == null ){
                           echo'incorrect password';
                        }
                    }

                }
            }


        }
        checkuserexist($conn , $_POST['email-phone'],$_POST['password'],$_POST['name-family']);
    }
}