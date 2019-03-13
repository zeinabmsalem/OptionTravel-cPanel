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

$transid = $_GET['transid'];


$en_transportation_details= $_POST['en_details'];

$fr_transportation_details= $_POST['fr_details'];

$ar_transportation_details= $_POST['ar_details'];


      // $sql = "insert into transportation_details (trans_id, en_transportation_details, fr_transportation_details, ar_transportation_details) values ($transid, '$en_transportation_details', '$fr_transportation_details', '$ar_transportation_details')";



     $stmt = mysqli_stmt_init($conn);

    $statmentQuery = "insert into transportation_details (trans_id, en_transportation_details, fr_transportation_details, ar_transportation_details) values (?, ?, ?, ?)";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "isss", $transid, $en_transportation_details, $fr_transportation_details, $ar_transportation_details);


         if(mysqli_stmt_execute($stmt)){

            header("Location:view_transportation.php?transid=$transid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>