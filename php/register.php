<?php
require_once './database.php';
global $conn;

//creating user for the first time

//check if form is submitted or no && check if inputs exist && check if inputs are emty
if (isset($_POST['submit'])) {
    echo "came in first";
    if(isset($_POST['name-family']) && isset($_POST['email-phone']) && isset($_POST['password']) && !empty($_POST['name-family']) && !empty($_POST['email-phone']) && !empty($_POST['password'])) {
        //checking whether this email or this phone-number has been registered
        //  $emailorphone=$_POST['email-phone'];
        function checknumberexist($conn , $input){
            $flag='';
            $emailorphone=$input;
            $sqlcheck="SELECT * FROM `techZone-user` WHERE `emailorphone`= '$emailorphone'";
            $stmtt = $conn->prepare($sqlcheck);
            $stmtt->execute();
            $result= $stmtt->fetchAll();

            if($result != null ){
               // echo'کاربری با این شماره قبلا ثبت نام کرده است';
                exit();

            }else{

               // echo'این شماره قبلا ثبت نام نشده است';

            }
            return $flag;

        }
        checknumberexist($conn , $_POST['email-phone']);

        //checking if table is empty first login should be admin
        $role='user';
        $sql2="SELECT `id` FROM `techZone-user`";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $result2= $stmt2->fetchAll();
        if($result2 != null ){
            $role='user';
        }else{
            $role='admin';
        }




        //inserting new user to the table
        $sql="INSERT INTO `techZone-user` (name, emailorphone, password,role) VALUES (:name, :emailorphone, :password,:role) ";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(':name',$_POST['name-family']);
        $stmt->bindValue(':emailorphone',$_POST['email-phone']);
        $stmt->bindValue(':password',$_POST['password']);
        $stmt->bindValue(':role',$role);
        if($stmt->execute()){
            header('location: ../pages/mainpage-html.php');
           echo "New record created successfully";
       }



    }
}