<?php

include("dbconn.php");

$userType_id;
session_start();
if (empty($_SESSION['userType_id'])) {
    header("Location:loginpage.php");
} else {
    $userType_id = $_SESSION['userType_id'];
    $refrence_id = $_SESSION['refrence_id'];
}



$en_name= $_POST['en_name'];

$fr_name= $_POST['fr_name'];

$ar_name= $_POST['ar_name'];


      // $sql = "insert into tag (en_name, fr_name, ar_name) values ('$en_name', '$fr_name', '$ar_name')";



      $stmt = mysqli_stmt_init($conn);

    $statmentQuery = "insert into tag (en_name, fr_name, ar_name) values (?, ?, ?)";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "sss", $en_name, $fr_name, $ar_name);


         if(mysqli_stmt_execute($stmt)){

         		header("Location:tag.php");


         }else {
            echo "Error: Incorrect data please try again";
         }




?>