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

$details_id = $_GET['details_id'];



      $sql = "delete from transportation_details

            where transportation_details.trans_id = $transid
                   and transportation_details.id = $details_id";


         if(mysqli_query($conn, $sql)){

         	header("Location:view_transportation.php?transid=$transid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>