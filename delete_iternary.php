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

$packid = $_GET['packid'];

$id = $_GET['id'];


$en_iternary= $_POST['en_iternary'];

$fr_iternary= $_POST['fr_iternary'];

$ar_iternary= $_POST['ar_iternary'];


      $sql = "delete from packages_itinerary

            where packages_itinerary.id = $id
            and packages_itinerary.pack_id = $packid";


         if(mysqli_query($conn, $sql)){

         	header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>