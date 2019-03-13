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

$en_transportation_details = $_POST['en_details'];
$fr_transportation_details = $_POST['fr_details'];
$ar_transportation_details = $_POST['ar_details'];

$sql = "insert into transportation_details (trans_id, en_transportation_details, fr_transportation_details, ar_transportation_details) values ($transid, '$en_transportation_details', '$fr_transportation_details', '$ar_transportation_details')";


         if(mysqli_query($conn, $sql)){

         	header("Location:view_transportation.php?transid=$transid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>