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

$sql = "delete from transportation
        where transportation.id = $transid";

        mysqli_query($conn, $sql);


$sql= "delete from transportation_details
       where transportation_details.trans_id = $transid";
  

     mysqli_query($conn, $sql);


 $sql= "delete from transportation_images
       where transportation_images.trans_id = $transid";    

            mysqli_query($conn, $sql);
  
    header("Location:transportation.php");


?>